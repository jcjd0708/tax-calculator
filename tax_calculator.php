<?php
// it gets the sss employee contribution based on salary input
function sssEmployeeContribution($salary, $rate = 0.05) {
    // checks if its more than zero. its a fallback so dont worry
    if($salary < 0) {
        return 0;
    }
    // created a associative array to make a table based on 2025 tax table of sss.
    $salaryRange = [
        ['min' => 0, 'max' => 5249.99, 'msc' => 5000, 'mpf' => 0],
        ['min' => 5250, 'max' => 5749.99, 'msc' => 5500, 'mpf' => 0],
        ['min' => 5750, 'max' => 6249.99, 'msc' => 6000, 'mpf' => 0 ],
        ['min' => 6250, 'max' => 6749.99, 'msc' => 6500 , 'mpf' => 0],
        ['min' => 6750, 'max' => 7249.99, 'msc' => 7000 , 'mpf' => 0],
        ['min' => 7250, 'max' => 7749.99, 'msc' => 7500 , 'mpf' => 0],
        ['min' => 7750, 'max' => 8249.99, 'msc' => 8000 , 'mpf' => 0],
        ['min' => 8250, 'max' => 8749.99, 'msc' => 8500 , 'mpf' => 0],
        ['min' => 8750, 'max' => 9249.99, 'msc' => 9000 , 'mpf' => 0],
        ['min' => 9250, 'max' => 9749.99, 'msc' => 9500, 'mpf' => 0],
        ['min' => 9750, 'max' => 10249.99, 'msc' => 10000 , 'mpf' => 0],
        ['min' => 10250, 'max' => 10749.99, 'msc' => 10500 , 'mpf' => 0],
        ['min' => 10750, 'max' => 11249.99, 'msc' => 11000, 'mpf' => 0],
        ['min' => 11250, 'max' => 11749.99, 'msc' => 11500, 'mpf' => 0],
        ['min' => 11750, 'max' => 12249.99, 'msc' => 12000, 'mpf' => 0],
        ['min' => 12250, 'max' => 12749.99, 'msc' => 12500, 'mpf' => 0],
        ['min' => 12750, 'max' => 13249.99, 'msc' => 13000, 'mpf' => 0],
        ['min' => 13250, 'max' => 13749.99, 'msc' => 13500, 'mpf' => 0],
        ['min' => 13750, 'max' => 14249.99, 'msc' => 14000, 'mpf' => 0],
        ['min' => 14250, 'max' => 14749.99, 'msc' => 14500, 'mpf' => 0],
        ['min' => 14750, 'max' => 15249.99, 'msc' => 15000, 'mpf' => 0],
        ['min' => 15250, 'max' => 15749.99, 'msc' => 15500, 'mpf' => 0],
        ['min' => 15750, 'max' => 16249.99, 'msc' => 16000, 'mpf' => 0],
        ['min' => 16250, 'max' => 16749.99, 'msc' => 16500, 'mpf' => 0],
        ['min' => 16750, 'max' => 17249.99, 'msc' => 17000, 'mpf' => 0],
        ['min' => 17250, 'max' => 17749.99, 'msc' => 17500, 'mpf' => 0],
        ['min' => 17750, 'max' => 18249.99, 'msc' => 18000, 'mpf' => 0],
        ['min' => 18250, 'max' => 18749.99, 'msc' => 18500, 'mpf' => 0],
        ['min' => 18750, 'max' => 19249.99, 'msc' => 19000, 'mpf' => 0],
        ['min' => 19250, 'max' => 19749.99, 'msc' => 19500, 'mpf' => 0],
        ['min' => 19750, 'max' => 20249.99, 'msc' => 20000, 'mpf' => 0],
        ['min' => 20250, 'max' => 20749.99, 'msc' => 20000, 'mpf' => 25],
        ['min' => 20750, 'max' => 21249.99, 'msc' => 20000, 'mpf' => 50],
        ['min' => 21250, 'max' => 21749.99, 'msc' => 20000, 'mpf' => 75],
        ['min' => 21750, 'max' => 22249.99, 'msc' => 20000, 'mpf' => 100],
        ['min' => 22250, 'max' => 22749.99, 'msc' => 20000, 'mpf' => 125],
        ['min' => 22750, 'max' => 23249.99, 'msc' => 20000, 'mpf' => 150],
        ['min' => 23250, 'max' => 23749.99, 'msc' => 20000, 'mpf' => 175],
        ['min' => 23750, 'max' => 24249.99, 'msc' => 20000, 'mpf' => 200],
        ['min' => 24250, 'max' => 24749.99, 'msc' => 20000, 'mpf' => 225],
        ['min' => 24750, 'max' => 25249.99, 'msc' => 20000, 'mpf' => 250],
        ['min' => 25250, 'max' => 25749.99, 'msc' => 20000, 'mpf' => 275],
        ['min' => 25750, 'max' => 26249.99, 'msc' => 20000, 'mpf' => 300],
        ['min' => 26250, 'max' => 26749.99, 'msc' => 20000, 'mpf' => 325],
        ['min' => 26750, 'max' => 27249.99, 'msc' => 20000, 'mpf' => 350],
        ['min' => 27250, 'max' => 27749.99, 'msc' => 20000, 'mpf' => 375],
        ['min' => 27750, 'max' => 28249.99, 'msc' => 20000, 'mpf' => 400],
        ['min' => 28250, 'max' => 28749.99, 'msc' => 20000, 'mpf' => 425],
        ['min' => 28750, 'max' => 29249.99, 'msc' => 20000, 'mpf' => 450],
        ['min' => 29250, 'max' => 29749.99, 'msc' => 20000, 'mpf' => 475],
        ['min' => 29750, 'max' => 30249.99, 'msc' => 20000, 'mpf' => 500],
        ['min' => 30250, 'max' => 30749.99, 'msc' => 20000, 'mpf' => 525],
        ['min' => 30750, 'max' => 31249.99, 'msc' => 20000, 'mpf' => 550],
        ['min' => 31250, 'max' => 31749.99, 'msc' => 20000, 'mpf' => 575],
        ['min' => 31750, 'max' => 32249.99, 'msc' => 20000, 'mpf' => 600],
        ['min' => 32250, 'max' => 32749.99, 'msc' => 20000, 'mpf' => 625],
        ['min' => 32750, 'max' => 33249.99, 'msc' => 20000, 'mpf' => 650],
        ['min' => 33250, 'max' => 33749.99, 'msc' => 20000, 'mpf' => 675],
        ['min' => 33750, 'max' => 34249.99, 'msc' => 20000, 'mpf' => 700],
        ['min' => 34250, 'max' => 34749.99, 'msc' => 20000, 'mpf' => 725],
        ['min' => 34750, 'max' => INF, 'msc' => 20000, 'mpf' => 750]
    ];
    // Loop through each salary bracket to find matching range
    foreach($salaryRange as $row) {
        // if the salary is more than min AND if the salary is less than max row, 
        // it returns the msc times the rate plus the mpf 
        if($salary >= $row['min'] && $salary <= $row['max']) {
            return $row['msc'] * $rate + $row['mpf'];
        }
    }
    // a fallback
    return 0;
}

