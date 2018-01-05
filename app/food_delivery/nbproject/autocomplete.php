<?php

/**

 * @property my_model $my_model
 
 * add more models here
 * @property m_account $m_account
 * @property m_birth $m_birth
 * @property m_blood_type $m_blood_type
 * @property m_dashboard $m_dashboard
 * @property m_department $m_department
 * @property m_doc_type $m_doc_type
 * @property m_gconduct $m_gconduct
 * @property m_idcard $m_idcard
 * @property m_marriage $m_marriage
 * @property m_nationality $m_nationality
 * @property m_permissions $m_permissions
 * @property m_preferences $m_preferences
 * @property m_region $m_region
 * @property m_role $m_role
 * @property m_settings $m_settings
 * @property m_signstamp_district $m_signstamp_district
 * @property m_signstamp_card $m_signstamp_card
 * @property m_signstamp_dept $m_signstamp_dept
 * @property m_site $m_site
 * @property m_users $m_users
 * @property m_helpsupport $m_helpsupport
 * @property m_list $m_list
 * @property m_rpt_birth $m_rpt_birth
 * @property m_rpt_idcard $m_rpt_idcard
 * @property m_signstamp_national $m_signstamp_national
 * @property m_occupation $m_occupation
 * @property m_tribunal $m_tribunal
 * @property m_death $m_death
 * @property m_gconduct_boletim $m_gconduct_boletim
  * @property m_rpt_gconduct $m_rpt_gconduct
 
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Language $language
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackbackv
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 * 
 * add more library smarty
 * @property CI_Tnotification $tnotification
 * @property CI_Tsession $tsession
 * @property CI_Tupload $tupload
 * @property datetimemanipulation $datetimemanipulation
 * @property CI_Smarty $smarty
 *
 * @property Index $index
 */
class CI_Controller {
    
}

/** YOU DONT NEED BELOW IF YOU DON’T EXTEND //YOUR OWN CUSTOM SUPERCLASS
 * @property custom_helper $custom_helper
 * @property my_model $my_model

 * add more models here
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Benchmark $benchmark
 * @property CI_Calendar $calendar
 * @property CI_Cart $cart
 * @property CI_Config $config
 * @property CI_Controller $controller
 * @property CI_Email $email
 * @property CI_Encrypt $encrypt
 * @property CI_Exceptions $exceptions
 * @property CI_Form_validation $form_validation
 * @property CI_Ftp $ftp
 * @property CI_Hooks $hooks
 * @property CI_Image_lib $image_lib
 * @property CI_Input $input
 * @property CI_Language $language
 * @property CI_Loader $load
 * @property CI_Log $log
 * @property CI_Model $model
 * @property CI_Output $output
 * @property CI_Pagination $pagination
 * @property CI_Parser $parser
 * @property CI_Profiler $profiler
 * @property CI_Router $router
 * @property CI_Session $session
 * @property CI_Sha1 $sha1
 * @property CI_Table $table
 * @property CI_Trackback $trackbackv
 * @property CI_Typography $typography
 * @property CI_Unit_test $unit_test
 * @property CI_Upload $upload
 * @property CI_URI $uri
 * @property CI_User_agent $user_agent
 * @property CI_Validation $validation
 * @property CI_Xmlrpc $xmlrpc
 * @property CI_Xmlrpcs $xmlrpcs
 * @property CI_Zip $zip
 *
 * @property Index $index
 */
class MY_CONTROLLER {
    
}

class CI_DB_Driver {

    /**
     * Execute the query
     *
     * Accepts an SQL string as input and returns a result object upon
     * successful execution of a “read�? type query. Returns boolean TRUE
     * upon successful execution of a “write�? type query. Returns boolean
     * FALSE upon failure, and if the $db_debug variable is set to TRUE
     * will raise an error.
     *
     * @access public
     * @param string An SQL query string
     * @param array An array of binding data
     * @return CI_DB_mysql_result
     */
    function query() {
        
    }

}

/**
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 * @property CI_Config $config
 * @property CI_Loader $load
 * @property CI_Session $session
 *
 * @property Index $index
 */
class CI_Model {
    
}

/**
 * @return CI_Controller
 */
function get_instance() {
    
}

?>