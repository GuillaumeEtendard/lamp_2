<?php
session_start();
require_once("classes/indexClasses.php");
require_once("classes/cardClasses.php");


    $deck = new Deck();
    $deck->shuffle();
    $player = new Bank();
    $player->take($deck->deal(2)); //Le joueur se voit distribué 2 cartes

    echo "Tu as tiré 2 cartes et tu as ".$player->getHandValue();



if(isset($_POST['choice'])){

    while( $player->getHandValue() < 17){
        $player->take($deck->deal(1));
    }
    if($player->getHandValue() > 21){
        echo "<br>Tu as perdu avec ".$player->getHandValue();
        session_unset();
    }else{
        echo "<br>Tu as gagné avec ".$player->getHandValue();
        session_unset();
    }

}

if(isset($_POST['pass'])){
    $deck->shuffle();
}

if(isset($_POST['reset'])){
    session_unset();
    session_destroy();
    //header("Location:/");
    //exit;
}
