<?php

$test1 = '{[]}';   // Good
$test2 = '{[}]';   // Bad
$test3 = '{}[]()'; // Good
$test4 = '{[}]}';  // Bad

function bracketsBalanceChecker($data) {
    $p = ['{' => '}', '[' => ']', '<' => '>', '(' => ')']; // Paranthesis
    $comp = [];   // Complements
    $data = str_split($data);
    
    echo PHP_EOL . implode($data) . PHP_EOL;
    
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
    
    return empty($comp) ? 'Balanced' : 'Not Balanced';
}

print_r(bracketsBalanceChecker($test1));
print_r(bracketsBalanceChecker($test2));
print_r(bracketsBalanceChecker($test3));
print_r(bracketsBalanceChecker($test4));
