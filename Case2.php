<?php

/* Test of filling up water in vessels by following conditions:
Filling up smaller vessel;
Pouring water from smaller vessel to bigger vessel;
Emptying bigger vessel;
Each step gets repeated for certain situations
*/

class Case2
{

    public function checkCase(int $vesselA, int $vesselB, int $amount): int
    {
        $vessel1 = 0;
        $vessel2 = 0;
        $steps = 0;

        while ($vessel1 !== $amount && $vessel2 !== $amount) {

            if ($vessel2 === 0) {
                $vessel2 = $vesselB;
                $steps++;
                continue;
            }

            if ($vessel1 === $vesselA) {
                $vessel1 = 0;
                $steps++;
                continue;
            }

            $vessel1 += $vessel2;

            if ($vessel1 > $vesselA) {
                $difference = $vessel1 - $vesselA;
                $vessel1 = $vesselA;
                $vessel2 = $difference;
                $steps++;
                continue;
            }

            $vessel2 = 0;
            $steps++;

        }

        return $steps;
    }
}