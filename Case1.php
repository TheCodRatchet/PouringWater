<?php

/* Test of filling up water in vessels by following conditions:
Filling up smaller vessel;
Pouring water from bigger vessel to smaller vessel;
Emptying smaller vessel;
Each step gets repeated for certain situations
*/

class Case1
{

    public function checkCase(int $vesselA, int $vesselB, int $amount): int
    {
        $vessel1 = 0;
        $vessel2 = 0;
        $steps = 0;

        while ($vessel1 !== $amount && $vessel2 !== $amount) {

            if ($vessel1 === 0) {
                $vessel1 = $vesselA;
                $steps++;
                continue;
            }

            if ($vessel2 === $vesselB) {
                $vessel2 = 0;
                $steps++;
                continue;
            }

            if ($vessel1 < $vesselB) {
                $vessel2 = $vessel1;
                $vessel1 = 0;
                $steps++;
                continue;
            }

            if ($vessel2 != 0) {
                $difference = $vesselB - $vessel2;
                $vessel2 = $vesselB;
                $vessel1 -= $difference;
                $steps++;
                continue;
            }

            $vessel1 -= $vesselB;
            $vessel2 += $vesselB;
            $steps++;
        }

        return $steps;
    }
}