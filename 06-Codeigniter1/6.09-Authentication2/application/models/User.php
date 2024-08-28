<?php

    Class User extends CI_model{

        public function add_user($name_first,$name_last,$contact_number,$npassword,$salt)
        {
            $query = "INSERT INTO test_authentication2(name_first,name_last,contact_number,password,salt) VALUES (?,?,?,?,?)";
            $values = array($name_first,$name_last,$contact_number,$npassword,$salt); 
            return $this->db->query($query, $values);
        }

        function get_user_by_contact($contact_number)
        {
            return $this->db->query("SELECT * FROM test_authentication2 WHERE contact_number = ? LIMIT 1",array($contact_number))->row_array();
        }


    }