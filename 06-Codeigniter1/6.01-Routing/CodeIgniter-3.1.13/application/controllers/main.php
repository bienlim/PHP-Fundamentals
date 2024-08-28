<?php 
class Main extends CI_Controller {
     public function index()
     {
           echo "I am Main Class!";
     }

     public function hello()
     {
           echo "Hello World!";
     }

     public function say($var)
     {
           echo $var;
     }

     public function say_anything($var)
     {
           echo $var;
     }

     public function danger()
     {
        redirect('/');
     }
}
?>