<?php

require 'Case1.php';
require 'Case2.php';

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
    $case1 = new Case1();
    $case2 = new Case2();

    //steps for each test case
    $steps1 = 0;
    $steps2 = 0;

    //Checks each test case and returns step count
    if ($a > $b) {
        $steps1 = $case1->checkCase($a, $b, $c);
        $steps2 = $case2->checkCase($a, $b, $c);
    }

    if ($b > $a) {
        $steps1 = $case1->checkCase($b, $a, $c);
        $steps2 = $case2->checkCase($b, $a, $c);
    }

    //chooses case with the lowest step count
    $allSteps[] = min($steps1, $steps2);
}

//output
foreach ($allSteps as $steps) {
    echo $steps . PHP_EOL;
}