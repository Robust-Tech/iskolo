<?php
defined('BASEPATH') or exit('Access Denied');

class Installer extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        if($this->check_installed() && ($this->uri->segment(1) != 'installer'))
        {
            redirect('');
        }
    
        $this->load->helper(array('url','file','curl'));
    }
    public function index()
    {
        $this->load->view('install');
    }
    public function check_installed()
    {
        include APPPATH.'config/database.php';
        $host = $db['default']['hostname'];
        $username = $db['default']['username'];
        $pass = $db['default']['password'];
        $db_name = $db['default']['database'];
        
        return $this->check_db_config($host,$username,$pass,$db_name);
    }
    
    public function installed()
    {
        $this->enable_access();
        $this->change_route();
        redirect();
        
    }
    
    
    public function start()
    {
        $this->session->sess_destroy();
        redirect('installer/?step=2', 'refresh');
    }
    
    public function setup_database()
    {
        $conn =  $this->check_db_con();
        if($conn)
        {
            $conn_config = $this->conn_config();
            
            $this->complete_step('database_setting', '3');
            
            redirect('installer/?step=3');
        } else
        {
            $this->session->set_flashdata('message','Database Connection failed');
            redirect('installer/?step=2');
        }
    }
    
    public function complete()
    {
        $this->init_db();
        $this->enable_access();
        $this->setup_admin();
        $this->change_route();
        $this->update_htacces();
        $this->session-sess_destroy();
        
        redirect('installer/finished');
    }
    public function finished()
    {
        $this->load->view('finished');
    }
    
    public function conn_config()
    {
        // Replaces the database settings
        $dbdata = read_file('./application/config/database.php');
        $dbdata = str_replace('db_name', $this->input->post('set_database'), $dbdata);
        $dbdata = str_replace('db_user', $this->input->post('set_user'), $dbdata);
        $dbdata = str_replace('db_pass', $this->input->post('set_password'), $dbdata);
        $dbdata = str_replace('db_host', $this->input->post('set_hostname'), $dbdata);
        write_file('./application/config/database.php', $dbdata);
    }
      public function complete_step($setting, $next_step)
    {
        $formdata = array(
            $setting => 'complete',
            'next_step' => $next_step,
        );

        return $this->session->set_userdata($formdata);
    }
    public function setup_admin()
    {
        $this->load->library('tank_auth');
        $this->db->truncate('users');
        $this->db->truncate('user_account');
        $this->db->where('config_key','webmaster_email')->delete('config');
        
        // Prepare system Settings
        
        $username = $this->input->post('set_username');
        $email = $this->input->post('set_email');
        $password = $this->input->post('set_password');
        $firstname = $this->input->post('set_firstname');
        $lastname = $this->input->post('set_lastname');
        $school_name = $this->input->post('set_school_name');
        $school_email = $this->input->post('set_school_email');
        $school_contact_number = $this->input->post('set_school_contact_number');
        $school_domain = $this->input->post('set_school_domain');
        $email_activation = false;
        
        $codata = array('value' => $school_name);
        $this->db->where('config_key','school_name')->update('config',$codata);
        
        $codata =  array('value' => $school_name);
        $this->db->where('config_key','school_legal_name')->update('config',$codata);
        
        $codata =  array('value' => $school_name);
        $this->db->where('config_key','website_name')->update('config',$codata);
        
        $codata =  array('value' => $email);
        $this->db->where('config_key','support_email')->update('config',$codata);
            
        $codata =  array('value' => $username);
        $this->db->where('config_key','mail_username')->update('config',$codata);
        $codata =  array('value' => $firstname. ' '. $lastname);
        $this->db->where('config_key','contact_person')->update('config',$codata);
        
        $codata =  array('value' => $school_email);
        $this->db->where('config_key','school_email')->update('config',$codata);
        
        $return_create_user =$this->tank_auth->create_user($username,$email,$password,$firstname,$lastname,'1',
            '',$school_name,$school_email,$school_contact_number);
        return $return_create_user;
    }
    
        public function init_db($version = null)
    {
        // Run install sql installer
        $this->load->database();
        
        $tmpline = '';
        
        // Read the entire sql file
        $file_content = file('./temp/database.sql');
        
        foreach($file_content as $line)
        {
            if(substr($line,0,2) == '--' || $line == '')
            {
                continue;
            }
            $file_content .= $line;
            if(substr(trim(line), -1, 1) == ';')
            {
                $this->db->query($file_content) or print 'Error performing querry \<stong>'.$file_content.': '.mysql_error().'';
                $content_file = '';
            }
        }
        return true;
    }
      public function enable_access()
    {
        $confdata = read_file('./application/config/config.php');
        $confdata = str_replace(
            '$config[\'enable_hooks\'] = FALSE;',
            '$config[\'enable_hooks\'] = TRUE;',
            $confdata);
        $confdata = str_replace(
            '$config[\'index_page\'] = \'index.php\';',
            '$config[\'index_page\'] = \'\';',
            $confdata);
        $confdata = str_replace(
            '$config[\'sess_driver\'] = \'files\';',
            '$config[\'sess_driver\'] = \'database\';',
            $confdata);
        $confdata = str_replace(
            '$config[\'sess_save_path\'] = FCPATH.\'assets/tmp/\';',
            '$config[\'sess_save_path\'] = \'un_sessions\';',
            $confdata);

        write_file('./application/config/config.php', $confdata);

        $libdata = read_file('./application/config/autoload.php');
        $libdata = str_replace(
            '$autoload[\'libraries\'] = array(\'session\');',
            '$autoload[\'libraries\'] = array(\'session\',\'database\',\'tank_auth\',\'applib\');',
            $libdata);
        write_file('./application/config/autoload.php', $libdata);
    }
    public function change_route()
    {
        // Replace the default routing controller
        $rdata = read_file('./application/config/routes.php');
        $rdata = str_replace('installer', 'welcome', $rdata);
        write_file('./application/config/routes.php', $rdata);

        $data = 'Software installed';
        if (write_file('./temp/installed.txt', $data)) {
            return true;
        }
    }
    public function update_htacces()
    {
          $subfolder = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        if (!empty($subfolder)) {
            $input = '<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase '.$subfolder.'
RewriteCond %{REQUEST_URI} ^system.*
RewriteRule ^(.*)$ /index.php?/$1 [L]

RewriteCond %{REQUEST_URI} ^application.*
RewriteRule ^(.*)$ /index.php?/$1 [L]

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule>

<IfModule !mod_rewrite.c>
ErrorDocument 404 /index.php
</IfModule>';

            $current = @file_put_contents('./.htaccess', $input);
        }
    }
    
    public function check_db_con()
    {
          $link = @mysqli_connect(
            $this->input->post('set_host'),
            $this->input->post('set_user'),
            $this->input->post('set_password'),
            $this->input->post('set_database')
        );
        if (!$link) {
            @mysqli_close($link);

            return false;
        }

        @mysqli_close($link);

        return true;
    }
    
      public function check_db_config($host, $user, $pass, $database)
    {
        $link = @mysqli_connect(
            $host,
            $user,
            $pass,
            $database
        );
        if (!$link) {
            @mysqli_close($link);

            return false;
        }

        @mysqli_close($link);

        return true;
    }
}