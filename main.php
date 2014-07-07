<?php

require('autoloader.php');


$war = new War(2);
$war->beginGame()
    ->dealCards();
while (!($player = $war->hasGameBeenWon())) {
    $war->playRound();
}
printf("Player %d has won!\n", $player->getPlayerNumber());

/*EOF*/