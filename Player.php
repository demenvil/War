<?php

/**
 * Player of a game
 *
 * @author Derrick Woolworth <dwoolworth@gmail.com>
 */
abstract class Player
{
    /**
     * @var int $number of player
     */
    protected $number;

    /**
     * Retrieve the player identifier
     *
     * @return int $number
     */
    public function getPlayerNumber()
    {
        return $this->number;
    }
}

/*EOF*/