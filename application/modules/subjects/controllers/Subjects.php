<?php
defined('BASEPATH') or exit('Access Denied');

class Subjects extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();
    }
    
    public function index()
    {    
    $data['grade_list'] = App::grade_list();
    $data['teacher_list'] = App::teacher_list();
    $table = "subjects";
    $data['subjects'] = App::get_subjects();
    $this->load->module('layouts');
    $this->load->library('template');
    $this->template->title('Subjects'. ' @ ' . $this->config->item('website_name'));
    $data['page'] = 'home';
        $this->template
					->set_layout('users')
					->build('subjects',isset($data) ? $data : NULL);
    }
    
    public function create()
    {
         /* ------------------------------- */
        $this->form_validation->set_rules('title','Subject Name','required|max_length[50]');
        $this->form_validation->set_rules('description','Subject Description');
        $this->form_validation->set_rules('grade','Grade','required');
        $this->form_validation->set_rules('teacher','Teacher');

        /* ------------------------------- */
        $data['subjects'] = (object)$postData = [
            'name'     => $this->input->post('title',true), 
            'description'  => $this->input->post('description',true), 
            'grade_id'      => $this->input->post('grade',true), 
            'teacher_id'    => $this->input->post('teacher',true), 
            'created_by'      => User::get_id(),
            'created_date'    => date('Y-m-d'),
        ];  
    
        /* ------------------------------- */
        if ($this->form_validation->run() === true ) {

            /*if empty $id then insert data*/
            if ($this->App->save('subjects',$postData)) {
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
    public function update()
    {
        
    }
}