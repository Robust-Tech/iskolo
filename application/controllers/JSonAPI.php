<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JSonAPI extends CI_Controller 
{
    public function get_Students()
    {
        
    }
    
    public function login()
    {
         $json_decode = json_decode(file_get_contents('php://input'), true);
        $username = $json_decode['username'];
        $password = $json_decode['password'];
        
        if ($this->tank_auth->is_logged_in()) {									// logged in
			$data['message'] = '';

		} elseif ($this->tank_auth->is_logged_in(FALSE)) {						// logged in, not activated
			$data['message'] = 0;

		} else {
			$data['login_by_username'] = ($this->config->item('login_by_username', 'tank_auth') AND
					$this->config->item('use_username', 'tank_auth'));
			$data['login_by_email'] = $this->config->item('login_by_email', 'tank_auth');


			// Get login for counting attempts to login
			if ($this->config->item('login_count_attempts', 'tank_auth') AND
					($login = $username)) {
				$login = $this->security->xss_clean($login);
			} else {
				$login = '';
			}
			$data['errors'] = array();

			if (!empty($data)) {								// validation ok
				if ($this->tank_auth->login($username,
						$password,
						$data['login_by_username'],
						$data['login_by_email'])) {								// success
					$data['message'] = $this->session->userdata();

				} else {
					$errors = $this->tank_auth->get_error_message();
					if (isset($errors['banned'])) {								// banned user
						$data['message']$this->_show_message($this->lang->line('auth_message_banned').' '.$errors['banned']);

					} elseif (isset($errors['not_activated'])) {				// not activated user
						$data['message'] = 'User not activated';

					} else {													// fail
						foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
					}
				}
			}
		}

    }
}