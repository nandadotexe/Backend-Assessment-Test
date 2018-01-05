<?php

class m_order extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // get key from code
    function get_key_from_cd($string) {
        $sql = "SELECT * FROM api WHERE cd = ?";
        $query = $this->db->query($sql, $string);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    
    // get order by cust
    function get_order_bycust($params) {
        $sql = "SELECT * FROM order WHERE date_order = ? AND customer_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }
    

    // is valid key
    function is_valid_key($cd, $key) {
        $sql = "SELECT * FROM api WHERE cd = '$cd' AND key = '$key'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();

            $date_start = $result['date_created'];
            $date_end = $result['date_expired'];

            if (!empty($date_start) && !empty($date_end)) {
                $x_tgl_awal = $date_start;
                $x_tgl_akhir = $date_end;

                $today = date("m/d/Y");
                $datefrom = substr($x_tgl_awal, 5, 2) . "/" . substr($x_tgl_awal, 8, 2) . "/" . substr($x_tgl_awal, 0, 4);
                $dateto = substr($x_tgl_akhir, 5, 2) . "/" . substr($x_tgl_akhir, 8, 2) . "/" . substr($x_tgl_akhir, 0, 4);

                // Convert dates to strings
                $todaystring = strtotime($today);
                $datefromstring = strtotime($datefrom);
                $datetostring = strtotime($dateto);

                if ($todaystring >= $datefromstring && $todaystring <= $datetostring) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    
     // set login approval Y
    function set_address($id, $address) {
        $sql = $this->db->update("customer", array("address" => $address), array("id_customer" => $id));
        return $sql;
    }

}
