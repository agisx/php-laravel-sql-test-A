<?php

$data = [
    [
        'no_transaction' => '001',
        'items' => [
            ['name' => 'Milk', 'total' => 4],
            ['name' => 'Coffee', 'total' => 2],
        ]
    ],
    [
        'no_transaction' => '002',
        'items' => [
            ['name' => 'Tea', 'total' => 7],
            ['name' => 'Sugar', 'total' => 1],
            ['name' => 'Coffee', 'total' => 5],
        ]
        ],
        [
            'no_transaction' => '003',
            'items' => [
                ['name' => 'Tea', 'total' => 7],
                ['name' => 'Sugar', 'total' => 1],
                ['name' => 'Coffee', 'total' => 5],
            ]
        ]

];

for ($i=0; $i < count($data); $i++) { 
    echo $data[$i]['no_transaction'] . "\n";
    for ($j=0; $j < count($data[$i]['items']); $j++) { 
        echo " " . $data[$i]['items'][$j]['name'] . ' (' . $data[$i]['items'][$j]['total'] . ')' ."\n";
    }
}

// Output:
//
// 001
//   Milk (4)
//   Coffee (2)
// 002
//   Tea (7)
//   Coffee (5)

// write your solution below this line