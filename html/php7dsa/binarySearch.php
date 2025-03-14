<?php

// function binarySearch(array $elements, int $needle) : bool {
//     $lower = 0;
//     $higher = count($elements) - 1;

//     while ($lower <= $higher) {
//         $middle = (int) (($lower + $higher) / 2);

//         if ($elements[$middle] > $needle) {
//             $higher = $middle - 1;
//         } else if ($elements[$middle] < $needle) {
//             $lower = $middle + 1;
//         } else {
//             return TRUE;
//         }
//     }
//     return FALSE;
// }


function binarySearch(array $elements, int $needle, int $lower, int $upper) : bool {

    if ($upper < $lower) {
        return FALSE;
    }

    $middle = (int) (($lower + $upper) / 2);

    if ($elements[$middle] > $needle) {
        return binarySearch($elements, $needle, $lower, $middle - 1);
    } else if ($elements[$middle] < $needle) {
        return binarySearch($elements, $needle, $middle+1, $upper);
    } else {
        return TRUE;
    }
}

$nums = range(1, 200, 5);

$num = 31;
if (binarySearch($nums, $num, 0, count($nums)-1) !== FALSE) {
    echo "Num found!<br>";
} else {
    echo "Num nt fnd<br>";
}

$num = 500;
if (binarySearch($nums, $num, 0, count($nums)-1) !== FALSE) {
    echo "Num found!<br>";
} else {
    echo "Num nt fnd<br>";
}