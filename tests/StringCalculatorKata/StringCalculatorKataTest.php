<?php

declare(strict_types=1);

namespace App\Tests\StringCalculatorKata;

require_once './vendor/autoload.php';

use App\StringCalculatorKata\StringCalculatorKata;
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
}