<?php
defined('BASEPATH') or exit('Access Denied');

class Teacher extends MX_Controller
{
    function __construct()
	{
		parent::__construct();
		User::logged_in(); 

		$this->load->model(array('App','Welcome'));

		
		//$this->applib->set_locale();
	}
    public function dashboard()
    {
        if (User::is_admin()) {
			redirect('welcome');
		}
		if (User::is_parent()) {
			redirect('parent');
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
    
    public function index()
    {
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title('Teachers '.' - '.config_item('company_name'));
	$data['page'] = lang('home');
	$data['task_checkbox'] = TRUE;

	$this->template
	->set_layout('users')
	->build('teachers',isset($data) ? $data : NULL);
    }
     public function create()
    {
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('lastname', 'Surname', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');
			$this->form_validation->set_rules('marital_status', 'Marital Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('phone', 'Home Tel No.', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cell_number', 'Mobile No.', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('home_address', 'Postal Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('postal_address', 'Physical Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');

			$data['errors'] = array();

			$email_activation = false;
			$role = 2;

			if ($this->form_validation->run() === true) {								// validation ok
				if (!is_null($data = $this->tank_auth->create_teacher(
						$this->form_validation->set_value('email'),
						$this->form_validation->set_value('password'),
						$role,
						$this->form_validation->set_value('firstname'),
						$this->form_validation->set_value('lastname'),
						$this->form_validation->set_value('nationality'),
						$this->form_validation->set_value('marital_status'),
						$this->form_validation->set_value('title'),
						$this->form_validation->set_value('phone'),
						$this->form_validation->set_value('cell_number'),
						$this->form_validation->set_value('home_address'),
						$this->form_validation->set_value('postal_address'),

						$email_activation))) {									// success


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
    }
    
}