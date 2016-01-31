<?php

require_once("classes/cardClasses.php");

//SCENARIO 1
$deck = new Deck();
$deck->shuffle();
$bank = new Bank();
$bank->take($deck->deal(2)); //tire 2 cartes du deck, la banque les prends


while( $bank->getHandValue() < 17){
  $bank->take($deck->deal(1));
}
if($bank->getHandValue() > 21){
  echo "La banque perd ".$bank->getHandValue();
}else{
  echo "La banque a ".$bank->getHandValue();
}
