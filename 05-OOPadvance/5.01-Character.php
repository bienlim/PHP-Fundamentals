<?php

class Character{

    public $name;
    public $health;
    public $stamina;
    public $manna;

    public function __construct(){

        $this->health = 100;
        $this->stamina = 100;
        $this->manna = 100;
    }
    
    public function walk(){
        $this->stamina = $this->stamina -1;
        return $this;
    }

    public function run(){
        $this->stamina = $this->stamina -3;
        return $this;
    }

    public function showStats(){
        echo $this->health.'<br>';
        echo $this->stamina.'<br>';
        echo $this->manna.'<br>';
    }

}

class Shaman extends Character{
    public function __construct(){
        $this->health = 100;
        $this->stamina = 150;
        $this->manna = 100;
    }

    public function heal(){
        $this->health = $this->health + 5; 
        $this->stamina = $this->stamina + 5;
        $this->manna = $this->manna + 5;
        return $this;
    }
}

Class Swordsman extends Character{
    
    
    public function __construct(){
        $this->health = 170;
        $this->stamina = 100;
        $this->manna = 100;
    }

    public function slash(){
        $this->manna = $this->manna + 10;
        return $this;
    }
    public function showStats(){
        echo 'I am powerful!<br>';
        parent::showStats();
    }
}




 $character = new Character();
 $character -> walk() -> walk()-> walk() -> run() -> run() -> showStats();

 $shaman = new Shaman();
 $shaman -> walk() -> walk()-> walk() -> run() -> run() -> heal() -> showStats();

 $swordsman = new Swordsman();
 $swordsman -> walk() -> walk()-> walk() -> run() -> run() -> slash() -> showStats();

 $character = new Character();
 $character -> walk() -> walk()-> walk() -> run() -> run() -> showStats();
