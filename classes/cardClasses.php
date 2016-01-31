<?php

class Card{

    private $face,$color;
    public function __construct($color,$face){
        $this->face = $face;
        $this->color = $color;
    }
    public function getFace(){
        return $this->face;
    }
    public function getColor(){
        return $this->color;
    }
    public function getValue(){
        if(is_int($this->face)){
            return $this->face;
        }else{
            return 10;
        }
    }
    public function __toString(){
        return $this->face." de ".$this->color;
    }
}

class Deck{
    private $cards;
    public function __construct(){
        $this->cards = [];
        $faces = range(1,10);
        $faces = array_merge($faces,["Jack","Queen","King"]);
        $colors = ["HEART","CLUB","DIAMOND","SPADE"];
        foreach($colors as $color){
            foreach($faces as $face){
                $this->cards[] = new Card($color,$face);
            }
        }
    }
    public function shuffle(){
        shuffle($this->cards);
        return $this;
    }
    public function deal($n = 1){
        $cards = array_splice($this->cards, 0, $n);
        return $cards;
    }
}
class Player{
    protected $hand; //sert à stocker les cartes que le joueur possède
    protected $pseudo;
    public function __construct($toto){
        $this->hand = [];
        $this->pseudo = $toto;
    }
    public function take($cards){
        //TODO : récupère les cartes passées en paramètre
        //et les place dans $this->hand

        foreach($cards as $card){
            $this -> hand[] = $card;
        }
    }
    public function getHandValue(){
        //TODO : compter et returner la somme des valeurs de la main de la personne
        $panier = 0;
        foreach($this->hand as $card)
        {
            $panier += $card ->getValue();
        }

        return $panier;
    }
}


class Bank extends Player{
    public function __construct(){
        parent::__construct("Banque");
    }
}