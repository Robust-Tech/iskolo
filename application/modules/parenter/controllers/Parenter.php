<?php

defined('BASEPATH') or exit('Access Denied');

class Parenter extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();

    }
        public function dashboard()
    {
        
        
    }
    public function index()
    {
        if (!User::is_admin()) {
            if (User::is_admin()) {
			redirect('welcome');
		}
		if (User::is_teacher()) {
			redirect('teachers');
		}
        if(User::is_student())
        {
            redirect('mydashboard');
        }
           $this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(' Welcome '.' - '.config_item('company_name'));
	$data['page'] = lang('home');
	$data['task_checkbox'] = TRUE;

	$this->template
	->set_layout('users')
	->build('welcome',isset($data) ? $data : NULL);
	
	
        }
          $data['parents'] = App::get_parents();
    $this->load->module('layouts');
    $this->load->library('template');
    $this->template->title('Parents '.' @ ' .config_item('website_name'));
    $data['page'] = 'home';
			$this->template
					->set_layout('users')
					->build('parents',isset($data) ? $data : NULL);  
    }
    
    public function create()
    {
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('lastname', 'Surname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('id_no', 'ID No. / Passport No.', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');
			$this->form_validation->set_rules('marital_status', 'Marital Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('phone', 'Home Tel No.', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cell_number', 'Mobile No.', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('home_address', 'Postal Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('postal_address', 'Physical Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('employer', 'Employer.', 'trim|required|xss_clean');
			$this->form_validation->set_rules('work_tel', 'Work Tel No.', 'trim|required|xss_clean');
			$this->form_validation->set_rules('work_fax', 'Work Fax', 'trim|required|xss_clean');
			$this->form_validation->set_rules('occupation', 'Occupation', 'trim|required|xss_clean');
			$this->form_validation->set_rules('work_address', 'Work Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

			$data['errors'] = array();

			$email_activation = 1;
			$role = 4;

			if ($this->form_validation->run() === true) {								// validation ok
				if (!is_null($data = $this->tank_auth->create_parent(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$this->form_validation->set_value('firstname'),
						$this->form_validation->set_value('lastname'),
						$role,
						$this->form_validation->set_value('id_no'),
						$this->form_validation->set_value('nationality'),
						$this->form_validation->set_value('marital_status'),
						$this->form_validation->set_value('title'),
						$this->form_validation->set_value('phone'),
						$this->form_validation->set_value('cell_number'),
						$this->form_validation->set_value('home_address'),
						$this->form_validation->set_value('postal_address'),
						$this->form_validation->set_value('employer'),
						$this->form_validation->set_value('occupation'),
						$this->form_validation->set_value('work_address'),
						$this->form_validation->set_value('work_tel'),
						$this->form_validation->set_value('work_fax'),
						$email_activation))) {									// success


						if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

							$this->_send_email('welcome', $data['email'], $data);
						}
						unset($data['password']); // Clear password (just for any case)
$message['exception'] = "New Parent Registered";
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
    }
    
    function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
	}
}