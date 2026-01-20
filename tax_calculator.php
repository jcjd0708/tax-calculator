<?php
// table
function sssTable() {
    $salaryRange = [
        ['min' => 0, 'max' => 5249.99, 'msc' => 5000, 'mpf' => 0, 'ec' => 10],
        ['min' => 5250, 'max' => 5749.99, 'msc' => 5500, 'mpf' => 0, 'ec' => 10],
        ['min' => 5750, 'max' => 6249.99, 'msc' => 6000, 'mpf' => 0, 'ec' => 10],
        ['min' => 6250, 'max' => 6749.99, 'msc' => 6500 , 'mpf' => 0, 'ec' => 10],
        ['min' => 6750, 'max' => 7249.99, 'msc' => 7000 , 'mpf' => 0, 'ec' => 10],
        ['min' => 7250, 'max' => 7749.99, 'msc' => 7500 , 'mpf' => 0, 'ec' => 10],
        ['min' => 7750, 'max' => 8249.99, 'msc' => 8000 , 'mpf' => 0, 'ec' => 10],
        ['min' => 8250, 'max' => 8749.99, 'msc' => 8500 , 'mpf' => 0, 'ec' => 10],
        ['min' => 8750, 'max' => 9249.99, 'msc' => 9000 , 'mpf' => 0, 'ec' => 10],
        ['min' => 9250, 'max' => 9749.99, 'msc' => 9500, 'mpf' => 0, 'ec' => 10],
        ['min' => 9750, 'max' => 10249.99, 'msc' => 10000 , 'mpf' => 0, 'ec' => 10],
        ['min' => 10250, 'max' => 10749.99, 'msc' => 10500 , 'mpf' => 0, 'ec' => 10],
        ['min' => 10750, 'max' => 11249.99, 'msc' => 11000, 'mpf' => 0, 'ec' => 10],
        ['min' => 11250, 'max' => 11749.99, 'msc' => 11500, 'mpf' => 0, 'ec' => 10],
        ['min' => 11750, 'max' => 12249.99, 'msc' => 12000, 'mpf' => 0, 'ec' => 10],
        ['min' => 12250, 'max' => 12749.99, 'msc' => 12500, 'mpf' => 0, 'ec' => 10],
        ['min' => 12750, 'max' => 13249.99, 'msc' => 13000, 'mpf' => 0, 'ec' => 10],
        ['min' => 13250, 'max' => 13749.99, 'msc' => 13500, 'mpf' => 0, 'ec' => 10],
        ['min' => 13750, 'max' => 14249.99, 'msc' => 14000, 'mpf' => 0, 'ec' => 10],
        ['min' => 14250, 'max' => 14749.99, 'msc' => 14500, 'mpf' => 0, 'ec' => 10],
        ['min' => 14750, 'max' => 15249.99, 'msc' => 15000, 'mpf' => 0, 'ec' => 30],
        ['min' => 15250, 'max' => 15749.99, 'msc' => 15500, 'mpf' => 0, 'ec' => 30],
        ['min' => 15750, 'max' => 16249.99, 'msc' => 16000, 'mpf' => 0, 'ec' => 30],
        ['min' => 16250, 'max' => 16749.99, 'msc' => 16500, 'mpf' => 0, 'ec' => 30],
        ['min' => 16750, 'max' => 17249.99, 'msc' => 17000, 'mpf' => 0, 'ec' => 30],
        ['min' => 17250, 'max' => 17749.99, 'msc' => 17500, 'mpf' => 0, 'ec' => 30],
        ['min' => 17750, 'max' => 18249.99, 'msc' => 18000, 'mpf' => 0, 'ec' => 30],
        ['min' => 18250, 'max' => 18749.99, 'msc' => 18500, 'mpf' => 0, 'ec' => 30],
        ['min' => 18750, 'max' => 19249.99, 'msc' => 19000, 'mpf' => 0, 'ec' => 30],
        ['min' => 19250, 'max' => 19749.99, 'msc' => 19500, 'mpf' => 0, 'ec' => 30],
        ['min' => 19750, 'max' => 20249.99, 'msc' => 20000, 'mpf' => 0, 'ec' => 30],
        ['min' => 20250, 'max' => 20749.99, 'msc' => 20000, 'mpf' => 50, 'ec' => 30],
        ['min' => 20750, 'max' => 21249.99, 'msc' => 20000, 'mpf' => 100, 'ec' => 30],
        ['min' => 21250, 'max' => 21749.99, 'msc' => 20000, 'mpf' => 150, 'ec' => 30],
        ['min' => 21750, 'max' => 22249.99, 'msc' => 20000, 'mpf' => 200, 'ec' => 30],
        ['min' => 22250, 'max' => 22749.99, 'msc' => 20000, 'mpf' => 250, 'ec' => 30],
        ['min' => 22750, 'max' => 23249.99, 'msc' => 20000, 'mpf' => 300, 'ec' => 30],
        ['min' => 23250, 'max' => 23749.99, 'msc' => 20000, 'mpf' => 350, 'ec' => 30],
        ['min' => 23750, 'max' => 24249.99, 'msc' => 20000, 'mpf' => 400, 'ec' => 30],
        ['min' => 24250, 'max' => 24749.99, 'msc' => 20000, 'mpf' => 450, 'ec' => 30],
        ['min' => 24750, 'max' => 25249.99, 'msc' => 20000, 'mpf' => 500, 'ec' => 30],
        ['min' => 25250, 'max' => 25749.99, 'msc' => 20000, 'mpf' => 550, 'ec' => 30],
        ['min' => 25750, 'max' => 26249.99, 'msc' => 20000, 'mpf' => 600, 'ec' => 30],
        ['min' => 26250, 'max' => 26749.99, 'msc' => 20000, 'mpf' => 650, 'ec' => 30],
        ['min' => 26750, 'max' => 27249.99, 'msc' => 20000, 'mpf' => 700, 'ec' => 30],
        ['min' => 27250, 'max' => 27749.99, 'msc' => 20000, 'mpf' => 750, 'ec' => 30],
        ['min' => 27750, 'max' => 28249.99, 'msc' => 20000, 'mpf' => 800, 'ec' => 30],
        ['min' => 28250, 'max' => 28749.99, 'msc' => 20000, 'mpf' => 850, 'ec' => 30],
        ['min' => 28750, 'max' => 29249.99, 'msc' => 20000, 'mpf' => 900, 'ec' => 30],
        ['min' => 29250, 'max' => 29749.99, 'msc' => 20000, 'mpf' => 950, 'ec' => 30],
        ['min' => 29750, 'max' => 30249.99, 'msc' => 20000, 'mpf' => 1000, 'ec' => 30],
        ['min' => 30250, 'max' => 30749.99, 'msc' => 20000, 'mpf' => 1050, 'ec' => 30],
        ['min' => 30750, 'max' => 31249.99, 'msc' => 20000, 'mpf' => 1100, 'ec' => 30],
        ['min' => 31250, 'max' => 31749.99, 'msc' => 20000, 'mpf' => 1150, 'ec' => 30],
        ['min' => 31750, 'max' => 32249.99, 'msc' => 20000, 'mpf' => 1200, 'ec' => 30],
        ['min' => 32250, 'max' => 32749.99, 'msc' => 20000, 'mpf' => 1250, 'ec' => 30],
        ['min' => 32750, 'max' => 33249.99, 'msc' => 20000, 'mpf' => 1300, 'ec' => 30],
        ['min' => 33250, 'max' => 33749.99, 'msc' => 20000, 'mpf' => 1350, 'ec' => 30],
        ['min' => 33750, 'max' => 34249.99, 'msc' => 20000, 'mpf' => 1400, 'ec' => 30],
        ['min' => 34250, 'max' => 34749.99, 'msc' => 20000, 'mpf' => 1450, 'ec' => 30],
        ['min' => 34750, 'max' => INF, 'msc' => 20000, 'mpf' => 1500, 'ec' => 30]
    ];
    return $salaryRange;
}
// conversion and other deduction
function salaryConversion($salary, $frequency) {
    // array with key values
    $frequencyMap = [
        'semi-monthly' => 2,
        'weekly' => 4.333,
        'daily' => 22,
        'annually' => 1/12,
        'monthly' => 1
    ];
    // if the user selects an option
    if(isset($frequencyMap[$frequency])) {
        // returns product of salary with selected frequency
        return $salary * $frequencyMap[$frequency];
    }
    // a fallback
    return $salary;
}

