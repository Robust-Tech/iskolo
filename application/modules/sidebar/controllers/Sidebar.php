<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sidebar extends MX_Controller {
	


	function __construct()
	{
		parent::__construct();
		$this->load->model(array('User','App'));

	}
	public function admin_menu()
	{
		$data['languages'] = App::languages();
        $this->load->view('admin_menu',isset($data) ? $data : NULL);
	}
	public function teacher_menu()
	{
		$data['languages'] = App::languages();
		$this->load->view('teacher_menu',isset($data) ? $data : NULL);
	}
	public function parent_menu()
	{
		$data['languages'] = App::languages();
        $this->load->view('parent_menu',isset($data) ? $data : NULL);
	}
    
    public function student_menu()
	{
		$data['languages'] = App::languages();
        $this->load->view('student_menu',isset($data) ? $data : NULL);
	}
	public function top_header()
	{
                $this->load->view('top_header',isset($data) ? $data : NULL);
	}
	
	public function scripts()
	{
		//$this->load->view('scripts/uni_scripts',isset($data) ? $data : NULL);
	}
	public function flash_msg()
	{
		$this->load->view('flash_msg',isset($data) ? $data : NULL);
	}
}
/* End of file sidebar.php */