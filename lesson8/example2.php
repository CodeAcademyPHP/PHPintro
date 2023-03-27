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

$newArray = [];
$priceArray = [];

if ($argv[1] === "get_total") {
    $totalCount = 0;
    $totalCost = 0;
    foreach ($inventory as $key => $value) {
        $totalCount += $value['count'];
        $totalCost += $value['count'] * $value['price'];
    }
    echo "Total count: ".$totalCount.PHP_EOL;
    echo "Total cost: ".$totalCost.PHP_EOL;
} else {
    foreach (explode(' ', $argv[1]) as $data) {
        $newData = explode(':', $data);
        $newArray[] = $newData[1]." ".$newData[0];
    }

    $error = false;
    foreach ($inventory as $key => $item) {
        foreach ($newArray as $array) {
            $newData = explode(' ', $array);
            if ($key === $newData[1]) {
                if ($newData[0] > $item['count']) {
                    echo 'Error!'.PHP_EOL.'We only have '.$item['count'].' '.$key.', you asked '.$newData[0].' '.$key;
                    $error = true;
                } else {
                    $priceArray[$newData[1]] = [
                        'amount' => $newData[0],
                        'price' => $item['price']
                    ];
                }
            }
        }
    }

    if (!$error) {
        echo "You bought: ".implode(' ', $newArray).PHP_EOL;
        $sum = 0;
        foreach ($priceArray as $key => $value) {
            echo $key.PHP_EOL;
            $string = " ".$value['amount'] ."*". $value['price']." ";
            echo $string ." = ". $value['amount'] * $value['price'].PHP_EOL;
            echo "*****".PHP_EOL;
            $sum += $value['amount'] * $value['price'];
            echo "Total: ".$sum;
        }
    }
}

//1.5 Write a new command that is capable to work with nested warehouse array, named $categories.
//It should be able to find the ordered item within 'items' array of a category.
//It should print all the output, that commands 1.1 - 1.4 are able to print.
//Assume, that categories can be at most two levels deep - like fruits->exotic_fruits
//
//$categories = [
//    'fruits' => [
//        'type' => 'category',
//        'items' => [
//            'apple' => [
//                'count' => 5,
//                'price' => 0.15,
//            ],
//            'pear' => [
//                'count' => 5,
//                'price' => 0.15,
//            ],
//        ],
//        'categories' => [
//            'exotic_fruits' => [
//                'type' => 'category',
//                'items' => [
//                    'banana' => [
//                        'count' => 15,
//                        'price' => 0.3,
//                    ],
//                ],
//            ],
//        ],
//    ],
//    'vegetables' => [
//        'type' => 'category',
//        'items' => [
//            'carrot' => [
//                'count' => 100,
//                'price' => 0.01,
//            ],
//            'tomato' => [
//                'count' => 45,
//                'price' => 0.5,
//            ],
//        ],
//    ],
//    'seafood' => [
//        'type' => 'category',
//        'items' => [
//            'seabass' => [
//                'count' => 15,
//                'price' => 5.5,
//            ],
//        ],
//    ],
//    'alcohol' => [
//        'type' => 'category',
//        'items' => [
//            'beer_bottle' => [
//                'count' => 22,
//                'price' => 1.3,
//            ],
//            'wine_bottle' => [
//                'count' => 4,
//                'price' => 8,
//            ],
//        ],
//    ],
//    'milk' => [
//        'type' => 'category',
//        'items' => [
//            'cheese' => [
//                'count' => 1,
//                'price' => 4.5,
//            ],
//            'yoghurt' => [
//                'count' => 13,
//                'price' => 0.99,
//            ],
//        ],
//    ],
//    'bread' => [
//        'type' => 'category',
//        'items' => [
//            'brown_bread' => [
//                'count' => 11,
//                'price' => 2.1,
//            ],
//            'white_bread' => [
//                'count' => 110,
//                'price' => 1.3,
//            ],
//        ],
//    ],
//];
