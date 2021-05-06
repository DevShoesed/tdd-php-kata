<?php

declare(strict_types=1);

namespace App\FizzBuzzKata;

class FizzBuzzKata
{

    /**
     * convert
     *
     * @param  int $number
     * @return string
     */
    public function convert(int $number): string
    {

        if ($number % 5 === 0 && $number % 3 === 0) {
            return 'FizzBuzz';
        }

        if ($number % 5 === 0) {
            return 'Buzz';
        }

        if ($number % 3 === 0) {
            return 'Fizz';
        }

        return (string) $number;
    }
}
