<?php

namespace App\BowlingGameKata;

class BowlingGameKata
{

    private array $frames = [];


    /**
     * Roll Ball
     * 
     * @param int $pins
     * 
     * @return void
     */
    public function roll(int $pins): void
    {
        $this->frames[] = $pins;
    }

    /**
     * Return Score of Game
     * 
     * @return int $score
     */
    public function score(): int
    {
        $score = 0;
        $previousRoll = 0;
        $addSpareBonus = false;

        foreach ($this->frames as $index => $frameScore) {
            $score += $addSpareBonus ? $frameScore * 2 : $frameScore;
            $addSpareBonus = false;
            if (($index + 1) % 2 === 0) {
                $addSpareBonus = $frameScore + $previousRoll === 10;
            }
            $previousRoll = $frameScore;
        }

        return $score;
    }
}
