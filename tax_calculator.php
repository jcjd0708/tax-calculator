<?php

function sssContribution($salary, $rate = 0.05) {
    if($salary < 0) {
        return 0;
    }
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
    foreach($salaryRange as $row) {
        if($salary >= $row['min'] && $salary <= $row['max']) {
            return $row['msc'] * $rate + $row['mpf'];
        }
    }
    return 0;
}

function philhealthContribution($salary, $rate = 0.05) {
    $min = 10000;
    $max = 100000;
    if($salary <= $min) {
        return ($min * $rate) / 2;
    }
    if($salary <= $max) {
        return ($salary * $rate) / 2;
    } else {
        return ($max * $rate) / 2;
    }
}

function pagibigContributions($salary, $rate = 0.02) {
    $min = 1500;
    $max = 10000;
    if($salary <= $min) {
        $rate = 0.01;
        return $salary * $rate;
    } else if ($salary > $max) {
        return $max * $rate;
    } else {
        return $salary * $rate;
    }
}

function salaryConversion($salary, $frequency) {
    $frequencyMap = [
        'semi-monthly' => 2,
        'weekly' => 4.333,
        'daily' => 22,
        'annually' => 1/12,
        'monthly' => 1
    ];

    if(isset($frequencyMap[$frequency])) {
        return $salary * $frequencyMap[$frequency];
    }
    return $salary;
}

function calculateTrainTax($taxableIncome) {
    if($taxableIncome < 0) {
        return 0;
    }
    
    $salaryRange = [
        ['min' => 0, 'max' => 20833, 'tax' => 0, 'rate' => 0],
        ['min' => 20833, 'max' => 33332, 'tax' => 0, 'rate' => .15],
        ['min' => 33333, 'max' => 66666, 'tax' => 1875, 'rate' => .2],
        ['min' => 66667, 'max' => 166666, 'tax' => 8541.80, 'rate' => .25],
        ['min' => 166667, 'max' => 666666, 'tax' => 33541.80, 'rate' => .3],
        ['min' => 666667, 'max' => INF, 'tax' => 183541.80, 'rate' => .35]
    ];
    foreach($salaryRange as $row) {
        if($taxableIncome >= $row['min'] && $taxableIncome <= $row['max']) {
            return $row['tax'] + (($taxableIncome - $row['min']) * $row['rate']);
        }
    }
    return 0;
} 

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $salary = floatval($_POST['salary']);
    $frequency = $_POST['frequency'];
    
    $monthly = salaryConversion($salary, $frequency);
    $sss = sssContribution($monthly);
    $philhealth = philhealthContribution($monthly);
    $pagibig = pagibigContributions($monthly);
    $totalContributions = $sss + $philhealth + $pagibig;
    $taxableIncome = $monthly - $totalContributions;
    $trainTax = calculateTrainTax($taxableIncome);
    
    if($salary <= 0) {
        echo json_encode([
            'monthly' => '',
            'sss' => '',
            'philhealth' => '',
            'pagibig' => '',
            'totalContributions' => '',
            'taxableIncome' => '',
            'trainTax' => ''
        ]);
        exit;
    }

    echo json_encode([
        'monthly' => $monthly,
        'sss' => $sss,
        'philhealth' => $philhealth,
        'pagibig' => $pagibig,
        'totalContributions' => $totalContributions,
        'taxableIncome' => $taxableIncome,
        'trainTax' => $trainTax
    ]);
}