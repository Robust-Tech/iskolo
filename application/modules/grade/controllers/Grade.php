<?php
defined('BASEPATH') or exit('Access Denied');

class Grade extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();
        if(!User::is_admin())
        {
            redirect('login');
        }
    }
    
    public function index()
    {       $table = "grades";
    $data['grades'] = App::get_details($table);
    $this->load->module('layouts');
    $this->load->library('template');
    $this->template->title('Grades '.' @ '. config_item('school_name'));
    $data['page'] = 'home';
    $this->template
					->set_layout('users')
					->build('grades',isset($data) ? $data : NULL);
    }
    
    public function create()
    {
          /* ------------------------------- */
        $this->form_validation->set_rules('grade','Grade Name','required|max_length[50]');
        $this->form_validation->set_rules('description','Subject Description','max_length[50]');

        /* ------------------------------- */
        $data['subjects'] = (object)$postData = [
            'grade_name'     => $this->input->post('grade',true), 
            'description'  => $this->input->post('description',true)
        ];  
    
        /* ------------------------------- */
        if ($this->form_validation->run() === true ) {

            /*if empty $id then insert data*/
            if ($this->App->save('grades',$postData)) {
                 $message['exception'] = "New Record Added!!";
                $this->session->set_flashdata($message);
                 redirect($_SERVER['HTTP_REFERER']);
                $this->emailSend();
            } else {
                /*set exception message*/
                $message['exception'] = "Please try again!"; 
                $this->session->set_flashdata($message);
                redirect($_SERVER['HTTP_REFERER']);
            } 

        } else {
            $message['exception'] = validation_errors();
            $this->session->set_flashdata($message);
            redirect($_SERVER['HTTP_REFERER']);
        } 
    }
    public function edit()
    {
        
        
    }
    
    public function delete()
    {
        
    }
}
