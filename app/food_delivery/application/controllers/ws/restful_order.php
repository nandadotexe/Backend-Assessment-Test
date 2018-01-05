<?php

require BASEPATH . 'libraries/REST_Controller.php';

class restful_order extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("m_order");
    }

    // FUNCTION : check valid key
    function _check_valid_key($cd, $key) {
        $retval = FALSE;
        if (!empty($cd) && !empty($key)) {
            if ($this->m_order->is_valid_key($cd, $key)) {
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
            if ($this->m_order->is_valid_key($cd, $key)) {
                $f_valid = 'yes';
            }
        }

        $data = array('isvalid' => $f_valid);
        echo '{"' . $name . '" :[', json_encode($data), ']}';
    }

    // GET : detail operator biodata
    function DetailOrder_get($cd, $key, $date, $id) {
        $name = "detail_order";
        if (empty($cd) || empty($key) || empty($date) || empty($id)) {
            $data['status'] = "DATA_NONE";
        } else {
            if ($this->_check_valid_key($cd, $key)) {

                $result = $this->m_order->get_order_bycust(array($date, $id));

                if (!empty($result)) {
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

    // GET : retrieve key from company
    function RetrieveKey_get($cd) {
        $name = "rkey";

        if (!empty($cd)) {
            $result = $this->m_order->get_key_from_cd($cd);
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

    // GET : Update Address
    function UpdateAddress_get($cd, $key, $user_id, $address) {
        $name = "update_address";
        $retval = "failed";

        if (!empty($cd) && !empty($key) && !empty($user_id) && !empty($address)) {
            if ($this->_check_valid_key($cd, $key)) {
                $result = $this->m_order->set_address($user_id, $address);
                if ($result) {
                    $retval = "success";
                }
            }
        }

        $data = array('update_st' => $retval);
        echo '{"' . $name . '" :[', json_encode($data), ']}';
    }

}
