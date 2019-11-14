<?php

class User extends CI_Model 
{
      private static $db;

    function __construct(){
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    // Get logged in user ID
    static function get_id()
    {
        $ci = &get_instance();
        return $ci->tank_auth->get_user_id();
    }

    // Get logged in user ID
    static function logged_in()
    {
        $ci = &get_instance();
        $logged_in = ($ci->tank_auth->is_logged_in()) ? TRUE : FALSE;
        if(!$logged_in) redirect('auth/login');
        return ;
    }

    // Get user information
    static function view_user($id)
    {
        return self::$db->where('id',$id)->get('users')->row();
    }

    /**
     * Check user if admin
     */
    static function is_admin() {
        $ci = &get_instance();
        return ($ci->tank_auth->user_role($ci->tank_auth->get_role_id()) == 'admin') ? TRUE : FALSE;
    }

    /**
     * Check user if client
     */
    static function is_teacher() {
        $ci = &get_instance();
        return ($ci->tank_auth->user_role($ci->tank_auth->get_role_id()) == 'teacher') ? TRUE : FALSE;
    }

    /**
     * Check user if staff
     */
    static function is_parent() {
        $ci = &get_instance();
        return ($ci->tank_auth->user_role($ci->tank_auth->get_role_id()) == 'parent') ? TRUE : FALSE;
    }
    /**
     * Check user if staff
     */
    static function is_student() {
        $ci = &get_instance();
        return ($ci->tank_auth->user_role($ci->tank_auth->get_role_id()) == 'student') ? TRUE : FALSE;
    }

    /**
     * Get user login information
     *
     * @return User data array
     */

    static function login_info($id) {
        return self::$db->where('id',$id)->get('users')->row();
    }

    /**
     * Get admins and staff
     */
    
    static function admin() {
        return self::$db->where('role_id','1') -> get('users')->result();
    }

    static function teacher() {
        return self::$db->where('role_id','2') -> get('users')->result();
    }
    // Get all users
    static function parents(){
       return self::$db->where('role_id','3') -> get('users')->result();
    }
    // Get all users
    static function students(){
        return self::$db->where('role_id','4') -> get('users')->result();
    }

    /**
     * Display username or full name if exists
     */
    static function displayName($user = '') {
        if(!self::check_user_exist($user)) return '[MISSING USER]';

        return (self::profile_info($user)->firstname == NULL)
            ? self::login_info($user)->username
            : self::profile_info($user)->firstname;
    }

    // Get access permissions
    static function perm_allowed($user,$perm) {
        $permission = self::$db->where(array('status'=>'active'))->get('permissions')->result();
        $json = self::profile_info($user)->allowed_modules;
        $allowed_modules = ($json == NULL) ? '{"settings":"permissions"}' : $json;
        $allowed_modules = json_decode($allowed_modules,true);
        if(!array_key_exists($perm, $allowed_modules)) return FALSE;

        foreach ($permission as $key => $p) {
            if ( array_key_exists($p->name, $allowed_modules) && $allowed_modules[$perm] == 'on') {
                return TRUE;
            }else{
                return FALSE;
            }
        }
        return FALSE;
    }


    /**
     * Get user role name e.g admin,staff etc
     */

    static function login_role_name() {
        $ci = &get_instance();
        return $ci->tank_auth->user_role($ci->tank_auth->get_role_id());
    }

    /**
     * Get user role name usind ID e.g admin,staff etc
     */

    static function get_role($user) {
        $ci = &get_instance();
        $id = self::login_info($user)->role_id;
        return $ci->tank_auth->user_role($id);
    }

    // Get all admin list
    static function admin_list(){
        return self::$db->where(array('role_id' => 1,'activated' => 1))->get('users')->result();
    }

    // Get all user list
    static function teacher_list(){
        return self::$db->where(array('role_id' => 2,'activated' => 1))->get('users')->result();
    }

    // Get staff list
    static function parent_list(){
        return self::$db->where(array('role_id' => 3,'activated' => 1))->get('users')->result();
    }
    
    // Get staff list
    static function student_list(){
        return self::$db->where(array('role_id' => 4,'activated' => 1))->get('users')->result();
    }

    // Get roles
    static function get_roles(){
        return self::$db->get('roles')->result();
    }

    /**
     * Get user profile information
     */

    static function profile_info($id) {
        if(User::is_student())
        {
            $table = 'students';
        }elseif(User::is_parent())
        {
            $table = 'parents';
        } else
        {
            $table = 'user_account';
        }
        
        return self::$db->where('user_id',$id) -> get($table)->row();
    }


    static function user_log($user)
    {
        return self::$db->where('user',$user)->order_by('activity_date','DESC')->get('activities')->result();
    }

    // Get user avatar URL
    static function avatar_url($user = NULL) {
        if(!self::check_user_exist($user)) return base_url().'assets/avatar/default_avatar.jpg';

        if (config_item('use_gravatar') == 'TRUE' && self::profile_info($user)->use_gravatar == 'Y') {
            $user_email = self::login_info($user)->email;
            return Applib::get_gravatar($user_email);
        } else {
            return base_url().'assets/avatar/default_avatar.jpg';
        }
    }

    static function check_user_exist($user){
        return self::$db->where('id',$user)->get('users')->num_rows();
    }
}