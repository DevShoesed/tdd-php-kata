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

        $response = $fizzBuzz->convert(rand(1, 4) * 3);

        $this->assertEquals('Fizz', $response);
    }

    /**
     * Test return 'Buzz' string when receive multiple of 5
     */
    public function testWithMultipleOfFiveReturnBuzz(): void
    {
        $fizzBuzz = new FizzBuzzKata();

        $response = $fizzBuzz->convert(rand(1, 14) * 5);

        $this->assertEquals('Buzz', $response);
    }

    /**
     * Test return Number 
     */
    public function testReturnNumber(): void
    {
        $fizzBuzz = new FizzBuzzKata();

        $numbers = [1, 2, 3, 7, 8, 19, 22, 38];
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
    public function testRunFrom1To10(): void
    {
        $fizzBuzz = new FizzBuzzKata();

        $response = $fizzBuzz->run(1, 10);

        $this->assertEquals('1, 2, Fizz, 4, Buzz, Fizz, 7, 8, Fizz, Buzz', $response);
    }
}
