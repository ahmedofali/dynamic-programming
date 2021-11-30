<?php


function gridTraveler(int $rows, int $columns, &$memory = [])
{
    if (isset($memory[$rows][$columns])) return $memory[$rows][$columns];
    if ($rows === 1 && $columns === 1) return 1;
    if ($rows === 0 || $columns === 0) return 0;

    $result = gridTraveler($rows - 1, $columns, $memory) + gridTraveler($rows, $columns - 1, $memory);

    $memory[$rows][$columns] = $result;
    $memory[$columns][$rows] = $result;

    return $memory[$rows][$columns];
}

gridTraveler(5,4);