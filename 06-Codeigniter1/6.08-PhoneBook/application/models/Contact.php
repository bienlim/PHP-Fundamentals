<?php

class contact extends CI_Model {
     function get_all_contact()
     {
         return $this->db->query("SELECT * FROM test_phonebook")->result_array();
     }
     function get_contact_by_id($id)
     {
         return $this->db->query("SELECT * FROM test_phonebook WHERE id = ? LIMIT 1",array($id))->row_array();
     }

     function remove_contact($id)
     {
         return $this->db->query("DELETE FROM test_phonebook WHERE id = ?", array($id));
     }

     function add_contact($name,$contact)
     {
         $query = "INSERT INTO test_phonebook(name, contact) VALUES (?,?)";
         $values = array($name,$contact); 
         return $this->db->query($query, $values);
     }

     function update_contact_by_id($name,$contact,$id)
     {
         $query = "UPDATE test_phonebook SET name = ?, contact = ? WHERE id = ?";
         $values = array($name,$contact,$id); 
        return $this->db->query($query, $values);
        // return $query.implode(',',$values);
         
     }
}