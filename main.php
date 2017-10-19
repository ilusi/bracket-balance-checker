<?php

$tests = [
    '1' => '{[()]}',   // Good
    '2' => '{[(])}',   // Bad
    '3' => '{{[[(())]]}}', // Good
];

// Brackets == Parenthesis
function bracketsBalanceChecker($input) {
    // We omit the function if the input is the number of tests (n) or if it's a string but odd number.
    if (is_string($input) && !(count(str_split($input)) % 2)) {
        $p = ['{' => '}', '[' => ']', '(' => ')']; // Paranthesis
        $comp = [];   // Complements as a FIFO Data Structure

        for ($i = 0; $i < strlen($input); $i++) {
            // If we've seen an opening bracket, the complement will remove it from the Queue.
            if (!empty($comp) && ($input[$i] == $comp[0])) {
                array_shift($comp);
            }
            
            // If it's one of the brackets, then store the complement.
            if (isset($p[$input[$i]])) {
                array_unshift($comp, $p[$input[$i]]);
            }
        }
        
        echo empty($comp) ? 'YES' : 'NO';
        echo PHP_EOL;
    }
}

bracketsBalanceChecker(count($tests));

foreach ($tests as $test) {
    echo bracketsBalanceChecker($test) . PHP_EOL;
}
