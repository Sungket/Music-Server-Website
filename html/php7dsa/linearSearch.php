<?php

function search(array $numbers, int $needle) : bool {
    $totalItems = count($numbers);

    for ($i = 0; $i < $totalItems; $i++) {
        if ($numbers[$i] === $needle) {
            return TRUE;
        }
    }
    return FALSE;
}