// it gets the sss employer contribution based on salary input
function sssEmployerContribution($salary, $rate = 0.1) {
    // same as above, a fallback
    if($salary < 0) {
        return 0;
    }
    // again, a table for 2025 sss tax table but for employers
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
    foreach($salaryRange as $row) {
        // same as above, but this time, it has an additional key value of ec.
        if($salary >= $row['min'] && $salary <= $row['max']) {
            return $row['msc'] * $rate + $row['mpf'] + $row['ec'];
        }
    }
    return 0;
}

// it gets the philhealth employee contribution based on salary input
// philhealth uses the same formula for employers.
function philhealthContribution($salary, $rate = 0.04) {
    $min = 10000;
    $max = 100000;
    // below minimum ; uses minimum rate
    if($salary <= $min) {
        return ($min * $rate) / 2;
    }
    // within range ; uses salary as base
    if($salary <= $max) {
        return ($salary * $rate) / 2;
    } else {
        // above maximum, uses maximum rate
        return ($max * $rate) / 2;
    }
}

// it gets the pagibig employee contribution based on salary input
function pagibigEmployeeContributions($salary, $rate = 0.02) {
    $min = 1500;
    $max = 10000;
    // below minimum; it uses salary as base and the rate inside if
    if($salary <= $min) {
        $rate = 0.01;
        return $salary * $rate;
        // above maximum; it uses max as base and the rate inside param
    } else if ($salary > $max) {
        return $max * $rate;
    } else {
        // within range : it uses salary as base and the rate inside param
        return $salary * $rate;
    }
}

// it gets the pagibig employer contribution based on salary input
function pagibigEmployerContributions($salary, $rate = 0.02) {
    $max = 10000;
    if($salary > $max) {
        return $max * $rate;
    } else {
        return $salary * $rate;
    }
}

