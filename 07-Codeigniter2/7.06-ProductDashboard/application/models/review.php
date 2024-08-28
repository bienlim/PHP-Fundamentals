<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class review extends CI_Model
{
    public function add($review,$product)
    {
        $this->output->enable_profiler(TRUE);

        $query = "INSERT INTO test_pd_reviews(id_user, id_product, content) VALUES(?,?,?)";
        $values = array(
            $this->security->xss_clean($_SESSION['id_user']),
            $this->security->xss_clean($product),
            $this->security->xss_clean($review)
        );


        $this->db->query($query, $values);
    }

    public function get_reviews_by_product($product) {
        $query = 'SELECT id_review, content, DATE_FORMAT(test_pd_reviews.created_at, "%M %d, %Y") AS review_date
                , CONCAT(name_first," ",name_last) AS username, TIMESTAMPDIFF(hour,test_pd_reviews.created_at,NOW()) AS time_diff
        FROM test_pd_reviews LEFT JOIN test_pd_users on test_pd_reviews.id_user=test_pd_users.id_user
        WHERE id_product = ?
        ORDER BY test_pd_reviews.created_at DESC';

        return $this->db->query($query,array($product))->result_array();
    }

    /*  DOCU: This function validates the required message input.
        Owner: Karen
    */
    public function validate_review() {
        $this->load->library('form_validation');                                    //ADDED

        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('content', 'review', 'required');

        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else {
            return 'success';
        }
    }


}