<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comment extends CI_Model
{
    public function add($review,$comment)
    {
        $this->output->enable_profiler(TRUE);

        $query = "INSERT INTO test_pd_comments(id_user, id_review, content) VALUES(?,?,?)";
        $values = array(
            $this->security->xss_clean($_SESSION['id_user']),
            $this->security->xss_clean($review),
            $this->security->xss_clean($comment),
        );


        $this->db->query($query, $values);
    }

    public function get_comments_by_review($review) {
        $query = 'SELECT id_comment, content, DATE_FORMAT(test_pd_comments.created_at, "%M %d, %Y") AS review_date
        , CONCAT(name_first," ",name_last) AS username, TIMESTAMPDIFF(hour,test_pd_comments.created_at,NOW()) AS time_diff
        FROM test_pd_comments LEFT JOIN test_pd_users on test_pd_comments.id_user=test_pd_users.id_user
        WHERE id_review = ?
        ORDER BY test_pd_comments.created_at DESC';

        return $this->db->query($query,array($review))->result_array();
    }


    public function validate_comment() {
        $this->load->library('form_validation');                              
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('content', 'comment', 'required');

        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else {
            return 'success';
        }
    }


}