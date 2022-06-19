<?php

//$variable = 12;
//$variable2 = 15;

//if (12 === 11) {
//    var_dump($variable2 + $variable);
//} else {
//    echo 0;
//}
//
//(12 === 11) ? var_dump('labas') : var_dump('nepavyko');

//$vardas = 'Monika';

//$i = 0;
//while ($i < 10) {
//    echo $i;
//    echo PHP_EOL;
//    $i++;
//}
//
//for ($i = 0; $i < 10; $i++) {
//    echo $i;
//    echo PHP_EOL;
//}

$array = [
    'reiksme1',
    'reiksme2',
    'reiksme3',
    'reiksme4',
    'reiksme6',
    'reiksme7',
    'reiksme8'
];

foreach ($array as $reiksme) {
    if ($reiksme === 'reiksme3') {
        break;
    }

    echo $reiksme . PHP_EOL;
}


$i = 0;

while ($i < 5) {
    echo $i;
}