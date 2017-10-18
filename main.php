<?php

$tests = [
    'test1' => '{[()]}',   // Good
    'test2' => '{[(])}',   // Bad
    'test3' => '{{[[(())]]}}', // Good
];

function bracketsBalanceChecker($data) {
    $p = ['{' => '}', '[' => ']', '<' => '>', '(' => ')']; // Paranthesis
    $comp = [];   // Complements
    $data = str_split($data);
    
    //echo PHP_EOL . implode($data) . PHP_EOL;
    
    if (count($data) % 2) {
        $comp = $data;
    } else {
        foreach ($data as $k => $v) {
            if (!empty($comp) && ($data[$k] == $comp[0])) {
                array_shift($comp);
            }
            
            if (isset($p[$data[$k]])) {
                array_unshift($comp, $p[$data[$k]]);
            }
        }
    }
    
    return empty($comp) ? 'YES' : 'NO';
}

foreach ($tests as $test) {
    echo bracketsBalanceChecker($test) . PHP_EOL;
}
