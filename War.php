<?php

/**
 * Extends the CardGame class to implment the game of War
 *
 * @author Derrick Woolworth <dwoolworth@gmail.com>
 */
class War extends CardGame
{
    /**
     * Constructor
     *
     * @param int $playerCount
     */
    public function __construct($playerCount)
    {
        parent::__construct(new FrenchDeck(), $playerCount);
    }

    /**
     * Overridden from parent
     */
    public function playRound()
    {
        $hiRank = -1;
        $hiPlayer = null;
        $tie = false;

        // Each player discards to the pile
        foreach ($this->players as $player) {
            if (($card = $player->playCard()) != null) {
                $this->addToPile($card);
                printf("Player %d plays %s\n", $player->getPlayerNumber(), (string)$card);
            }
            else {
                $card = $player->getLastCardPlayed();
                printf("Player %d uses last card %s\n", $player->getPlayerNumber(), (string)$card);
            }

            // Check who's card is highest
            $rank = $card->getRank();
            if ($rank == $hiRank) {
                $tie = true;
            }
            elseif ($rank > $hiRank) {
                $hiRank = $card->getRank();
                $hiPlayer = $player;
                $tie = false;
            }
            elseif ($rank < $hiRank) {
                $tie = false;
            }
        }

        // If a tie occurs, discard one card and play again
        if ($tie) {
            print "Round is a tie, each player discards, and plays again.\n";
            foreach ($this->players as $player) {
                if (($card = $player->playCard()) != null) {
                    $this->addToPile($card);
                }
            }
            // Recursion
            $this->playRound();
        }

        if ($this->getPileCardCount()) {
            printf("Player %d wins the round, picks up %d cards.\n", $hiPlayer->getPlayerNumber(), $this->getPileCardCount());
            $hiPlayer->addCardsToHand($this->pickUpPile());
        }
    }

    /**
     * Overridden from parent
     *
     * @return CardPlayer or null
     */
    public function hasGameBeenWon()
    {
        $hiScore = -1;
        $hiPlayer = null;

        foreach ($this->players as $idx => $player) {
            // Determine if a player is out of cards
            if ($player->getHandCardCount() == 0) {
                printf("Player %d is out of cards and has lost.\n", $player->getPlayerNumber());
                array_splice($this->players, $idx, 1);
            }
            // Attempt to find the player with the high score
            elseif ($hiPlayer == null) {
                if ($hiScore < $player->getHandCardCount()) {
                    $hiScore = $player->getHandCardCount();
                    $hiPlayer = $player;
                }
            }
            elseif ($hiPlayer->getHandCardCount() < $player->getHandCardCount()) {
                $hiScore = $player->getHandCardCount();
                $hiPlayer = $player;
            }
            // If there's a tie, then there's no clear winner yet, set to null
            elseif ($hiPlayer->getHandCardCount() == $player->getHandCardCount()) {
                $hiPlayer = null;
            }
        }

        if (count($this->players) == 1) {
            return array_shift($this->players);
        }

        // Only announce if we have a clear winner
        if ($hiPlayer) {
            printf("Player %d is winning with %d cards.\n", $hiPlayer->getPlayerNumber(), $hiScore);
        }

        return null;
    }
}

/*EOF*/