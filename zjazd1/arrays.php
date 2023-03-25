<?php
//zadanie 2.1
function getRandomFromNineNumbers($index) {
    $randomNumbers = array(3, 8, 1, 6, 4, 9, 7, 2, 5);
    return $randomNumbers[$index];
}

//zadanie 2.2
$nationMap = array(
    "poland" => "polish",
    "japan" => "japanese",
    "france" => "french",
    "spain" => "spanish",
    "germany" => "german",
);

$country = readline("Enter a country name: ");

if (array_key_exists($country, $nationMap)) {
    $nationality = $nationMap[$country];
    echo "The nationality of $country is $nationality.\n";
} else {
    echo "Sorry, we don't have the nationality for $country.\n";
}