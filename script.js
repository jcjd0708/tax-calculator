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
        otherDeductions : document.getElementById("other_deductions")
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

    const container = {
        trainLaw : document.getElementById('train-law-table-container'),
        sss : document.getElementById('sss-breakdown-container'),
        pagibig : document.getElementById('pagibig-breakdown-container'),
        philhealth : document.getElementById("philhealth-breakdown-container")
    }
    
    const DEBOUNCE_DELAYS = {
        inputTimer : 800,
        changeTimer : 300
    }

    let timeoutId;
   
    salary.addEventListener("input", () => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {updateTax()}, DEBOUNCE_DELAYS.inputTimer);
    });

    frequency.addEventListener("change", () => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {updateTax()}, DEBOUNCE_DELAYS.changeTimer)
    });

    addDeduction.addEventListener("click", (e) => {
        e.preventDefault();

        const inputContainer = document.getElementById("input_container");
        const deductionDiv = document.createElement("div");

        const input = document.createElement("input");
        input.type = "number";
        input.name = "deductions[]";
        input.placeholder = "PHP 0.00";
        input.addEventListener("input", () => {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {updateTax()}, DEBOUNCE_DELAYS.inputTimer);
        });
        
        const removeBtn = document.createElement("button");
        removeBtn.type = "button";
        removeBtn.textContent = 'x';
        removeBtn.addEventListener("click", () => {
            removeButton(removeBtn);
            updateTax();
        })

        deductionDiv.append(input, removeBtn);
        inputContainer.appendChild(deductionDiv);
    })

    function removeButton(button) {
        button.parentElement.remove();
    }

    function updateTax() {
        const formData = new FormData(form);

        fetch('tax_calculator.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {

            displayMainBreakdown(result);
            
            const salaryValue = parseFloat(formData.get('salary')) || 0;
            const netPayValue = parseFloat(result.netPay) || 0;

            if(salaryValue <= 0 || netPayValue <= 0) {
                container.trainLaw.style.display = 'none';
                container.sss.style.display = 'none';
                container.pagibig.style.display = 'none';
                container.philhealth.style.display = 'none';
                if(netPayValue < 0) {
                    employeeBreakdown.netPay.style.color = 'red';
                } else {
                    employeeBreakdown.netPay.style.color = 'black';
                }
            } else {
                container.sss.style.display = 'block';
                container.pagibig.style.display = 'block';
                container.philhealth.style.display = 'block';
                employeeBreakdown.netPay.style.color = 'black';
                displaySssBreakdown(result);
                displayPagibigBreakdown(result);
                displayPhilhealthBreakdown(result);
                const taxableIncome = parseFloat(result.taxableIncome) || 0;
                if(taxableIncome < 20833) {
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
        employeeBreakdown.total.value = result.totalEmployeeContribution !== '' ? formatCurrency(result.totalEmployeeContribution) : '';
        employeeBreakdown.sss.value = result.sssEmployee !== '' ? formatCurrency(result.sssEmployee) : '';
        employeeBreakdown.philhealth.value = result.philhealthEmployee !== '' ? formatCurrency(result.philhealthEmployee) : '';
        employeeBreakdown.pagibig.value = result.pagibigEmployee !== '' ? formatCurrency(result.pagibigEmployee) : '';
        employeeBreakdown.withholdingTax.value = result.withholdingTax !== '' ? formatCurrency(result.withholdingTax) : '';
        employeeBreakdown.otherDeductions.value = result.otherDeductions !== '' ? formatCurrency(result.otherDeductions) : '';
        employeeBreakdown.netPay.value = result.netPay !== '' ? formatCurrency(result.netPay) : '';  
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
})