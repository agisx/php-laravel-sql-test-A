<?php

$customers = ['rio', 'ari', 'yuki'];

$contacts = [
    'ari' => '84684646',
    'dewi' => '47464524',
    'beni' => '4734526',
    'rio' => '4774525',
    'fitri' => '74563734',
];

for ($i=0; $i < count($customers); $i++) { 
    echo isset( $contacts[$customers[$i]]) ? $customers[$i]. ': ' . $contacts[$customers[$i]] : $customers[$i] . ': no contact';
    echo "\n";
}


// Output:
//
// rio: 4774525
// ari: 84684646
// yuki: no contact

// write your solution below this line