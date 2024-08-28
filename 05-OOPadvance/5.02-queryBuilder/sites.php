<?php
    require_once('database.php');
    
    class Table extends Database{

        public $select = [];
        public $where = [];
        public $group_by = [];
        public $having = [];
        public $order =[];
        public $dataset ='';
        public $query;


        public function __construct($db_name,$db_dataset){

            $this->connection($db_name);
            $this->dataset = $db_name.'.'.$db_dataset ;
            

            
        }


        /*
            Accepts an array of parameters to be selected in the query,  
            Syntax acceptable format [alias1 = > field1, alias2 = field2, field3, ...]
            Returns = field 1 AS alias1, field2 AS alis2, field3, ...

            field functions can be called by stating the object and method the method enclosing the parameter.
                $Variable->sum(field1)
        */
        public function select($param){
            foreach($param AS $key=>$value){
                //$value = $this->count($value); 
                if( strlen($key) > 1 && !is_numeric($key) ){
                    array_push($this->select,"{$value} AS {$key}");
                } else {
                    array_push($this->select,"$value");
                }
            }
            return $this;
        }

        /*
            Accepts an array of parameters to be selected in the query,  
            Syntax acceptable format [alias1 = > field1, alias2 = field2, field3, ...]
            Returns = field 1 AS alias1, field2 AS alis2, field3, ...
        */
        public function group_by($param){
            
            
            foreach($param AS $value){
                    array_push($this->group_by,$value);
            }
            
            return $this;
        }

        public function having($param){

            if(strlen($param[0][0])>1){    //Need to validate that the variable  in the index or index isnot a string letter
                foreach($param AS $value){
                    array_push($this->having,$value[0].$value[1].$value[2]);
                }
            } else {
                array_push($this->having,$param[0].$param[1].$param[2]);
            }
            return $this;
        }

        public function where($param){
            if(strlen($param[0][0])>1){
                foreach($param AS $value){
                    array_push($this->where,$value[0].$value[1].$value[2]);
                }
            } else {
                array_push($this->where,$param[0].$param[1].'"'.$param[2].'"');
            }
            return $this;
        }

        public function count($try){
            return  !empty($try)?"COUNT({$try})":"COUNT(*)";
        }

        public function sum($try){
            return  !empty($try)?"COUNT({$try})":"SUM(*)";
        }

        public function avg($try){
            return  !empty($try)?"COUNT({$try})":"AVG(*)";
        }



        public function get(){

            $query =  'SELECT ' . (!empty(implode(', ', $this->select))?implode(', ', $this->select):'*')
                    . ' FROM ' . $this->dataset
                    .(!empty($this->group_by)?' GROUP BY '. implode(', ', $this->group_by):'')
                    .(!empty($this->having)?' HAVING '.implode(' AND ', $this->having):'').'';

            //echo '#'.$query.'#';
            $data = $this->fetch_all($query);

            return $data;
            //var_dump($data);
        }

    }
