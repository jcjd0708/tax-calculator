document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("tax_form");
    const salary = document.getElementById("salary");
    const frequency = document.getElementById("frequency");
    const addDeduction = document.getElementById("addDeduction");
    
    const employeeBreakdown = {
        total : document.getElementById("total_employee_contribution"),
        sss : document.getElementById("sss-employee"),
        pagibig : document.getElementById("pagibig_employee"),
        philhealth : document.getElementById("philhealth_employee"),
        withholdingTax : document.getElementById("withholding_tax"),
        netPay : document.getElementById("net_pay"),
        otherDeductions : document.getElementById("other_deductions"),
        totalDeductions : document.getElementById('total-deductions'),
        taxableIncome : document.getElementById('taxable-income'),
        grossSalary : document.getElementById("gross-salary")
    }

    const sssBreakdown = {
        employee : document.getElementById("sss-employee-text"),
        employer : document.getElementById("sss-employer-text"),
        total : document.getElementById('total-sss-contribution')
    }

    const pagibigBreakdown = {
        employee : document.getElementById("pagibig-employee-text"),
        employer : document.getElementById("pagibig-employer-text"),
        total : document.getElementById("total-pagibig-contribution")
    }

    const philhealthBreakdown = {
        employee : document.getElementById('philhealth-employee-text'),
        employer : document.getElementById("philhealth-employer-text"),
        total : document.getElementById("total-philhealth-contribution")
    }

    const taxBreakdown = {
        bracket : document.getElementById("tax-bracket"),
        baseTax : document.getElementById('base-tax'),
        excessIncome : document.getElementById('income-excess'),
        excessTax : document.getElementById('excess-tax'),
        taxRate : document.getElementById('tax-rate'),
        minTax : document.getElementById('min-tax'),
        taxableIncome : document.getElementById('taxable-income-display'),
        withholdingTax : document.getElementById('withholding-tax-display')
    }

    const annualProjection = {
        annualGross : document.getElementById('annual-gross'),
        annualTax : document.getElementById('annual-tax'),
        effectiveTaxRate : document.getElementById('effective-tax-rate'),
        annualNetPay : document.getElementById('annual-net-pay')
    }

    const container = {
        trainLaw : document.getElementById('train-law-table-container'),
        sss : document.getElementById('sss-breakdown-container'),
        pagibig : document.getElementById('pagibig-breakdown-container'),
        philhealth : document.getElementById("philhealth-breakdown-container"),
        annualProjection : document.getElementById("annual-projection-container")
    }
    
    const DEBOUNCE_DELAYS = {
        inputTimer : 500,
        changeTimer : 300
    }

    let timeoutId;
    const TAX_EXEMPT_THRESHOLD = 20833;

    salary.addEventListener("input", debounceUpdate(DEBOUNCE_DELAYS.inputTimer));
    frequency.addEventListener("change", debounceUpdate(DEBOUNCE_DELAYS.changeTimer));
    addDeduction.addEventListener("click", (e) => {
        e.preventDefault();

        const inputContainer = document.getElementById("input_container");
        const deductionDiv = document.createElement("div");
        deductionDiv.classList.add("deduction-row");

        const input = document.createElement("input");
        input.type = "number";
        input.name = "deductions[]";
        input.placeholder = "PHP 0.00";
        input.addEventListener("input", debounceUpdate(DEBOUNCE_DELAYS.inputTimer));
        
        const removeBtn = document.createElement("button");
        removeBtn.type = "button";
        removeBtn.textContent = 'x';
        removeBtn.addEventListener("click", () => {
            deductionDiv.remove();
            updateTax();
        })

        deductionDiv.append(input, removeBtn);
        inputContainer.appendChild(deductionDiv);
    })


    function updateTax() {
        const formData = new FormData(form);

        fetch('tax_calculator.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {

            displayMainBreakdown(result);
            
            const salaryValue = parseFloat(salary.value) || 0;
            const netPayValue = parseFloat(result.netPay) || 0;

            if(salaryValue <= 0 || netPayValue <= 0) {
                container.trainLaw.style.display = 'none';
                container.sss.style.display = 'none';
                container.pagibig.style.display = 'none';
                container.philhealth.style.display = 'none';
                container.annualProjection.style.display = 'none';

                if(netPayValue < 0) {
                    employeeBreakdown.netPay.style.color = 'red';
                } else {
                    employeeBreakdown.netPay.style.color = 'black';
                }
            } else {
                container.sss.style.display = 'block';
                container.pagibig.style.display = 'block';
                container.philhealth.style.display = 'block';
                container.annualProjection.style.display = 'block';
                employeeBreakdown.netPay.style.color = 'black';
                displaySssBreakdown(result);
                displayPagibigBreakdown(result);
                displayPhilhealthBreakdown(result);
                displayAnnualProjection(result);
                const taxableIncome = parseFloat(result.taxableIncome);
                if(taxableIncome < TAX_EXEMPT_THRESHOLD) {
                    container.trainLaw.style.display = 'none';
                } else {
                    container.trainLaw.style.display = 'block';
                    displayTaxBreakdown(result);
                }
            }    
        })
    }

    function displayTaxBreakdown(result) {
        const breakdown = result.trainLawBreakdown;
        taxBreakdown.bracket.textContent = "(" + breakdown.taxRate + ") " + breakdown.bracket;
        taxBreakdown.baseTax.textContent = formatCurrency(breakdown.baseTax);
        taxBreakdown.excessIncome.textContent = formatCurrency(breakdown.incomeExcess);
        taxBreakdown.excessTax.textContent = formatCurrency(breakdown.excessTax);
        taxBreakdown.taxRate.textContent = breakdown.taxRate;
        taxBreakdown.minTax.textContent =  formatCurrency(breakdown.minTax);
        taxBreakdown.taxableIncome.textContent = formatCurrency(result.taxableIncome);
        taxBreakdown.withholdingTax.textContent = formatCurrency(result.withholdingTax);
        
    }

    function displaySssBreakdown(result) {
        sssBreakdown.employee.textContent = formatCurrency(result.sssEmployee);
        sssBreakdown.employer.textContent = formatCurrency(result.sssEmployer);
        sssBreakdown.total.textContent = formatCurrency(result.totalSssContribution);
    }

    function displayMainBreakdown(result) {
        employeeBreakdown.total.value = formatCurrency(result.totalEmployeeContribution);
        employeeBreakdown.sss.value = formatCurrency(result.sssEmployee);
        employeeBreakdown.philhealth.value = formatCurrency(result.philhealthEmployee);
        employeeBreakdown.pagibig.value = formatCurrency(result.pagibigEmployee);
        employeeBreakdown.withholdingTax.value = formatCurrency(result.withholdingTax);
        employeeBreakdown.otherDeductions.value = formatCurrency(result.otherDeductions);
        employeeBreakdown.netPay.value = formatCurrency(result.netPay);  
        employeeBreakdown.taxableIncome.value = formatCurrency(result.taxableIncome);
        employeeBreakdown.grossSalary.value = formatCurrency(result.monthly);
    }

    function displayPagibigBreakdown(result) {
        pagibigBreakdown.employee.textContent = formatCurrency(result.pagibigEmployee);
        pagibigBreakdown.employer.textContent = formatCurrency(result.pagibigEmployer);
        pagibigBreakdown.total.textContent = formatCurrency(result.totalPagibigContribution);
    }
    
    function displayPhilhealthBreakdown(result) {
        philhealthBreakdown.employee.textContent = formatCurrency(result.philhealthEmployee);
        philhealthBreakdown.employer.textContent = formatCurrency(result.philhealthEmployer);
        philhealthBreakdown.total.textContent = formatCurrency(result.totalPhilhealthContribution);
    }

    function displayAnnualProjection(result) {
        const projections = result.effectiveTaxRate;
        annualProjection.annualGross.textContent = formatCurrency(projections.annualGross);
        annualProjection.annualTax.textContent = formatCurrency(projections.annualTax);
        annualProjection.effectiveTaxRate.textContent = parseFloat(projections.effectiveTaxRate).toFixed(2) + "%";
        annualProjection.annualNetPay.textContent = formatCurrency(projections.annualNet);
    }

    function formatCurrency(value) {
        const num = parseFloat(value);
        if(isNaN(num)) {
            return '';
        }
        return "₱ " + num.toLocaleString('en-PH', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        })
    }

    function debounceUpdate(delay) {
        let timer;
        return () => {
            clearTimeout(timer);
            timer = setTimeout(updateTax, delay);
        }
    }
})