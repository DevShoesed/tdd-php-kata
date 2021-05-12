<?php

namespace App\BowlingGameKata;

class BowlingGameKata
{

    private int $score = 0;

    /**
     * Roll Ball
     * 
     * @param int $pins
     * 
     * @return void
     */
    public function roll(int $pins): void
    {
        $this->score += $pins;
    }

    /**
     * Return Score of Game
     * 
     * @return int $score
     */
    public function score(): int
    {
        return $this->score;
    }
}
