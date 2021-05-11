<?php

declare(strict_types=1);

namespace App\Tests\FizzBuzzKata;

require_once './vendor/autoload.php';

use App\FizzBuzzKata\FizzBuzzKata;
use PHPUnit\Framework\TestCase;


final class FizzBuzzKataTest extends TestCase
{

    /**
     * Test return 'Fizz' string when receive multiple of 3
     */
    public function testWithMultipleOfThreeReturnFizz(): void
    {
        $fizzBuzz = new FizzBuzzKata();

        $numbers = [3, 6, 9, 12, 18, 21, 24];
        $number = $numbers[rand(0, count($numbers) - 1)];
        $response = $fizzBuzz->convert($number);

        $this->assertEquals('Fizz', $response);
    }

    /**
     * Test return 'Buzz' string when receive multiple of 5
     */
    public function testWithMultipleOfFiveReturnBuzz(): void
    {
        $fizzBuzz = new FizzBuzzKata();

        $numbers = [5, 10, 20, 25, 35, 40];
        $number = $numbers[rand(0, count($numbers) - 1)];
        $response = $fizzBuzz->convert($number);

        $this->assertEquals('Buzz', $response);
    }

    /**
     * Test return Number 
     */
    public function testReturnNumber(): void
    {
        $fizzBuzz = new FizzBuzzKata();

        $numbers = [1, 2, 7, 8, 19, 22, 38];
        $number = $numbers[rand(0, count($numbers) - 1)];
        $response = $fizzBuzz->convert($number);

        $this->assertEquals($number, $response);
    }

    /**
     * Test return FizzBuzz
     */
    public function testReturnFizzBuzz(): void
    {
        $fizzBuzz = new FizzBuzzKata();
        $response = $fizzBuzz->convert(rand(1, 10) * 3 * 5);

        $this->assertEquals('FizzBuzz', $response);
    }


    /**
     * Test from x to y 
     */
    public function testRunFrom1To20(): void
    {
        $fizzBuzz = new FizzBuzzKata();

        $response = $fizzBuzz->run(1, 20);

        $this->assertEquals('1, 2, Fizz, 4, Buzz, Fizz, 7, 8, Fizz, Buzz, 11, Fizz, 13, 14, FizzBuzz, 16, 17, Fizz, 19, Buzz', $response);
    }
}
