<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model
{

    /*  DOCU: This function retrieves user information filtered by email.
     */
    function get_all_products()
    {
        $query = "SELECT * FROM test_pd_products WHERE status != 1 ORDER BY id_product";
        return $this->db->query($query)->result_array();
    }

    function get_product($id_product)
    {
        return $this->db->query("SELECT * FROM test_pd_products WHERE id_product = ?",array($id_product))->row_array();
    }

    
    function remove_product($id_product)
    {
        $query = 'UPDATE test_pd_products SET status=1 WHERE id_product = ?';
        $values = array(
            $this->security->xss_clean($id_product)); 
        
        $this->db->query($query, $values);
    }
    function edit_product($edit_product)
    {
        $query = 'UPDATE test_pd_products SET name_product = ?, price = ?, count_stock = ?, count_sold = ? WHERE id_product = ?';
        $this->security->xss_clean($edit_product); 
        $values = array(
            $edit_product['name_product'],
            $edit_product['price'],
            $edit_product['count_stock'],
            $edit_product['count_sold'],
            $edit_product['id_product']
        );
            
        
        $this->db->query($query, $values);
    }
    function add_product($edit_product)
    {
        $query = 'INSERT INTO test_pd_products(name_product,img_product,price,count_stock, count_sold) VALUES(?,?,?,?,?)';
        $this->security->xss_clean($edit_product); 
        $values = array(
            $edit_product['name_product'],
            $edit_product['img_product'],
            $edit_product['price'],
            $edit_product['count_stock'],
            $edit_product['count_sold']
        );
            
        
        $this->db->query($query, $values);
    }

    public function validate_edit_product() 
    {
        $this->load->library('form_validation');                                    //ADDED

        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('name_product', 'Name', 'required');
        $this->form_validation->set_rules('img_product', 'Image lnk', 'required|valid_url');
        $this->form_validation->set_rules('price', 'Price', 'required|greater_than[0]');
        $this->form_validation->set_rules('count_stock', 'Stock count', 'integer');
        $this->form_validation->set_rules('count_sold', 'Sold count', 'integer');

        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }
    



}
