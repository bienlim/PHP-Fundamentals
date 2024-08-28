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
    }

    public function return(){
        if($this->sold>0){    
            echo 'Returning<br>';
            $this->sold = $this->sold-1;
            $this->stock = $this->stock+1;
        } else {
            echo 'Nothing to Return<br>';
        }
    }   
}

$item1 = new Item('Jean', 30, 5);
$item2 = new Item('Shirt', 20, 5);
$item3 = new Item('Shorts', 10, 2);

$item1->buy();
$item1->buy();
$item1->buy();
$item1->return();
$item1->logDetails();

$item2->buy();
$item2->buy();
$item2->return();
$item2->return();
$item2->logDetails();


$item3->return();
$item3->return();
$item3->return();
$item3->logDetails();

/* class MobilePhone 
{
  public $apps = array();
  public $model;
  public $sim_num;

  public function __construct() 
  {
    echo "Welcome!";
    $this->model = "Realme 8 5g";
  }
  public function __get($property)
  {
    if (property_exists($this, $property))
    {
      return $this->property;
    }
  }
  public function __set($property, $value) 
  {
    if (property_exists($this, $property)) 
    {
      $this->property = $value;
    }
    return $this;
  }
  public function install($app_name) 
  {
    array_push($this->apps, $app_name);
    echo "<br>Successfully installed $app_name.";
    $this->list_apps();
  }
  public function list_apps() 
  {
     echo "<br>All apps:";
     foreach($this->apps as $app) 
     {
        echo "$app ";
     }
  }
} */