function otherDeductions($deduction = []) {
    $total = 0;
    foreach($deduction as $ded) {
        $clean = floatval(filter_var($ded, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        if($clean > 0) {
            $total += $clean;
        }
    }
    return $total;
}

// contributions
function sssEmployeeContribution($salary, $sssTable) {
    $rate = 0.05;
    if($salary < 0) {
        return 0;
    }
    foreach($sssTable as $row) {
        if($salary >= $row['min'] && $salary <= $row['max']) {
            return $row['msc'] * $rate + ($row['mpf'] / 2);
        }
    }
    return 0;
}

function sssEmployerContribution($salary, $sssTable) {
    $rate = 0.1;
    if($salary < 0) {
        return 0;
    }
    foreach($sssTable as $row) {
        if($salary >= $row['min'] && $salary <= $row['max']) {
            return $row['msc'] * $rate + $row['mpf'] + $row['ec'];
        }
    }
    return 0;
}
// computes contribution from $monthly
function philhealthContribution($salary) {
    // mininum cap
    $min = 10000;
    //maximum cap
    $max = 100000;
    // contribution rate
    $rate = 0.05;
    if($salary <= $min) {
        //returns min if min is more than or equal to salary
        return ($min * $rate) / 2;
    } else if($salary <= $max) {
        //returns salary if salary is more than or equal to maximum cap
        return ($salary * $rate) / 2;
    } else {
        //returns maxmimum if maxmimum is less than to salary
        return ($max * $rate) / 2;
    }
    
}
//computes contribution from $monthly
function pagibigEmployeeContributions($salary) {
    // min cap
    $min = 1500;
    // max cap
    $max = 10000;
    // assigned rate
    $rate = 0.02;
    if($salary <= $min) {
        // if $monthly is less than min cap;
        //rate changes to 1%
        $rate = 0.01;
        // returns monthly * rate
        return $salary * $rate;
    } else if ($salary > $max) {
        // returns max if salary is more than max
        return $max * $rate;
    } else {
        // return monthly if salary is less than max;
        return $salary * $rate;
    }
}

function pagibigEmployerContributions($salary) {
    $max = 10000;
    $rate = 0.02;
    if($salary > $max) {
        return $max * $rate;
    } else {
        return $salary * $rate;
    }
}

// tax calculation
function calculateTrainTax($taxableIncome) {
    // TRAIN Law Table
    $salaryRange = [
        ['min' => 0, 'max' => 20833, 'tax' => 0, 'rate' => 0],
        ['min' => 20833, 'max' => 33332, 'tax' => 0, 'rate' => .15],
        ['min' => 33333, 'max' => 66666, 'tax' => 1875, 'rate' => .2],
        ['min' => 66667, 'max' => 166666, 'tax' => 8541.80, 'rate' => .25],
        ['min' => 166667, 'max' => 666666, 'tax' => 33541.80, 'rate' => .3],
        ['min' => 666667, 'max' => INF, 'tax' => 183541.80, 'rate' => .35]
    ];
    // assign each array as $row
    foreach($salaryRange as $row) {
        // define the bracket from row min and row max
        if($taxableIncome >= $row['min'] && $taxableIncome <= $row['max']) {
            // assign each row key into variable
            $rate = $row['rate'];
            $baseTax = $row['tax'];
            $minTax = $row['min'];
            // calculate excess
            $excess = $taxableIncome - $minTax;
            // calculate excess tax
            $excessTax = $excess * $rate;
            // calculate withholding tax
            $withholdingTax = $excessTax + $baseTax;
            // ternary operator : determine if Infinity or not
            $maxDisplay = $row['max'] == INF ? 'Above' : '₱' . number_format($row['max']);
            // concat maxDisplay to bracketString
            $bracketString = '₱' . number_format($row['min']) . ' - '  . $maxDisplay;
            // return values
            return [
                'withholdingTax' => $withholdingTax,
                'baseTax' => $baseTax,
                'taxRate' => ($rate * 100) . '%',
                'incomeExcess' => $excess,
                'excessTax' => $excessTax,
                'bracket' => $bracketString,
                'minTax' => $minTax
            ];
        }
    }
     return [
        'withholdingTax' => 0,
        'baseTax' => 0,
        'taxRate' => 0,
        'incomeExcess' => 0,
        'excessTax' => 0,
        'bracket' => 'Unknown'
    ];
}

function calculateEffectiveTaxRate($monthly, $withholdingTax, $netPay) {
    $annualGross = $monthly * 12;
    $annualTax = $withholdingTax * 12;
    $annualNet = $netPay * 12;
    $effectiveTaxRate = $monthly > 0 ? ($annualTax / $annualGross) * 100 : 0;
    return [
        'annualGross' => $annualGross,
        'annualTax' => $annualTax,
        'annualNet' => $annualNet,
        'effectiveTaxRate' => $effectiveTaxRate
    ];
}
// main logic
// asks the server if the method of input is POST
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //filters and sanitize the input from the HTML
    $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    //converts string to decimal / float
    $salary = floatval($salary);
    // gets the input from selector
    $frequency = $_POST['frequency'];

    // input edge case : checks if numeric OR salary is negative number
    if(!is_numeric($salary) || $salary <= 0){
        // if so, salary will be have the value of 0. thus, not trigger
        // the system
        $salary = 0;
    }

    $sssTable = sssTable();
    $monthly = salaryConversion($salary, $frequency);
    $sssEmployee = sssEmployeeContribution($monthly, $sssTable);
    $philhealthEmployee = philhealthContribution($monthly);
    $pagibigEmployee = pagibigEmployeeContributions($monthly);
    $otherDeductions = otherDeductions($_POST['deductions'] ?? []);
    $totalEmployeeContribution = $sssEmployee + $philhealthEmployee + $pagibigEmployee;
   
    $sssEmployer = sssEmployerContribution($monthly, $sssTable);
    $philhealthEmployer = philhealthContribution($monthly);
    $pagibigEmployer = pagibigEmployerContributions($monthly);
    $totalEmployerContribution = $sssEmployer + $philhealthEmployer + $pagibigEmployer;

    $totalSssContribution = $sssEmployee + $sssEmployer;
    $totalPhilhealthContribution = $philhealthEmployee + $philhealthEmployer;
    $totalPagibigContribution = $pagibigEmployee + $pagibigEmployer;

    $taxableIncome = $monthly - ($totalEmployeeContribution + $otherDeductions);
    $trainLawData = calculateTrainTax($taxableIncome);
    $withholdingTax = $trainLawData['withholdingTax'];
    $netPay = $monthly - ($totalEmployeeContribution + $withholdingTax + $otherDeductions);
    $effectiveTaxRateData = calculateEffectiveTaxRate($monthly, $withholdingTax, $netPay);
    
    if($salary <= 0) {
        echo json_encode([
            'monthly' => '',
            'sssEmployee' => '',
            'sssEmployer' => '',
            'totalSssContribution' => '',
            'philhealthEmployee' => '',
            'philhealthEmployer' => '',
            'totalPhilhealthContribution' => '',
            'pagibigEmployee' => '',
            'pagibigEmployer' => '',
            'totalPagibigContribution' => '',
            'totalEmployeeContribution' => '',
            'totalEmployerContribution' => '',
            'taxableIncome' => '',
            'withholdingTax' => '',
            'otherDeductions' => '',
            'netPay' => ''
        ]);
        exit;
    }
    echo json_encode([
        'monthly' => $monthly,
        'sssEmployee' => $sssEmployee,
        'sssEmployer' => $sssEmployer,
        'totalSssContribution' => $totalSssContribution,
        'philhealthEmployee' => $philhealthEmployee,
        'philhealthEmployer' => $philhealthEmployer,
        'totalPhilhealthContribution' => $totalPhilhealthContribution,
        'pagibigEmployee' => $pagibigEmployee,
        'pagibigEmployer' => $pagibigEmployer,
        'totalPagibigContribution' => $totalPagibigContribution,
        'totalEmployeeContribution' => $totalEmployeeContribution,
        'totalEmployerContribution' => $totalEmployerContribution,
        'taxableIncome' => $taxableIncome,
        'withholdingTax' => $withholdingTax,
        'otherDeductions' => $otherDeductions,
        'netPay' => $netPay,
        'trainLawBreakdown' => $trainLawData,
        'effectiveTaxRate' => $effectiveTaxRateData
    ]);
}