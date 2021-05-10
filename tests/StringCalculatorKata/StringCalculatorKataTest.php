<?php

declare(strict_types=1);

namespace App\Tests\StringCalculatorKata;

require_once './vendor/autoload.php';

use App\StringCalculatorKata\StringCalculatorKata;
use Exception;
use PHPUnit\Framework\TestCase;

class StringCalculatorKataTest extends TestCase
{

    /**
     * Step 1 - Test add 1 and 2
     */
    public function testStepOneOfKata(): void
    {
        $stringCalculator = new StringCalculatorKata();


        $this->assertEquals(3, $stringCalculator->add("1,2"));
        $this->assertEquals(1, $stringCalculator->add("1"));
        $this->assertEquals(0, $stringCalculator->add(""));
    }

    /**
     * Step 2 - 
     */
    public function testUnknownAmountsOfNumbers(): void
    {
        $stringCalculator = new StringCalculatorKata();

        $this->assertEquals(6, $stringCalculator->add("1,2,3"));
        $this->assertEquals(20, $stringCalculator->add("8,9,2,1"));
        $this->assertEquals(25, $stringCalculator->add("8,9,2,1,5"));
        $this->assertEquals(32, $stringCalculator->add("8,9,2,1,5,7"));
    }

    /**
     * Step 3 - Allow New Line as delimiter of string
     */
    public function testNewLineAsDelimiter(): void
    {
        $stringCalculator = new StringCalculatorKata();

        $this->assertEquals(6, $stringCalculator->add("1\n2,3"));
        $this->assertEquals(6, $stringCalculator->add("1\n2\n3"));
        $this->assertEquals(6, $stringCalculator->add("1,2\n3"));
    }

    /**
     * Step 4 - Test different delimiters
     */
    public function testDifferentDelimiters(): void
    {
        $stringCalculator = new StringCalculatorKata();

        $this->assertEquals(3, $stringCalculator->add("//;\n1;2"));
        $this->assertEquals(16, $stringCalculator->add("//#\n1#2#5#8"));
        $this->assertEquals(20, $stringCalculator->add("//|\n1|2|5|8|4"));
    }

    /**
     * Step 5 - Exception on negative number
     */
    public function testExceptionOnNegtiveNumber(): void
    {
        $stringCalculator = new StringCalculatorKata();

        $this->setNegativeExeption([-5, -8]);

        $stringCalculator->add("2,-5,3,-8");
    }

    /**
     * Step 6 - Numbers bigger than 1000 should be ignored
     */
    public function testNumberBiggerThan100ShouldBeIgnored(): void
    {
        $stringCalculator = new StringCalculatorKata();

        $this->assertEquals(2, $stringCalculator->add("2,1000"));
        $this->assertEquals(11, $stringCalculator->add("5,1000,6"));
    }

    /**
     * Step 7 - Delimiters can be of any length
     */
    public function testMultipleDelimitersLenght(): void
    {
        $stringCalculator = new StringCalculatorKata();

        $this->assertEquals(6, $stringCalculator->add("//[***]\n1***2***3"));
        $this->assertEquals(6, $stringCalculator->add("//[##]\n1##2##3"));
        $this->assertEquals(6, $stringCalculator->add("//[#..#]\n1#..#2#..#3"));
    }

    /**
     * Test checkNegativeNumbers method
     */
    public function testCheckNegativeNumbers(): void
    {
        $class = new \ReflectionClass(StringCalculatorKata::class);

        $checkNegativeNumbersMethod = $class->getMethod('checkNegativeNumbers');
        $checkNegativeNumbersMethod->setAccessible(true);

        $this->setNegativeExeption([-2, -9]);

        $stringCalculator = new StringCalculatorKata();
        $numbers = [1, -2, 3, 4, 5, 6, 7, 8, -9, 10];
        $result = $checkNegativeNumbersMethod->invokeArgs($stringCalculator, [$numbers]);
    }


    protected function setNegativeExeption(array $negvativeNumbers)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("negatives not allowed '" . implode(",", $negvativeNumbers) . "'");
    }
}
