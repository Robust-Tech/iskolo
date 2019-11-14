<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Welcome extends CI_Model
{
	
	private static $db;

	function __construct(){
		parent::__construct();
		self::$db = &get_instance()->db;
	}
    public function subjects_assessment()
    {
        self::$db->join('subjects','subjects.project_assigned = projects.project_id');
		self::$db->where('assigned_user', $user);
		return self::$db->order_by('date_created','desc')->group_by('project_assigned')
					->get('projects',$limit)->result();
    }
    function teacher_subjects($user, $limit = 10)
    {
        return self::$this->db->where('teacher_id', $user)->get('subjects', $limit)->result();
    }
}