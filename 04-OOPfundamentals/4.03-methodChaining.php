<?php

class Item{
    public $name;
    public $price;
    public $stock;
    public $sold;

    public function __construct($name,$price,$stock) 
    {
      $this->name = $name;
      $this->price = $price;
      $this->stock = $stock;
      $this->sold = 0;
    }

    public function logDetails(){
        echo $this->name.'<br>';
        echo $this->price.'<br>';
        echo $this->stock.'<br>';
        echo $this->sold.'<br>';
    }

    public function buy(){

        if($this->stock>0){
            echo 'Buying<br>';
            $this->sold = $this->sold+1;
            $this->stock = $this->stock-1;
        } else {
            echo 'Sold Out<br>';
        }
        return $this;
    }

    public function return(){
        if($this->sold>0){    
            echo 'Returning<br>';
            $this->sold = $this->sold-1;
            $this->stock = $this->stock+1;
        } else {
            echo 'Nothing to Return<br>';
        }

        return $this;
    }   
}

$item1 = new Item('Jean', 30, 5);
$item2 = new Item('Shirt', 20, 5);
$item3 = new Item('Shorts', 10, 2);

$item1->buy() ->buy() ->buy() ->return() ->logDetails();
$item2->buy()->buy()->return()->return()->logDetails();
$item3->return()->return()->return()->logDetails();
