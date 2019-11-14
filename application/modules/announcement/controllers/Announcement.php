<?php
defined('BASEPATH') or exit('Access Denied');

class Announcement extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        User::logged_in();
    }
    
    public function index()
    {
        $data['announcements'] =  App::get_details('announcements');
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title('Announcement @ '. config_item('website_name'));
        $this->template
            ->set_layout('users')
                ->build('announcements',isset($data) ? $data : NULL); 
    }

    public function create()
    {
        if(User::is_admin()){

        if ($_POST) {

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('priority', 'Priority', 'required');
        $this->form_validation->set_rules('grade', 'grade', 'required');
        $this->form_validation->set_rules('desc', 'Desc', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            Applib::go_to($_SERVER['HTTP_REFERER'],'error','form has errors');
        }else{
                    $data = array(
                        'title'    => $this->input->post('title', TRUE),
                        'description'   => $this->input->post('desc', TRUE),
                        'role_id'    => $this->input->post('role', TRUE),
                        'grade_id'      => $this->input->post('grade', TRUE),
                        'visible'         => $this->input->post('priority', TRUE),
                        'created_by'      => User::get_id(),
                        'created_date'       => date('Y-m-d')
                        );
                    $this->db->insert('announcements', $data);
                    Applib::go_to($_SERVER['HTTP_REFERER'],'success','Announcement added successfully');
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
			App::delete('announcements',array('id' => $activity)); //delete invoices
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'Announcement deleted Successfully');
			redirect('announcement');
		}else{
			$data['id'] = $this->uri->segment(3);
			$this->load->view('modal/delete',$data);
		}
    }
    
    public function edit()
    {
        if ($this->input->post()) {
          
            $announcement = $this->input->post('announcement', TRUE);
            $this->session->set_flashdata('response_status', 'success');
            $this->session->set_flashdata('message', 'Announcement updated');
            redirect('announcement');
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