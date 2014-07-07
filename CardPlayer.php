<?php

/**
 * CardPlayer extends Player
 *
 * @author Derrick Woolworth <dwoolworth@gmail.com>
 */
class CardPlayer extends Player
{
    /**
     * @var array $hand of PlayingCards
     */
    protected $hand;

    /**
     * @var Card $lastCardPlayed
     */
    private $lastCardPlayed;

    /**
     * @var array $tricks won
     */
    private $tricks;

    /**
     * Constructor
     */
    public function __construct($number)
    {
        $this->number = $number;
        $this->hand = array();
        $this->tricks = array();
        $this->lastCardPlayed = null;
    }

    /**
     * dealtCard adds a card to the top of the player's hand
     *
     * @param Card $card
     * @return CardPlayer $this
     */
    public function dealtCard(Card $card)
    {
        array_unshift($this->hand, $card);

        return $this;
    }

    /**
     * trickWon adds multiple cards to the bottom of the tricks
     *
     * @param array $cards
     * @return CardPlayer $this
     */
    public function trickWon(array $cards)
    {
        $this->tricks = array_merge($this->tricks, $cards);

        return $this;
    }

    /**
     * Adds cards to the player's hand
     *
     * @param array $cards
     * @return \CardPlayer
     */
    public function addCardsToHand(array $cards)
    {
        $this->hand = array_merge($this->hand, $cards);

        return $this;
    }

    /**
     * Play a card from the player's hand
     *
     * @return mixed Card or null if hand is empty
     */
    public function playCard()
    {
        if (count($this->hand)) {
            $this->lastCardPlayed = array_shift($this->hand);
            return $this->lastCardPlayed;
        }

        return null;
    }

    /**
     * Retrieves the last card played
     *
     * @return Card
     */
    public function getLastCardPlayed()
    {
        return $this->lastCardPlayed;
    }

    /**
     * Retrieves the number of cards in this player's hand
     *
     * @return int
     */
    public function getHandCardCount()
    {
        return count($this->hand);
    }

    /**
     * getTrickCount returns the number of tricks held in the player's hand,
     * which is typically 1 trick for every 2 cards
     *
     * @return int
     */
    public function getTrickCount()
    {
        return $this->tricks / 2;
    }
}

/*EOF*/