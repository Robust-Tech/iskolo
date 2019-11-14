<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function module_color($param)
{
    switch ($param) {
        case 'test':
            return 'warning';
            break;
        case 'exams':
            return 'primary';
            break;
        case 'files':
            return 'info';
            break;
        case 'assignments':
            return 'success';
            break;
        case 'projects':
            return 'success';
            break;
        default:
            return 'default';
            break;
    }
}

function replace_email_tags($tag,$value,$string){
    return str_replace('{'.$tag.'}', $value, $string);
}

function create_email_logo(){
      return '<img style="width:'.config_item('logo_width').'px" src="'.base_url().'/assets/images/logos/'.config_item('logo').'"/>';
}

function get_tags($template){
    switch ($template) {
        case 'activate_account':
            return array('LOGO','USERNAME','ACTIVATE_URL','ACTIVATION_PERIOD','EMAIL','PASSWORD','SITE_NAME','SIGNATURE');
            break;
        case 'change_email':
            return array('LOGO','NEW_EMAIL','NEW_EMAIL_KEY_URL','SITE_NAME','SIGNATURE');
            break;
        case 'forgot_password':
            return array('LOGO','PASS_KEY_URL','SITE_NAME','SIGNATURE');
            break;
        case 'registration':
            return array('LOGO','USERNAME','SITE_URL','EMAIL','PASSWORD','SITE_NAME','SIGNATURE');
            break;
        case 'reset_password':
            return array('LOGO','USERNAME','EMAIL','NEW_PASSWORD','SITE_NAME','SIGNATURE');
            break;
        case 'activity_assigned':
           return array('LOGO','ACTIVITY_DATE','ASSIGNED_BY','ACTIVITY_TITLE','SITE_URL','SITE_NAME','SIGNATURE');
            break;
        case 'assessment_created':
            return array('LOGO','ASSESSMENT_TITLE','CREATED_BY','ASSESSMENT_URL','SITE_NAME','SIGNATURE');
            break;
        case 'assessment_assigned':
            return array('LOGO','ASSESSMENT_TITLE','ASSIGNED_BY','ASSESSMENT_URL','SITE_NAME','SIGNATURE');
            break;

        case 'assessment_updated':
            return array('LOGO','ASSESSMENT_TITLE','ASSIGNED_BY','ASSESSMENT_URL','SITE_NAME','SIGNATURE');
            break;
        case 'assessment_results':
            return array('LOGO','ASSESSMENT_TITLE','ASSIGNED_BY','ASSESSMENT_URL','SITE_NAME','SIGNATURE');
            break;
        case 'message_received':
            return array('LOGO','RECIPIENT','SENDER','MESSAGE','SITE_URL','SITE_NAME','SIGNATURE');
            break;

        default:
            return array();
            break;
    }
}
function extract_tags($string, $start = '{', $end = '}') {
        $matches = array();
    $regex = "/$start([a-zA-Z0-9_]*)$end/";
    preg_match_all($regex, $string, $matches);
    return $matches[1];
    }
