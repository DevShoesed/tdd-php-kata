<?php

use App\BowlingGameKata\BowlingGameKata;
use PHPUnit\Framework\TestCase;

class BowlingGameKataTest extends TestCase
{

    /**
     * Test score of all Zero
     */
    public function testScoreAllZero(): void
    {
        $game = new BowlingGameKata();

        for ($i = 1; $i <= 20; $i++) {
            $game->roll(0);
        }

        $this->assertEquals(0,  $game->score());
    }

    /**
     * Test score all Four
     */
    public function testScoreAllFour(): void
    {
        $game = new BowlingGameKata();

        for ($i = 1; $i <= 20; $i++) {
            $game->roll(4);
        }

        $this->assertEquals(80, $game->score());
    }

    /**
     * Test a spare Bonus
     */
    public function testOneSpareAndAllTwo(): void
    {
        $game = new BowlingGameKata();

        $game->roll(5);
        $game->roll(5);

        for ($i = 1; $i <= 18; $i++) {
            $game->roll(2);
        }

        $this->assertEquals(48, $game->score());
    }

    /**
     * Test a spare Bonus
     */
    public function testTwoSpareAndAllOne(): void
    {
        $game = new BowlingGameKata();

        $game->roll(5);
        $game->roll(5);

        $game->roll(5);
        $game->roll(5);

        for ($i = 1; $i <= 18; $i++) {
            $game->roll(2);
        }

        $this->assertEquals(63, $game->score());
    }


    /**
     * Test a Strike Bonus
     */
    public function testOneStrikeAndAllThree(): void
    {
        $game = new BowlingGameKata();

        $game->roll(10);
    }
}
