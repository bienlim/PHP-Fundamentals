<?php


    Class Shop extends CI_Model{

        public function get_products(){
            return $this->db->query("SELECT * FROM test_shopping_products")->result_array();
        }
        public function get_cart(){
            return $this->db->query("SELECT * FROM test_shopping_carts WHERE qty > 0")->result_array();
        }

        public function get_cart_by_product($product_id){
            return $this->db->query("SELECT * FROM test_shopping_carts WHERE product_id = ?",array($product_id))->row_array();
        }

        public function add_cart_by_product($product_id,$qty){
            $query = "INSERT INTO test_shopping_carts(product_id,qty) VALUES (?,?)";
            $values = array($product_id,$qty); 
            return $this->db->query($query, $values);
        }


        public function update_cart_by_product($newQty,$product_id){
            $query = "UPDATE test_shopping_carts SET qty = ? WHERE product_id = ?";
            $values = array($newQty,$product_id); 
            return $this->db->query($query, $values);
        }

        public function remove_cart_by_product($product_id){
            $query = "DELETE FROM test_shopping_carts WHERE product_id = ?";
            $values = array($product_id); 
            return $this->db->query($query, $values);
        }


        public function update_product(){
            $query = "UPDATE test_shopping_products SET qty = ? WHERE id = ?";
            $values = array('',''); 
            return $this->db->query($query, $values);
        }


        public function view_cart(){
            return $this->db->query("   SELECT * 
                                        FROM test_shopping_carts
                                        LEFT JOIN test_shopping_products
                                        ON test_shopping_carts.product_id = test_shopping_products.id

            ")->result_array();
        }

        public function add_transaction($product_id,$qty,$price){
            $query = "INSERT INTO test_shopping_transactions(product_id,qty,user_id,unit_price) VALUES (?,?,?,?)";
            $values = array($product_id,$qty,'1',$price); 
            return $this->db->query($query, $values);
        }

    } 