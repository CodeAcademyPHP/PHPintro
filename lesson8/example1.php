<?php

$inventory = [
    'apple' => [
        'count' => 5,
        'price' => 0.15,
    ],
    'carrot' => [
        'count' => 100,
        'price' => 0.01,
    ],
    'fish' => [
        'count' => 15,
        'price' => 5.5,
    ],
    'beer_bottle' => [
        'count' => 22,
        'price' => 1.3,
    ],
    'cheese' => [
        'count' => 1,
        'price' => 4.5,
    ],
    'wine_bottle' => [
        'count' => 4,
        'price' => 8,
    ],
    'bread' => [
        'count' => 11,
        'price' => 2.1,
    ],
];

$arguments = explode(' ', implode(' ', $argv));

if (in_array('get_total', $argv)) {
    $totalCount = array_reduce($inventory,
        function (float $n, array $count) {
            return $n + $count['count'];
        }, 0);

    $totalCost = array_reduce($inventory,
        function (float $n, array $price) {
            return $n + $price['count'] * $price['price'];
        }, 0);
    echo 'Total count: ' . $totalCount . PHP_EOL . 'Total cost: ' . $totalCost . PHP_EOL;
    exit;
}

$prepraredArguments = [];
foreach ($arguments as $key => $value) {
    if (preg_match('/[:]/', $value)) {
        $explodedValues = explode(':', $value);
        $prepraredArguments[$explodedValues[0]] = [$explodedValues[1]];
    }
};

$finalProductArray = [];
foreach ($prepraredArguments as $key => $value) {
    foreach ($value as $subKey => $subValue) {
        $a = array_fill_keys(['purchased'], $subValue);
        $finalProductArray[$key] = $a;
    }
};


$inventoryProducts = [];
foreach ($inventory as $product => $value) {
    foreach ($finalProductArray as $item => $purchased) {
        if ($product === $item) {
            $inventoryProducts[$product] = $value + $purchased;
        }
    }
}

//$inventoryProducts = [];
//foreach ($inventory as $item => $value) {
//    foreach ($value as $subKey => $number) {
//        if(key_exists('purchased', $value)) {
//            $inventoryProducts[$item] = $value;
//        }
//    }
//}


$overboughtProducts = [];
foreach ($inventoryProducts as $key => $val) {
    if ($val['purchased'] > $val['count']) {
        $overboughtProducts[$key] = $val;
    }
}

if (!empty($overboughtProducts)) {
    echo 'Error!' . PHP_EOL;
    foreach ($overboughtProducts as $key => $val) {
        echo 'We only have ' . $val['count'] . ' ' . $key . ', you asked ' . $val['purchased'] . PHP_EOL;
    }

} else {

    $toEcho = [];

    foreach ($inventoryProducts as $item => $value) {
        $toEcho[] = $value['purchased'] . ' ' . $item;
    }

    echo 'You bought: ' . implode(', ', $toEcho) . PHP_EOL . '*****' . PHP_EOL;

    foreach ($inventoryProducts as $item => $value) {

        $total = number_format($value['purchased'] * $value['price'], 2);
        $purchased = number_format($value['purchased'], 2);
        $price = number_format($value['price'], 2);
        echo $item . PHP_EOL . $price . ' * ' . $purchased . ' = ' . $total . PHP_EOL . '*****' . PHP_EOL;

        $totalArray[] = $total;
        $sumToPay = array_sum($totalArray);
    }
    echo 'Total: ' . $sumToPay;
}