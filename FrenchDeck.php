<?php

/**
 * FrenchDeck class extends Deck to create a standard deck of
 * 52 playing cards, Aces high
 *
 * @author Derrick Woolworth <dwoolworth@gmail.com>
 */
class FrenchDeck extends Deck
{
    const CardCount = 52;

    /**
     * @var array $cardNames
     */
    private $cardNames = array(
        '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Jack', 'Queen', 'King', 'Ace');

    /**
     * @var array $cardSuits
     */
    private $cardSuits = array(
        'Hearts', 'Spades', 'Diamonds', 'Clubs');

    /**
     * Constructor
     */
    public function __construct()
    {
        foreach ($this->cardSuits as $suit) {
            foreach ($this->cardNames as $rank => $name) {
                $this->cards[] = new PlayingCard($suit, $name, $rank);
            }
        }
    }
}

/*EOF*/