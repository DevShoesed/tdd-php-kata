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
     * Test score all One
     */
    public function testScoreAllOne(): void
    {
        $game = new BowlingGameKata();

        for ($i = 1; $i <= 20; $i++) {
            $game->roll(1);
        }

        $this->assertEquals(20, $game->score());
    }
}
