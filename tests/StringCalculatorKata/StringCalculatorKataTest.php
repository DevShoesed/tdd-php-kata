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

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("negatives not allowed '-5,-8'");

        $stringCalculator->add("2,-5,3,-8");
    }
}
