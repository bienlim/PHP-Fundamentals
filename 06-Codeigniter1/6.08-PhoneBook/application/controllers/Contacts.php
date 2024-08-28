<?php

    Class Contacts extends CI_Controller{

        public function index(){
            

            $this->load-> model('Contact');
            $results = $this->Contact->get_all_contact();
            $view_data = array(
                'results' => $results
            );

            $this->load->view('contacts',$view_data);
        }
        public function show(){
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $contact = $this->input->post('contact');

            $view_data = array(
                'id' => $id,
                'name' => $name,
                'contact' => $contact,
            );
            $this->load->view('show',$view_data);
           /*  $this->sesssion->set_flashdata('name',$name);
            $this->sesssion->set_flashdata('contact',$contact);
 */

        }
        public function edit(){

            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $contact = $this->input->post('contact');

            $view_data = array(
                'id' => $id,
                'name' => $name,
                'contact' => $contact,
            );

            $this->load->view('edit',$view_data);
        }

            public function update(){
                $this->output->enable_profiler(TRUE);
                $id = $this->input->post('id');
                $name = $this->input->post('name');
                $contact = $this->input->post('contact');

                $this->load->model('Contact');
                $this->Contact->update_contact_by_id($name,$contact,$id);

                //echo $sample;
                //echo $id.$name.$contact.$result;
                redirect();
            }

        public function remove(){
            $id = $this->input->post('id');
            $this->load->model('Contact');
            $this->Contact->remove_contact($id);
            redirect();
        }

        public function new(){
            

            $this->load->view('new');
        }
        public function new_confirm(){
            $name = $this->input->post('name');
            $contact = $this->input->post('contact');
            
            $this->load->model('Contact');
            $this->Contact->add_contact($name,$contact);
            redirect();
        }





    }