<?php

declare(strict_types=1);

namespace App\StringCalculatorKata;

use Exception;

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

        $delimiter = ",";
        if (substr($numbers, 0, 2) === "//") {
            $delimiter =  substr($numbers, 2, strpos($numbers, "\n") - 2);
            $numbers = str_replace("//$delimiter", "", $numbers);
        }

        if (strlen($delimiter) > 1) {
            $delimiter = substr($delimiter, 1, strlen($delimiter) - 2);
        }

        $numbers = str_replace("\n", $delimiter, $numbers);
        $arrayNumbers = explode($delimiter, $numbers);

        $this->checkNegativeNumbers($arrayNumbers);

        foreach ($arrayNumbers as $num) {
            if ($num < 1000) {
                $result += (int) $num;
            }
        }

        return $result;
    }

    /**
     * Check Negative number and throw Exception
     * 
     * @param array $numbers
     * 
     */
    protected function checkNegativeNumbers(array $numbers): void
    {
        $negativeNumbers = array_filter($numbers, function ($num) {
            return $num < 0;
        });

        if (count($negativeNumbers) > 0) {
            throw new Exception("negatives not allowed '" . implode(",", $negativeNumbers) . "'");
        }
    }
}
