<?php

require BASEPATH . 'libraries/REST_Controller.php';

class restful_verify extends REST_Controller {



    public function __construct() {
        parent::__construct();
        $this->load->model("m_verify");
    }

    // FUNCTION : check valid key
    function _check_valid_key($cd, $key) {
        $retval = FALSE;
        if (!empty($cd) && !empty($key)) {
            if ($this->m_verify->is_valid_key($cd, $key)) {
                $retval = TRUE;
            }
        }
        return $retval;
    }

    // GET : status valid key
    function CheckValidKey_get($cd, $key) {
        $name = "key";
        $f_valid = 'no';
        if (!empty($cd) && !empty($key)) {
            if ($this->m_verify->is_valid_key($cd, $key)) {
                $f_valid = 'yes';
            }
        }

        $data = array('isvalid' => $f_valid);
        echo '{"' . $name . '" :[', json_encode($data), ']}';
    }

    // GET : detail operator biodata
    function DetailOpBiodata_get($cd, $key, $type, $no) {
        $name = "op_biodata";
        if (empty($cd) || empty($key) || empty($type) || empty($no)) {
            $data['status'] = "DATA_NONE";
        } else {
            if ($this->_check_valid_key($cd, $key)) {
                if ($type == "BIRTH") {
                    $result = $this->m_verify->get_bio_capture_by_birthno($no);
                } else if ($type == "IDCARD") {
                    $result = $this->m_verify->get_bio_capture_by_idcardno($no);
                }

                if (!empty($result)) {
                    // modify content
                    $result['V_DATE_START'] = $this->m_verify->_convt_date_curyear($result['DATE_START']);
                    $result['V_DATE_EXPIRED'] = $this->m_verify->_convt_date_curyear($result['DATE_EXPIRED']);
                    $result['V_CITIZEN_FULLNAME'] = trim($this->m_verify->_join_string(array($result['CITIZEN_FIRSTNAME'], $result['CITIZEN_LASTNAME'])));
                    $result['V_CITIZEN_BIRTH_DATE'] = $this->m_verify->_convt_date_oracle($result['CITIZEN_BIRTH_DATE']);
                    $result['V_CITIZEN_GENDER'] = $this->m_verify->get_fulldesc_bycode('GENDER', $result['CITIZEN_GENDER'], 'PORTU');
                    //
                    $gender = $this->m_verify->get_fulldesc_bycode('GENDER', $result['CITIZEN_GENDER'], 'ENGLISH');
                    $result['V_CODE_MARRIAGE'] = $this->m_verify->get_fulldesc_bycode('MARRIED', $result['CODE_MARRIAGE'], 'PORTU', $gender);
                    //
                    $result['V_CODE_BLOOD'] = $this->m_verify->get_fulldesc_bycode('BLOOD', $result['CODE_BLOOD']);
                    $result['V_DISTRICT_CURRENT'] = $this->m_verify->get_regionname_bycode($result['DISTRICT_CURRENT']);
                    //
                    $result['V_PATH_PHOTO'] = $this->PATH_PHOTO;
                    //
                    $data['status'] = "DATA_ALREADY";
                    $data['record'] = $result;
                } else {
                    $data['status'] = "DATA_NONE";
                }
            } else {
                $data['status'] = "DATA_NONE";
            }
        }

        echo '{"' . $name . '" :[', json_encode($data), ']}';
    }

    // GET : retrieve user id from user name
    function RetrieveUserID_get($user_name) {
        $name = "ruserid";

        if (!empty($user_name)) {
            $result = $this->m_verify->get_userid_from_username($user_name);
            if (!empty($result)) {
                $data['status'] = "DATA_ALREADY";
                $data['record'] = $result;
            }
        } else {
            $data['status'] = "DATA_NONE";
        }

        echo '{"' . $name . '" :[', json_encode($data), ']}';
    }

    // GET : retrieve key from company
    function RetrieveKey_get($cd) {
        $name = "rkey";

        if (!empty($cd)) {
            $result = $this->m_verify->get_key_from_cdcompany($cd);
            if (!empty($result)) {
                $data['status'] = "DATA_ALREADY";
                $data['record'] = $result;
            } else {
                $data['status'] = "DATA_NONE";
            }
        } else {
            $data['status'] = "DATA_NONE";
        }

        echo '{"' . $name . '" :[', json_encode($data), ']}';
    }

    // GET : retrieve idcard_no from user_id
    function RetrieveIDCardNo_get($cd, $key, $user_id) {
        $name = "idcardno";

        if (!empty($cd) && !empty($key) && !empty($user_id)) {
            if ($this->_check_valid_key($cd, $key)) {
                $result = $this->m_verify->get_idcardno_by_userid($user_id);
                if (!empty($result)) {
                    if ($this->PLATFORM == "JAVA") {
                        $data['*status#'] = "DATA_ALREADY";
                        $data['*record#'] = $result;
                    } else {
                        $data['status'] = "DATA_ALREADY";
                        $data['record'] = $result;
                    }
                } else {
                    $data['status'] = "DATA_NONE";
                }
            } else {
                $data['status'] = "DATA_NONE";
            }
        } else {
            $data['status'] = "DATA_NONE";
        }

        if ($this->PLATFORM == "JAVA") {
            $json = json_encode($data);
            $json = str_replace('"', '\\"', $json);
            $json = str_replace('\"*', '\"', $json);
            $json = str_replace('#\\', '\\', $json);
            echo '{\"' . $name . '\" :[', $json, ']}';
        } else {
            echo '{"' . $name . '" :[', json_encode($data), ']}';
        }
    }

    // GET : status login_st
    function CheckIsLogin_get($user_id) {
        $name = "loginst";
        $f_login = 'no';
        if (!empty($user_id)) {
            $rs_loginst = $this->m_verify->get_loginst_by_userid($user_id);
            if (!empty($rs_loginst)) {
                $f_login = 'yes';
            }
        }

        $data = array('is_login' => $f_login);
        echo '{"' . $name . '" :[', json_encode($data), ']}';
    }

    // GET : Update Approval
    function UpdateApproval_get($cd, $key, $user_id) {
        $name = "approval";
        $retval = "failed";

        if (!empty($cd) && !empty($key) && !empty($user_id)) {
            if ($this->_check_valid_key($cd, $key)) {
                $result = $this->m_verify->set_login_approval($user_id);
                if ($result) {
                    $retval = "success";
                }
            }
        }

        $data = array('update_st' => $retval);
        echo '{"' . $name . '" :[', json_encode($data), ']}';
    }

}
