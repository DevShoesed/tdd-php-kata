<?php

declare(strict_types=1);

namespace App\StringCalculatorKata;

class StringCalculatorKata
{

    /**
     * add
     *
     * @param  string $numbers
     * @return int $result
     */
    public function add(string $numbers): int
    {
        $result = 0;

        $numbers = str_replace("\n", ",", $numbers);
        $arrayNumbers = explode(",", $numbers);

        foreach ($arrayNumbers as $num) {
            $result += (int) $num;
        }

        return $result;
    }
}
