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
     * Test getDelimiters method with One delimiter
     */
    public function testGetOneDelimiter(): void
    {
        $class = new \ReflectionClass(StringCalculatorKata::class);
        $getDelimitersMethod = $class->getMethod('getDelimiters');
        $getDelimitersMethod->setAccessible(true);

        $stringCalculator = new StringCalculatorKata();

        $lineWithOnedelimiter = "//;\n1;1;2;3";

        $resultOneDelimiter = $getDelimitersMethod->invokeArgs($stringCalculator, [$lineWithOnedelimiter]);

        $this->assertEquals(1, count($resultOneDelimiter));
        $this->assertEquals([';'], $resultOneDelimiter);
    }

    /**
     * Test getDelimiters method with Multiple delimiters
     */
    public function testGetMultipleDelimiters(): void
    {
        $class = new \ReflectionClass(StringCalculatorKata::class);
        $getDelimitersMethod = $class->getMethod('getDelimiters');
        $getDelimitersMethod->setAccessible(true);

        $stringCalculator = new StringCalculatorKata();

        $lineWithTwodelimiters = "//[;][|][###]\n1;1|2;3";

        $resultTwoDelimiters = $getDelimitersMethod->invokeArgs($stringCalculator, [$lineWithTwodelimiters]);

        $this->assertEquals(3, count($resultTwoDelimiters));
        $this->assertContains(';', $resultTwoDelimiters);
        $this->assertContains('|', $resultTwoDelimiters);
        $this->assertContains('###', $resultTwoDelimiters);
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
     * Step 8 Allow Multiple delimiters
     */
    public function testAddWithMultipleDelimiters(): void
    {
        $stringCalculator = new StringCalculatorKata();

        $this->assertEquals(11, $stringCalculator->add("//[*][#]\n2*3#6"));
        $this->assertEquals(20, $stringCalculator->add("//[*][#][|]\n2*3#6|9"));
    }

    /**
     * Step 9 Allow Multiple delimiters with multiple length
     */
    public function testAddWithMultipleDelimitersOfMultipleLenght(): void
    {
        $stringCalculator = new StringCalculatorKata();

        $this->assertEquals(11, $stringCalculator->add("//[**][##]\n2**3##6"));
        $this->assertEquals(20, $stringCalculator->add("//[***][###][|||]\n2***3###6|||9"));
    }

    /**
     * @param array<int> $negvativeNumbers
     */
    protected function setNegativeExeption(array $negvativeNumbers): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("negatives not allowed '" . implode(",", $negvativeNumbers) . "'");
    }
}
