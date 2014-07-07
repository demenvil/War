<?php

/**
 * Abstract Card class defines a simple playing card
 *
 * @author Derrick Woolworth <dwoolworth@gmail.com>
 */
abstract class Card
{
    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $suit
     */
    protected $suit;

    /**
     * @var int $rank
     */
    private $rank;

    /**
     * Define how the card name and suit should be displayed
     */
    abstract public function getDisplayName();

    /**
     * Constructor
     *
     * @param string $suit
     * @param string $name
     * @param int $rank
     */
    public function __construct($suit, $name, $rank)
    {
        $this->suit = $suit;
        $this->name = $name;
        $this->rank = $rank;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getDisplayName();
    }

    /**
     * Retrieves the rank of this card
     *
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }
}

/*EOF*/