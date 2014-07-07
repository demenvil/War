<?php

/**
 * Abstract Deck class
 *
 * @author Derrick Woolworth <dwoolworth@gmail.com>
 */
abstract class Deck
{
    /**
     * @var array $cards
     */
    protected $cards;

    /**
     * Deal card(s) from the deck
     *
     * @param int $count defaults to 1
     * @return array
     */
    public function deal($count = 1)
    {
        if (count($this->cards) < $count) {
            return null;
        }
        if ($count == 1) {
            return array_shift($this->cards);
        }

        return array_slice($this->cards, 0, $count);
    }

    /**
     * Retrieves the cards left in the deck
     *
     * @return int card count
     */
    public function cardCount()
    {
        return count($this->cards);
    }

    /**
     * Shuffle the cards
     *
     * @return Deck $this
     */
    public function shuffle()
    {
        shuffle($this->cards);

        return $this;
    }
}

/*EOF*/