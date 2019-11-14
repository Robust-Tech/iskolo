<?php

defined('BASEPATH') or exit('Access Denied');

class Activities extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();
    }
    
    public function index()
    {
        if(!User::is_parent() or !User::is_student){
            $data['activities'] = App::get_details('activities');
         $this->load->module('layouts');
         $this->load->library('template');
         $this->template->title('Activities' . ' @ ' . $this->config->item('website_name'));
          $data['datatables'] = true;
        $data['form'] = true;
         $this->template
                ->set_layout('users')
                ->build('activities',isset($data) ? $data : NULL);
            
        } else
        {
        $this->load->module('layouts');
         $this->load->library('template');
         $this->template->title('Activities' . ' @ ' . $this->config->item('website_name'));
          $data['datatables'] = true;
        $data['form'] = true;
         $this->template
                ->set_layout('users')
                ->build('activity',isset($data) ? $data : NULL);
        }
    }
    public function create()
    {
        if(User::is_admin()){

        if ($_POST) {

        $this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
        $this->form_validation->set_rules('title', 'Activity Title', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('type', 'Activity', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            Applib::go_to($_SERVER['HTTP_REFERER'],'error','form has errors');
        }else{
            $start_date = Applib::date_formatter($this->input->post('start_date', TRUE));
            $end_date = Applib::date_formatter($this->input->post('end_date', TRUE));
                    $data = array(
                        'activity_name'    => $this->input->post('title', TRUE),
                        'description'   => $this->input->post('desc', TRUE),
                        'start_date'    => $this->input->post('start_date', TRUE),
                        'end_date'      => $this->input->post('end_date', TRUE),
                        'type_id'       => $this->input->post('type', TRUE),
                        'color'         => $this->input->post('color', TRUE),
                        'created_by'      => User::get_id(),
                        'created_date'       => date('Y-m-d H:i:s')
                        );
                    $this->db->insert('activities', $data);
                    Applib::go_to($_SERVER['HTTP_REFERER'],'success','Activity added successfully');
            }
                } else {
                    $this->load->view('modal/create',isset($data) ? $data : NULL);
                }
    }
    }

    function delete()
	{
		if ($this->input->post()) {

			$activity = $this->input->post('activity', TRUE);
			App::delete('activities',array('id' => $activity));
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'Actvity deleted Successfully');
            Applib::go_to($_SERVER['HTTP_REFERER'],'success','Activity added successfully');
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete',$data);
		}
    }
    
    public function edit()
    {
        if ($this->input->post()) {
          
            $activity = $this->input->post('activity', TRUE);
            $id = $this->input->post('id', TRUE);
            $this->form_validation->set_rules('title', 'Activity Title', 'required');
            $this->form_validation->set_rules('start_date', 'Start Date', 'required');
            $this->form_validation->set_rules('type', 'Activity', 'required');
            $this->form_validation->set_rules('end_date', 'End Date', 'required');
            $this->session->set_flashdata('response_status', 'success');
            $this->session->set_flashdata('message', 'Activity updated');
        if ($this->form_validation->run() == FALSE)
        {
             $this->session->set_flashdata('response_status', 'errors');
            $this->session->set_flashdata('message', 'Form has error');
            Applib::go_to($_SERVER['HTTP_REFERER'],'success','Activity added successfully');
        }else{
        $this->db->set('activity_name' , $this->input->post('title', TRUE));
        $this->db->set('description' ,$this->input->post('desc', TRUE));
        $this->db->set( 'start_date' , $this->input->post('start_date', TRUE));
        $this->db->set('end_date'  , $this->input->post('end_date', TRUE));
        $this->db->set( 'type_id' , $this->input->post('type', TRUE));
            $this->db->wher('id',$id);
                    $this->db->update('activities');
                    $this->session->set_flashdata('response_status', 'success');
            $this->session->set_flashdata('message', 'Activity updated');
            Applib::go_to($_SERVER['HTTP_REFERER'],'success','Activity added successfully');
            }
        } else {
            $data['id'] =  $this->uri->segment(3);
            $this->load->view('modal/edit', $data);
        }
    }

    public function view()
    {
        $data['id'] =  $this->uri->segment(3);
        $this->load->view('modal/view', $data);
    }
}