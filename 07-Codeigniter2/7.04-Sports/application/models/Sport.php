<?php 

    Class Sport extends CI_model{

        public function get_all_athletes(){
            return $this->db->query("SELECT * FROM test_sports_athlete")->result_array();

        }

        public function get_all_sportnames(){
            return $this->db->query("SELECT * FROM test_sports_names")->result_array();

        }

        public function get_all_sports(){
            return $this->db->query("SELECT * FROM test_sports_sports")->result_array();
        }

        public function get_athletes_by($name,$gender,$sport){
            $query =    "SELECT *, GROUP_CONCAT(test_sports_sports.sport) AS my_sports FROM test_sports_athlete 
                        RIGHT JOIN test_sports_sports ON test_sports_athlete.id = test_sports_sports.athlete_id
                        WHERE name LIKE";
                    
            $query .=  "'%".$name."%' ";
            $query .=  (!empty($gender)?" AND gender = ? ":'');
            //$query .=  (!empty($swim)||!empty($dart)||!empty($chess)?" AND ( FALSE":'');

            $query  .= " GROUP BY test_sports_athlete.id";
            
            $query  .= (!empty($sport)?" HAVING TRUE":'');



                       foreach($sport AS $key => $data){
                            if (($data) != NULL){
                                $query .= " AND INSTR(my_sports, '{$key}')";
                            }
                        } 
            $query  .= " ;";
                        
                   /*      .(!empty($dart)?" OR sport = 2 ":'')
                        .(!empty($chess)?" OR sport = 3 ":'')
                        .(!empty($swim)||!empty($dart)||!empty($chess)?")":'')  */  

            
            $values = array($gender);
            return $this->db->query($query, $values)->result_array();
        }
    }