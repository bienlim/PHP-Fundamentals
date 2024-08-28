<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    /*  DOCU: This function retrieves user information filtered by email.
    */
    function get_user_by_email($email)
    { 
        $query = "SELECT * FROM test_pd_users WHERE email=? LIMIT 1";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }
    function get_user_by_id()
    { 
        $query = "SELECT * FROM test_pd_users WHERE id_user=?";
        return $this->db->query($query, $this->session->userdata('id_user'))->row_array();
    }

    /*  DOCU: This function inserts new user info upon registration.
    */
    function create_user($user)
    {
        /* this condition verifies if the user is the first person to sign up, the user will be an admin 
        */
        if($this->db->query("SELECT 1 FROM test_pd_users"))
        {
            $user['user_level'] = 0;
        }
        else
        {
            $user['user_level'] = 9;
        }

        $query = "INSERT INTO test_pd_users (name_first, name_last, email, password, user_level) VALUES (?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($user['name_first']), 
            $this->security->xss_clean($user['name_last']), 
            $this->security->xss_clean($user['email']), 
            md5($this->security->xss_clean($user["password"])), 
            $this->security->xss_clean($user['user_level']));
        
        return $this->db->query($query, $values);
    }

    /*  DOCU: This function checks if all required fields were filled up.
    */
    function validate_signin_form() {
        $this->load->library('form_validation');                                    //ADDED
        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }
    
    /*  DOCU: This function contains simple condition to match database record and user input in password.
    */
    function validate_signin_match($user_pass, $password) 
    {
        $hash_password = md5($this->security->xss_clean($password));
        
        if($user_pass && $user_pass == $hash_password) {
            return "success";
        }
        else {
            return "Incorrect email/password.";
        }
    }

    /*  DOCU: This function checks required input fields and if unique email.
    */
    function validate_registration($email) 
    {
        $this->load->library('form_validation');                                    //ADDED

        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('name_first', 'First Name', 'required');
        $this->form_validation->set_rules('name_last', 'Last Name', 'required');   
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');        
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }
        else if($this->get_user_by_email($email)) {
            return "Email already taken.";
        }
    }
    function validate_update() 
    {
        $this->load->library('form_validation');                                    //ADDED

        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('name_first', 'First Name', 'required');
        $this->form_validation->set_rules('name_last', 'Last Name', 'required');        
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');        

        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }

    }
    function validate_reset() 
    {
        $this->load->library('form_validation');                                    //ADDED

        $this->form_validation->set_error_delimiters('<div>','</div>');
        $this->form_validation->set_rules('password_new', 'new password', 'required|min_length[8]');
        $this->form_validation->set_rules('password_new_confirm', 'confirm new password', 'required|matches[password_new]');
        
        if(!$this->form_validation->run()) {
            return validation_errors();
        }

    }

    function edit_user($edit_user)
    {
        $query = 'UPDATE test_pd_users SET name_first = ?, name_last = ?, email = ? WHERE id_user = ?';
        $this->security->xss_clean($edit_user); 
        $values = array(
            $edit_user['name_first'],
            $edit_user['name_last'],
            $edit_user['email'],
            $edit_user['id_user']
        );
            
        
        $this->db->query($query, $values);
    }
    function reset_user($reset_user)
    {
        $query = 'UPDATE test_pd_users SET password = ? WHERE id_user = ?';
        $this->security->xss_clean($reset_user); 
        $values = array(
            md5($reset_user['password_new']),
            $reset_user['id_user']
        );
            
        
        $this->db->query($query, $values);
    }

}

?>