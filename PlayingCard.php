<?php

/**
 * PlayingCard class extends the Card class
 *
 * @author Derrick Woolworth <dwoolworth@gmail.com>
 */
class PlayingCard extends Card
{
    /**
     * Implements abstract getDisplayName() method in Card
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->name . ' of ' . $this->suit;
    }
}

/*EOF*/