<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class order extends CI_Model {
  public function fetch_all()
  {
    return $this->db->query("SELECT * FROM test_ordertaker")->result_array();
  }
  public function create($new_order)
  {
    $this->load->helper('security');
    $query = "INSERT INTO test_ordertaker (content) VALUES (?)";
    $values = array(
            $this->security->xss_clean($new_order)
            );
    return $this->db->query($query, $values);
  }
  public function update($update_order,$id_order)
  {
    $this->load->helper('security');
    $query = "UPDATE test_ordertaker SET content = ? WHERE id_order = ?";
    $values = array(
            $this->security->xss_clean($update_order),
            $this->security->xss_clean($id_order)
            );
    return $this->db->query($query, $values);
  }
  public function remove($id_order)
  {
    $this->load->helper('security');
    $query = "DELETE FROM test_ordertaker WHERE id_order = ?";
    $values = array(
            $this->security->xss_clean($id_order)
            );
    return $this->db->query($query, $values);
  }

  
}