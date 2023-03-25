<?php
//zad 3.1
function findMaxFor($arr) {
    $max = $arr[0];
    $length = count($arr);
    for ($i = 1; $i < $length; $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
    }
    return $max;
}

function findMaxWhile($arr) {
    $max = $arr[0];
    $i = 1;
    $length = count($arr);
    while ($i < $length) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
        $i++;
    }
    return $max;
}

function findMaxDoWhile($arr) {
    $max = $arr[0];
    $i = 1;
    $length = count($arr);
    do {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
        $i++;
    } while ($i < $length);
    return $max;
}

function findMaxForEach($arr) {
    $max = $arr[0];
    foreach ($arr as $value) {
        if ($value > $max) {
            $max = $value;
        }
    }
    return $max;
}

//zad 3.2
function diceThrow($rolls) {
    $results = array();
    for ($i = 0; $i < $rolls; $i++) {
        $results[] = rand(1, 6);
    }
    return $results;
}

//zad 3.3
function multiplicationTable($sideLength) {
    for ($i = 1; $i <= $sideLength; $i++) {
        for ($j = 1; $j <= $sideLength; $j++) {
            $product = $i * $j;
            echo str_pad($product, 4, " ", STR_PAD_LEFT);
        }
        echo "\n";
    }
}
