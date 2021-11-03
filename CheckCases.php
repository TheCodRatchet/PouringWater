<?php

//Checks each test case and returns step count

class CheckCases
{

    private Case1 $case1;
    private Case2 $case2;

    public function __construct(Case1 $case1, Case2 $case2)
    {

        $this->case1 = $case1;
        $this->case2 = $case2;
    }

    public function cases(int $a, int $b, int $c): array
    {
        $steps = [];

        if ($a > $b) {

            //checks if division between both vessels is a whole number
            if ($a % $b === 0 && $c % $b != 0) {
                $steps[] = -1;
            } else {
                $steps[] = $this->case1->case($a, $b, $c);
                $steps[] = $this->case2->case($a, $b, $c);
            }
        }

        if ($b > $a) {

            if ($b % $a === 0 && $c % $a != 0) {
                $steps[] = -1;
            } else {
                $steps[] = $this->case1->case($b, $a, $c);
                $steps[] = $this->case2->case($b, $a, $c);
            }
        }

        return $steps;
    }
}