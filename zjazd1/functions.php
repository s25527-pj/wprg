<?php
//zadanie1.1
function diceThrow() {
    return rand(1, 6);
}

//zadanie1.2
function getDiameter($r) {
    return $r * 2;
}

//zadanie 1.3
function hideCurseWords($sentence) {
    $clearedOutSentence = $sentence;
    $curseWords = array("bad", "stupid", "moron");
    foreach ($curseWords as $word) {
        $asterisk = str_repeat('*', strlen($word));
        $clearedOutSentence = str_ireplace($word, $asterisk, $clearedOutSentence);
    }
    return $clearedOutSentence;
}

//zadanie 1.4
function getBirthDateFromPesel($pesel) {
    $year = substr($pesel, 0, 2);
    $month = substr($pesel, 2, 2);
    $day = substr($pesel, 4, 2);

    if ($month > 20 && $month < 33) {
        $year += 2000;
        $month -= 20;
    } elseif ($month > 40 && $month < 53) {
        $year += 2100;
        $month -= 40;
    } elseif ($month > 60 && $month < 73) {
        $year += 2200;
        $month -= 60;
    } else {
        $year += 1900;
    }

    return $day . "-" . $month . "-" . $year;
}

//zadanie 1.5
function calculateTriangleArea() {
    $base = readline("Enter base length: ");
    $height = readline("Enter height length: ");
    return 0.5 * $base * $height;
}

function calculateRectangleArea() {
    $width = readline("Enter width: ");
    $height = readline("Enter height: ");
    return $width * $height;
}

function calculateTrapezeArea() {
    $a = readline("Enter base a length: ");
    $b = readline("Enter base b length: ");
    $height = readline("Enter height: ");
    return 0.5 * ($a + $b) * $height;
}

$figure = readline("Enter figure (triangle, rectangle or trapeze): ");

switch ($figure) {
    case "triangle":
        $area = calculateTriangleArea();
        break;
    case "rectangle":
        $area = calculateRectangleArea();
        break;
    case "trapeze":
        $area = calculateTrapezeArea();
        break;
    default:
        echo "Invalid figure entered.\n";
        exit;
}

echo "Area of " . $figure . " is: " . $area;
