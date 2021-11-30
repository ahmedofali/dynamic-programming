<?php

function bestSum($targetNum, $numbers, &$memo = [])
{
    if(isset($memo[$targetNum])) return $memo[$targetNum];
    if ($targetNum === 0) return [];
    if ($targetNum < 0) return null;

    $leastCombination = null;

    foreach ($numbers as $number) {
        $remainder            = $targetNum - $number;
        $remainderCombination = bestSum($remainder, $numbers, $memo);

        if ($remainderCombination !== null) {
            $combination = array_merge($remainderCombination, [$number]);

            if (is_null($leastCombination) || sizeof($remainderCombination) < sizeof($leastCombination)) {
                $leastCombination = $combination;
            }
        }
    }

    $memo[$targetNum] = $leastCombination;
    return $leastCombination;
}

// Brute Force Solution
//  Time complexity: O(n^m *m)
//  Space complexity: O(m^2)

// Memoization Solution
//  Time complexity: O(n*m^2)
//      every target sum is going to be a key on the memo array if target sum = 50 then we might have a memo of 50 keys
//      Copying the array over and over we could copy it m time
//  Space complexity: O(m^2)
//      The memo object will hold m keys with arrays of m length

var_dump(bestSum(50, [2, 3, 4, 7]));