<?php

$stations = [
    'kone'   => ['id', 'nv', 'ut'],
    'ktwo'   => ['id', 'wa', 'mt'],
    'kthree' => ['or', 'nv', 'ca'],
    'ktfour' => ['nv', 'ut'],
    'ktfive' => ['ca', 'az'],
];

$citiesNeeded = ['id', 'nv', 'ut', 'wa', 'mt', 'or', 'ca', 'az'];

$finalStates = [];

while (sizeof($citiesNeeded)) {
    $statesCovered = [];
    $bestStation   = null;

    foreach ($stations as $stationName => $coveredCities) {
        $covered = array_intersect($citiesNeeded, $coveredCities);

        if (sizeof($covered) > sizeof($statesCovered)) {
            $bestStation   = $stationName;
            $statesCovered = $covered;
        }
    }

    $citiesNeeded = array_diff($citiesNeeded, $statesCovered);
    $finalStates[] = $bestStation;
}

var_dump($finalStates);die;