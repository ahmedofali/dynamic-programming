<?php

function canSum($target, $numbers, &$memo = [])
{
    if(isset($memo[$target])) return $memo[$target];
    if ($target === 0) return true;
    if ($target < 0) return false;

    foreach ($numbers as $number) {
        $remainder = $target - $number;
        if(canSum($remainder, $numbers)) {
            $memo[$target] = true;
            return true;
        }
    }

    $memo[$target] = false;
    return false;
}

echo canSum(301, [7, 14, 1, 2,3,4,5]);