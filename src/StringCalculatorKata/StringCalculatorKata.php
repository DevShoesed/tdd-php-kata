<?php

declare(strict_types=1);

namespace App\StringCalculatorKata;

use Exception;

class StringCalculatorKata
{

    /**
     * add
     *
     * @param  string $string
     * @return int $result
     */
    public function add(string $string): int
    {
        $result = 0;
        // Retrive delimiters
        $delimiters = $this->getDelimiters($string);
        $delimiters[] = ',';

        // Retrive Numbers
        $numbers = $this->isDefineDelimiter($string) ? (explode("\n", $string))[1] : $string;

        // Replace All possible delimiters with comma
        $numbers = str_replace("\n", ',', $numbers);
        foreach ($delimiters as $delimiter) {
            $numbers = str_replace($delimiter, ',', $numbers);
        }

        $arrayNumbers = explode(',', $numbers);

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


    /**
     * Retrive delimiters in params and return array ofthat
     * 
     * @param  string $params
     * 
     * @return array $delimiters
     */
    protected function getDelimiters(string $params)
    {
        if (!$this->isDefineDelimiter($params)) {
            return [];
        }

        $delimiters = [];
        $delimitersLine =  substr($params, 2, strpos($params, "\n") - 2);

        if (substr($delimitersLine, 0, 1) === "[") {
            $bracketPosition = strpos($delimitersLine, ']');
            while ($bracketPosition > 0) {

                $delimiter = substr($delimitersLine, 1, $bracketPosition - 1);
                $delimiters[] = $delimiter;
                $delimitersLine = substr($delimitersLine, $bracketPosition + 1, strlen($delimitersLine) - $bracketPosition - 1);

                $bracketPosition = strpos($delimitersLine, ']');
            }
        } else {
            $delimiters[] = $delimitersLine;
        }

        return $delimiters;
    }


    /**
     * Is define delimiter
     * 
     * @param string $string
     * 
     * @return bool
     */
    protected function isDefineDelimiter(string $string): bool
    {
        return substr($string, 0, 2) === "//";
    }
}
