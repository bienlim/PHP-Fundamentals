<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class search extends CI_Model {
  public function fetch_all()
  {
    return $this->db->query("SELECT 1 FROM test_pd_products")->result_array();
  }
  public function get_search($search)
  {
    $orderquery = array(
                "ORDER BY price;",
                "ORDER BY price DESC;",
                "ORDER BY count_stock",
                "ORDER BY count_stock DESC;",
                "ORDER BY created_at;",
                "ORDER BY created_at DESC;"
    );
    
    $query = "SELECT name_product, count_stock, price, created_at  FROM test_pd_products WHERE ";
    $query .= "INSTR(name_product, ?)";
    $query .= " AND price > ? ";
    $query .= " AND price < ? ";
    $query .= $orderquery[isset($search['orderby'])?($search['orderby']):0];

    $values = array(
        !empty($search['name_product'])?$search['name_product']:" ",
        !empty($search['min_price'])?$search['min_price']:0,
        !empty($search['max_price'])?$search['max_price']:9999999
    );
    
    return $this->db->query($query, $values)->result_array();
  }
}