// it converts salary frequency into monthly.
function salaryConversion($salary, $frequency) {
    // used associative array to create a table that calls the key 
    // whenever they clicked the dropdown menu.
    $frequencyMap = [
        'semi-monthly' => 2,
        'weekly' => 4.333,
        'daily' => 22,
        'annually' => 1/12,
        'monthly' => 1
    ];
    // Checks if frequency exists in the map and returns converted salary
    // If frequency key exists, multiply salary by the conversion factor
    if(isset($frequencyMap[$frequency])) {
        return $salary * $frequencyMap[$frequency];
    }
    // a fallback, incase there is a bug.
    return $salary;
}

// it calculates the tax based on taxable income.
function calculateTrainTax($taxableIncome) {
    // fallback
    if($taxableIncome < 0) {
        return [
            'withholdingTax' => 0,
            'baseTax' => 0,
            'taxRate' => 0 . '%',
            'incomeExcess' => 0,
            'bracket' => 'Below Minimum'
        ];
    }
    // a table with key values 
    $salaryRange = [
        ['min' => 0, 'max' => 20833, 'tax' => 0, 'rate' => 0],
        ['min' => 20833, 'max' => 33332, 'tax' => 0, 'rate' => .15],
        ['min' => 33333, 'max' => 66666, 'tax' => 1875, 'rate' => .2],
        ['min' => 66667, 'max' => 166666, 'tax' => 8541.80, 'rate' => .25],
        ['min' => 166667, 'max' => 666666, 'tax' => 33541.80, 'rate' => .3],
        ['min' => 666667, 'max' => INF, 'tax' => 183541.80, 'rate' => .35]
    ];
    // loops thru each array as row
    foreach($salaryRange as $row) {
        // same process in sss, if the $taxable income is more than min AND less than max, 
        // it will give the value tax and rate associates to it
        if($taxableIncome >= $row['min'] && $taxableIncome <= $row['max']) {
            $rate = $row['rate'];
            $baseTax = $row['tax'];
            $minTax = $row['min'];
            // excess gets the difference of taxable income and mintax
            $excess = $taxableIncome - $minTax;
            // excess tax is the product of excess and rate
            $excessTax = $excess * $rate;
            // withholdingtax is the sum of excesstax and basetax
            $withholdingTax = $excessTax + $baseTax;
            // just a simple ternary operator that determines whether or not the MAX key is infinite or not
            $maxDisplay = $row['max'] == INF ? 'Above' : '₱' . number_format($row['max']);
            $bracketString = '₱' . number_format($row['min']) . ' - '  . $maxDisplay;
            // returns the key value based on the if statement
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
    // a fallback
    return [
        'withholdingTax' => 0,
        'baseTax' => 0,
        'taxRate' => 0,
        'incomeExcess' => 0,
        'excessTax' => 0,
        'bracket' => 'Unknown'
    ];
}

// added a deduction function as requirements
function otherDeductions() {
    // sets the variable to 0
    $otherDeductions = 0;
    // checks if it is set AND an array
    if(isset($_POST['deductions']) && is_array($_POST['deductions'])) {
        // loops thru deductions array as deduction
        foreach($_POST['deductions'] as $deduction) {
            // adds each deduction to other deductions.
            $otherDeductions += floatval($deduction);
        }
    }
    // returns the sum(if theres any) of deduction
    return $otherDeductions;
}

// calculates the effective tax rate
function calculateEffectiveTaxRate($monthly, $withholdingTax, $netPay) {
    // converts these values into annually
    $annualGross = $monthly * 12;
    $annualTax = $withholdingTax * 12;
    $annualNet = $netPay * 12;
    // Fallback to 0 if monthly salary is 0 (avoid division by zero)
    $effectiveTaxRate = $monthly > 0 ? ($annualTax / $annualGross) * 100 : 0;
    // returns the key value
    return [
        'annualGross' => $annualGross,
        'annualTax' => $annualTax,
        'annualNet' => $annualNet,
        'effectiveTaxRate' => $effectiveTaxRate
    ];

    
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $salary = floatval($_POST['salary']);
    $frequency = $_POST['frequency'];
    
    $monthly = salaryConversion($salary, $frequency);
    $sssEmployee = sssEmployeeContribution($monthly);
    $philhealthEmployee = philhealthContribution($monthly);
    $pagibigEmployee = pagibigEmployeeContributions($monthly);
    $otherDeductions = otherDeductions();
    $totalEmployeeContribution = $sssEmployee + $philhealthEmployee + $pagibigEmployee;
   
    $sssEmployer = sssEmployerContribution($monthly);
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
    
    // a simple fallback if the salary is less than or equal to 0
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
    // returns the key values as JSON response
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