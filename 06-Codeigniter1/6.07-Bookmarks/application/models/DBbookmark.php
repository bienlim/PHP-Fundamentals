<?php

class DBbookmark extends CI_Model {
     function get_all_bookmark()
     {
         return $this->db->query("SELECT * FROM test_bookmark")->result_array();
     }
     function delete_bookmark($id)
     {
         return $this->db->query("DELETE FROM test_bookmark WHERE id = ?", array($id));
     }
     function add_bookmark($name,$url,$folder)
     {
         $query = "INSERT INTO test_bookmark(name, url, folder) VALUES (?,?,?)";
         $values = array($name,$url,$folder); 
         return $this->db->query($query, $values);
     }
}