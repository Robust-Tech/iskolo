<?php
defined('BASEPATH') or exit('Access Denied');

class Attendance extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();
    }
    
    public function index()
    {
    $this->load->module('layouts');
    $this->load->library('template');
     $this->template->title('Attendance | ' . $this->config->item('website_name'));
    $data['fullcalendar'] = TRUE;
    $data['datepicker'] = TRUE;
    $data['form'] = TRUE;
    $data['page'] = lang('calendar');
    $this->template
    ->set_layout('users')
                ->build('attendance',isset($data) ? $data : NULL);  
    }
    
}