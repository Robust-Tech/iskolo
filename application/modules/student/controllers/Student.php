<?php
defined('BASEPATH') or exit('Access Denied');

class Student extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();
    }
    
    public function index()
    {
    $data['grade_list'] = App::grade_list();
    $data['parent_list'] = App::parent_list();       
    $data['students'] = App::get_students();
   
    $this->load->module('layouts');
    $this->load->library('template');
    $this->template->title('Students '.' @ ' .config_item('website_name'));
    $data['page'] = lang('home');
	$this->template
		->set_layout('users')
		->build('students',isset($data) ? $data : NULL);
    }
    public function create()
    {
        if($this->input->post()){
            
       
        /* ------------------------------- */
      	$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('lastname', 'Surname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('id_no', 'ID No. / Passport No.', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');
			$this->form_validation->set_rules('midname', 'Middle Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('parent_id', 'Parent ', 'trim|required|xss_clean|numeric');

			$this->form_validation->set_rules('grade_id', 'Grade', 'trim|required|xss_clean');
			$this->form_validation->set_rules('previous_school', 'Employer.', 'trim|required|xss_clean');
			$this->form_validation->set_rules('previous_school_address', 'Work Tel No.', 'trim|required|xss_clean');
			$this->form_validation->set_rules('previous_school_tel', 'Work Fax', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
				$data['errors'] = array();
    
        /* ------------------------------- */
        if ($this->form_validation->run() === true ) {

            /*if empty $id then insert data*/
            if (!is_null($data = $this->tank_auth->create_student(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
                        $this->form_validation->set_value('firstname'),
                        $this->form_validation->set_value('midname'),
						$this->form_validation->set_value('lastname'),
						$this->form_validation->set_value('id_no'),
						
                        $this->form_validation->set_value('midname'),
						$this->form_validation->set_value('gender'),
						$this->form_validation->set_value('dob'),
						$this->form_validation->set_value('home_language'),
						$this->form_validation->set_value('grade_id'),
						$this->form_validation->set_value('parent_id'),
						$this->form_validation->set_value('previous_school'),
						$this->form_validation->set_value('previous_school_address'),
						$this->form_validation->set_value('previous_school_tel'),
						$email_activation))) {
							if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

							$this->_send_email('welcome', $data['email'], $data);
						}
						unset($data['password']); // Clear password (just for any case)
                 $message['exception'] = "New Student record registered";
                $this->session->set_flashdata($message);
                 redirect($_SERVER['HTTP_REFERER']);
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
    } else {
            $this->load->view('modal/create',isset($data) ? $data : NULL);
        }
    }
    
    public function edit()
    {
        
    }
    
    public function delete()
    {
        
    } 
    
    public function promote()
    {
        
    }
}