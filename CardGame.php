<?php

/**
 * CardGame class
 *
 * @author Derrick Woolworth <dwoolworth@gmail.com>
 */
abstract class CardGame
{
    /**
     * @var Deck $deck
     */
    protected $deck;

    /**
     * @var array $pile
     */
    protected $pile;

    /**
     * @var int $playerCount
     */
    protected $playerCount;

    /**
     * @var array players
     */
    protected $players;

    /**
     * Constructor
     */
    public function __construct(Deck $deck, $playerCount)
    {
        $this->pile = array();
        $this->players = array();
        $this->deck = $deck;
        $this->playerCount = $playerCount;
    }

    /**
     * Begin a new card game
     *
     * @return CardGame $this
     */
    public function beginGame()
    {
        // Create all players
        for ($i = 0; $i < $this->playerCount; $i++) {
            $this->players[$i] = new CardPlayer($i+1);
        }

        // Shuffle the deck of cards
        $this->deck->shuffle();

        return $this;
    }

    /**
     * Deal the specified number of cards to each player, zero is all cards
     *
     * @param int $count
     * @return CardGame $this
     */
    public function dealCards($count = 0)
    {
        // While enough cards to go around...
        while ($this->deck->cardCount() >= $this->playerCount) {
            // Deal a card to each player
            foreach ($this->players as $player) {
                $player->dealtCard($this->deck->deal());
            }
            if (! --$count) {
                break;
            }
        }

        return $this;
    }

    /**
     * Play a single round of cards
     */
    abstract protected function playRound();

    /**
     * Checks to see if game is won
     */
    abstract protected function hasGameBeenWon();

    /**
     * Retrieves the card count in the pile of cards
     *
     * @return int
     */
    protected function getPileCardCount()
    {
        return count($this->pile);
    }

    /**
     * Add a card to the pile of cards
     *
     * @param Card $card
     * @return CardGame $this
     */
    protected function addToPile(Card $card)
    {
        array_unshift($this->pile, $card);

        return $this;
    }

    /**
     * Retrieves and resets the pile
     *
     * @return array of Cards
     */
    protected function pickUpPile()
    {
        return array_splice($this->pile, 0);
    }

}

/*EOF*/