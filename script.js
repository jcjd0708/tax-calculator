const form = document.querySelector('#tax_form');
const total_contribution = document.querySelector("#total_contribution");
const sss = document.querySelector('#sss');
const pagibig = document.querySelector('#pagibig');
const philhealth = document.querySelector('#philhealth');
const trainLaw = document.querySelector('#trainLaw');

let salary = document.querySelector("#salary");
salary.addEventListener("input", updateTax);
let frequency = document.querySelector('#frequency');
frequency.addEventListener("change", updateTax);

function updateTax() {

    const formData = new FormData(form);

    fetch('tax_calculator.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        total_contribution.value = result.totalContributions !== '' ? "₱ " + parseFloat(result.totalContributions).toFixed(2) : '';
        sss.value = result.sss !== '' ? "₱ " + parseFloat(result.sss).toFixed(2) : '';
        pagibig.value = result.pagibig !== '' ? "₱ " + parseFloat(result.pagibig).toFixed(2) : '';
        philhealth.value = result.philhealth !== '' ? "₱ " + parseFloat(result.philhealth).toFixed(2) : '';
        trainLaw.value = result.trainTax !== '' ? "₱ " + parseFloat(result.trainTax).toFixed(2) : '';
    })
}