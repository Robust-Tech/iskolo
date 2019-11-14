<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {
    
    function __construct()
    {
        parent::__construct();
        User::logged_in();
      
        if (User::is_teacher()) {
            redirect('teacher');
        }
        if (User::is_parent()) {
            redirect('dashboard');
        } 
        
        if (User::is_student()) {
            redirect('mydashboard');
        }


        $this->load->model(array('Classes','App','Message'));
    }
    
	public function index()
	{
    $this->load->module('layouts');
    $this->load->library('template');
    $this->template->title($this->config->item('website_name'));
    $data['page'] = 'home';
        
        $data['messages'] = Message::get_inbox(User::get_id());
			$this->template
					->set_layout('users')
					->build('welcome',isset($data) ? $data : NULL);
	}
}
