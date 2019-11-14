<?php

defined('BASEPATH') or exit('Access Denied');

class Assessments extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();
    }
    
    public function index()
    {
    $data['grade_list'] = App::grade_list();
    $data['subject_list'] = App::subject_list();
    $data['assessment_list'] = App::assessment_type_list();
    $table = "assessments";
    $data['assessments'] = App::get_details($table);
    $this->load->module('layouts');
    $this->load->library('template');
    $this->template->title('Assessments'. ' @ ' . config_item('company_name'));
    $data['page'] = 'home';
        $this->template
					->set_layout('users')
					->build('assessments',isset($data) ? $data : NULL);
    }
     public function create()
    {
         /* ------------------------------- */
        $this->form_validation->set_rules('title','Assessment','required|max_length[50]');
        $this->form_validation->set_rules('description','Subject Description');
        $this->form_validation->set_rules('grade','Grade','required');
        $this->form_validation->set_rules('type','Assessment');

        /* ------------------------------- */
        $data['subjects'] = (object)$postData = [
            'title'     => $this->input->post('title',true), 
            'subject_id'  => $this->input->post('subject',true), 
            'grade_id'      => $this->input->post('grade',true), 
            'type_id'    => $this->input->post('type',true), 
            'created_by'      => User::get_id(),
            'created_date'    => date('Y-m-d'),
        ];  
    
        /* ------------------------------- */
        if ($this->form_validation->run() === true ) {

            /*if empty $id then insert data*/
            if ($this->App->save('assessments',$postData)) {
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
}