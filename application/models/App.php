<?php 
defined('BASEPATH') or exit('Access denied');

class App extends CI_Model
{
    private static $db;
    
    function __construct()
    {
        parent::__construct();
        self::$db =&get_instance()->db;
    }
    static function mystudent($user_id)
    {
       return self:: $db->where('parent_id',$user_id)
            ->get('students')->result();
    }
    static function get_students()
    {
        return self:: $db->where('role_id',4)
            ->join('students','students.user_id = users.id')
            ->join('grades','students.gradeid = grades.id')
            ->join('parents','students.parent_id = parents.id')
            ->get('users')->result();
    }    
    static function get_parents()
    {
        return self:: $db->where('role_id',3)
            ->join('parents','parents.user_id = users.id')
            ->get('users')->result();
    }  
    static function get_subjects()
    {
        return self:: $db->join('grades','grades.id = subjects.grade_id')
            ->get('subjects')->result();
    }
       
    static function get_teachers()
    {
        return self:: $db->where('role_id',2)
            ->join('user_account','user_account.user_id = users.id')
            ->get('users')->result();
    }
    static function counter($table,$where = array()) {
		return self::$db->where($where)->get($table)->num_rows();
    }
    static function languages($lang = FALSE)
	{
		if (!$lang) {
			return self::$db->order_by('name','ASC')->get('languages')->result();
		}
		$l =  self::$db->where('name',$lang)->get('languages')->result();
		if (count($l > 0)) { return $l[0]; }
		$l =  self::$db->where('name',  config_item('default_language'))->get('languages')->result();
		if (count($l > 0)) { return $l[0]; } else { return FALSE; }
	}
		//get Role List
		static function role_list()
		{
			$result = self::$db->select("*")
				->get('roles')
				->result();
	
			$role[''] = 'Role';
			if (!empty($result)) {
				foreach ($result as $value) {
					$role[$value->id] = $value->role; 
				}
				return $role;
			} else {
				return $role;
			} 
		}
	//get Grade list
    static function grade_list()
	{
		$result = self::$db->select("*")
			->get('grades')
			->result();

		$grade[''] = 'Grade';
		if (!empty($result)) {
			foreach ($result as $value) {
                $grade[$value->id] = $value->grade_name; 
			}
			return $grade;
		} else {
			return $grade;
		} 
	}
static function activity_type()
	{
		$result = self::$db->select("*")
			->get('activity_type')
			->result();

		$activity[''] = 'Activity Type';
		if (!empty($result)) {
			foreach ($result as $value) {
                $activity[$value->id] = $value->name; 
			}
			return $activity;
		} else {
			return $activity;
		} 
	}
	//get Priority list
	static function priority_list()
		{
			$result = self::$db->select("*")
				->get('priorities')
				->result();
	
			$priority[''] = 'Priority';
			if (!empty($result)) {
				foreach ($result as $value) {
					$priority[$value->priority] = $value->priority; 
				}
				return $priority;
			} else {
				return $priority;
			} 
		}
	//get Subject list
    static function subject_list()
	{
		$result = self::$db->select("*")
			->get('subjects')
			->result();

		$grade[''] = 'Subject';
		if (!empty($result)) {
			foreach ($result as $value) {
                $grade[$value->id] = $value->name; 
			}
			return $grade;
		} else {
			return $grade;
		} 
	}
	//get Assessment list
    static function assessment_type_list()
	{
		$result = self::$db->select("*")
			->get('assessment_types')
			->result();

		$grade[''] = 'Assessment Type';
		if (!empty($result)) {
			foreach ($result as $value) {
                $grade[$value->id] = $value->name; 
			}
			return $grade;
		} else {
			return $grade;
		} 
	}
	
	static function teacher_list()
	{
				$result = self:: $db->where('role_id',2)
            ->join('user_account','user_account.user_id = users.id')
            ->get('users')->result();
		$parent[''] = 'Teacher';
		if (!empty($result)) {
			foreach ($result as $value) {
                $parent[$value->user_id] = $value->firstname . ' '. $value->surname; 
			}
			return $parent;
		} else {
			return $parent;
		}
	}
	
	static function parent_list()
	{
				$result = self:: $db->where('role_id',3)
            ->join('parents','parents.user_id = users.id')
            ->get('users')->result();
		$parent[''] = 'Parent';
		if (!empty($result)) {
			foreach ($result as $value) {
                $parent[$value->user_id] = $value->firstname . ' '. $value->lastname; 
			}
			return $parent;
		} else {
			return $parent;
		}
	}

    // Get activities
	static function get_activity($limit = NULL) {
		return self::$db->order_by('activity_date','desc')->get('activities',$limit)->result();
	}
	static function get_details($table) {
		return self::$db->get($table)->result();
	}

	// Access denied redirection
	static function access_denied($module) {
		$ci =& get_instance();
		$ci->session->set_flashdata('response_status', 'error');
		$ci->session -> set_flashdata('message', lang('access_denied'));
		redirect($_SERVER['HTTP_REFERER']);
	}
    
    // Get number of days
	static function num_days($frequency){
	switch ($frequency)
	{
			case '7D':
				return 7;
			break;
			case '1M':
				return 31;
			break;
			case '3M':
				return 90;
			break;
			case '6M':
				return 182;
			break;
			case '1Y':
				return 365;
			break;
		}
	}
    
    // Get class by ID
    static function get_class_by_id($id){
		return self::$db->where('gradeid',$id)->get('grade')->row()->name;
	}
    static function list_teachers(){
		return self::$db->where('role_id',2)->join('user_account','user_account.user_id = users.id')->
		get('users')->result();
	}
    
    static function get_by_where($table, $array = NULL, $order_by = array()){
		if(count($order_by) > 0) { self::$db->order_by($order_by['column'],$order_by['order']) ; }
    	return self::$db->where($array)->get($table)->result();
	}
    	// Check if module disabled
	static function module_access($module){
	$result = self::$db->where(array('module' => $module,
								  'hook' => 'main_menu_'.User::get_role(User::get_id())))
						-> get('hooks')->row();
	if($result == NULL || $result->visible == '0'){ redirect(); }else { return; } 

	}
	
	public function save($table, $data = [])
	{
	     $this->db->insert($table, $data);
	}
    public function save_user($table, $data = [],$user_id = [])
	{
	   $this->db->where('user_id', $user_id);
		$this->db->update($table, $data);
	}
    // Save any data
	static function save_data($table, $data ){
		self::$db->insert($table,$data);
		return self::$db->insert_id();
	}
    
    static function delete($table,$where = array()) {

		return self::$db->delete($table,$where);
	}
    
     	// Get locale
 	static function get_locale(){
 		return self::$db->where('locale',config_item('locale'))->get('locales')->row();
 	}
	// Get locale
	static function get_data($id,$table){
			return self::$db->where('id',$id)->get($table)->row();
	}
 	// Get locales
 	static function locales()
	{
		return self::$db->order_by('name')->get('locales')->result();
	}
}
