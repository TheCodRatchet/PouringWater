<?php

require 'Case1.php';
require 'Case2.php';
require 'CheckCases.php';

$t = (int)readline("Enter number of test cases:");

$allSteps = [];

for ($i = 0; $i < $t; $i++) {
    $a = (int)readline("Enter 1st vessels capacity:");
    $b = (int)readline("Enter 2nd vessels capacity:");
    $c = (int)readline("Enter required amount in one of the vessels:");

    //checks if vessels are not smaller than required amount
    if ($a < $c && $b < $c) {
        $allSteps[] = -1;
        continue;
    }

    //checks if vessels are same size, but not equal with required amount
    if ($a === $b && $b != $c) {
        $allSteps[] = -1;
        continue;
    }

    //checks if vessels size are even numbers and required amount is odd number
    if ($a % 2 === 0 && $b % 2 === 0 && $c % 2 === 1) {
        $allSteps[] = -1;
        continue;
    }

    //checks if any of vessels size are equal to required amount
    if ($a === $c || $b === $c) {
        $allSteps[] = 1;
        continue;
    }

    //test cases
    $caseCheck = new CheckCases(new Case1(), new Case2());

    //steps for each test case
    $steps = $caseCheck->cases($a, $b, $c);

    //chooses case with the lowest step count
    $allSteps[] = min($steps);
}

//output
foreach ($allSteps as $steps) {
    echo $steps . PHP_EOL;
}