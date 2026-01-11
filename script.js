document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("tax_form");
    const totalEmployeeContribution = document.getElementById("total_employee_contribution");
    const sssEmployee = document.getElementById("sss_employee");
    const pagibigEmployee = document.getElementById("pagibig_employee");
    const philhealthEmployee = document.getElementById("philhealth_employee");
    const withholdingTax = document.getElementById("withholding_tax");
    const salary = document.getElementById("salary");
    const frequency = document.getElementById("frequency");
    const addDeduction = document.getElementById("addDeduction");
    const otherDeductions = document.getElementById("other_deductions");
    const netPay = document.getElementById("net_pay");
    const taxBracket = document.getElementById("tax-bracket");
    const baseTax = document.getElementById('base-tax');
    const incomeExcess = document.getElementById('income-excess');
    const excessTax = document.getElementById('excess-tax');
    const taxRate = document.getElementById('tax-rate');
    const totalWithholdingTax = document.querySelectorAll('.total-withholding-tax');
    const taxableIncome = document.querySelectorAll('.taxable-income');
    const trainLawTableContainer = document.getElementById('train-law-table-container');
    const minTax = document.getElementById('min-tax');
    let timer = 800;
    let timeoutId;
   
    salary.addEventListener("input", () => {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {updateTax()}, timer);
    });
    frequency.addEventListener("change", updateTax);

    addDeduction.addEventListener("click", (e) => {

        e.preventDefault();

        const inputContainer = document.getElementById("input_container");

        const deductionDiv = document.createElement("div");

        const input = document.createElement("input");
        input.type = "number";
        input.name = "deductions[]";
        input.placeholder = "PHP 0.00";
        input.addEventListener("input", updateTax);
        

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
        console.log("Salary value:", formData.get('salary'));

        fetch('tax_calculator.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            totalEmployeeContribution.value = result.totalEmployeeContribution !== '' ? "₱ " + parseFloat(result.totalEmployeeContribution).toFixed(2) : '';
            sssEmployee.value = result.sssEmployee !== '' ? "₱ " + parseFloat(result.sssEmployee).toFixed(2) : '';
            philhealthEmployee.value = result.philhealthEmployee !== '' ? "₱ " + parseFloat(result.philhealthEmployee).toFixed(2) : '';
            pagibigEmployee.value = result.pagibigEmployee !== '' ? "₱ " + parseFloat(result.pagibigEmployee).toFixed(2) : '';
            withholdingTax.value = result.withholdingTax !== '' ? "₱ " + parseFloat(result.withholdingTax).toFixed(2) : '';
            otherDeductions.value = result.otherDeductions !== '' ? "₱ " + parseFloat(result.otherDeductions).toFixed(2) : '';
            netPay.value = result.netPay !== '' ? "₱ " + parseFloat(result.netPay).toFixed(2) : '';
            
            totalWithholdingTax.forEach(element => {
                element.textContent = '₱ ' + parseFloat(result.withholdingTax).toFixed(2);
            })

            taxableIncome.forEach(element => {
                element.textContent = '₱ ' + parseFloat(result.taxableIncome).toFixed(2);
            })


            const salaryValue = parseFloat(formData.get('salary')) || 0;
            const netPayValue = parseFloat(result.netPay) || 0;

            if(salaryValue <= 0 || netPayValue <= 0) {
                trainLawTableContainer.style.display = 'none';
                if(netPayValue < 0) {
                    netPay.style.color = 'red';
                } else {
                netPay.style.color = 'black';
                }
            } else {
                trainLawTableContainer.style.display = 'block';
                netPay.style.color = 'black';
                displayTaxBreakdown(result.trainLawBreakdown);
            }    
        })
    }

    function displayTaxBreakdown(breakdownParam) {
        taxBracket.textContent = "(" + breakdownParam.taxRate + ") " + breakdownParam.bracket;
        baseTax.textContent = "₱ " + parseFloat(breakdownParam.baseTax).toFixed(2);
        incomeExcess.textContent = "₱ " + parseFloat(breakdownParam.incomeExcess).toFixed(2);
        excessTax.textContent = "₱ " + parseFloat(breakdownParam.excessTax).toFixed(2);
        taxRate.textContent = breakdownParam.taxRate;
        minTax.textContent =  parseFloat(breakdownParam.minTax).toFixed(2);
    }

    
})