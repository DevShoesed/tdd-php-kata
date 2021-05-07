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

        if ($this->isMultipleOf($number, 5) && $this->isMultipleOf($number, 3)) {
            return 'FizzBuzz';
        }

        if ($this->isMultipleOf($number, 5)) {
            return 'Buzz';
        }

        if ($this->isMultipleOf($number, 3)) {
            return 'Fizz';
        }

        return (string) $number;
    }

    /**
     * Run Fizz buzz converter from $i to $n
     * 
     * @param int $min
     * @param int $max
     * 
     * @return string $output
     */
    public function run(int $min, int $max): string
    {
        $output = [];
        for ($i = $min; $i <= $max; $i++) {
            $output[] = $this->convert($i);
        }

        return implode(", ", $output);
    }

    private function isMultipleOf(int $number, int $moltiplicator): bool
    {
        return $number % $moltiplicator === 0;
    }
}
