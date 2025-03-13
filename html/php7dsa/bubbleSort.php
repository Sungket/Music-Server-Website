<?php

function bubbleSort(array $arr) : array {
    $len = count($arr);

    for ($i = 0; $i < $len; $i++) {
        $swapped = FALSE;
        for ($j = 0; $j < $len - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
                $swapped = TRUE;
            }
        }
        if(! $swapped) break;
    }
    return $arr;
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88,33, 92];
$sortedArray = bubbleSort($arr);
echo implode(",", $sortedArray);