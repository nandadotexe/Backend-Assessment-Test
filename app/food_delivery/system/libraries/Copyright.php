<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Copyright {

    private $CI;
    private $dev_company = "CV Amanah Mulia Informatika | Lirantech, LDA";
    private $dev_web = "www.amisoft.web.id";
    private $dev_person1 = "Miftakhurrokhmat, S.Kom";
    private $dev_person2 = "Muhammad Ali Mustakim, S.Kom";
    private $dev_person3 = "Andhi Ristanta, S.Kom, S.Kom";
    private $dev_person4 = "Rachmat Ady Saputra, S.Kom";
    private $project_name = "Demographic Management Information System";
    private $license_start = "2016-03-01";
    private $license_end = "2017-03-01";

    public function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->model('m_copyright');
    }

    public function __destruct() {
        
    }

    public function is_supportted() {
        $ret_val = false;
        $is_right_admin = $this->CI->m_copyright->is_right_admin();

        if ($is_right_admin == false) {
            $ret_val = false;
        } else {
            if (isset($this->license_start) && isset($this->license_end)) {
                $x_tgl_awal = $this->license_start;
                $x_tgl_akhir = $this->license_end;

                $today = date("m/d/Y");
                // tahun / Y    : substr($x_tgl_awal, 0, 4)
                // bulan / m    : substr($x_tgl_awal, 5, 2)
                // tanggal / d  : substr($x_tgl_awal, 8, 2)
                $datefrom = substr($x_tgl_awal, 5, 2) . "/" . substr($x_tgl_awal, 8, 2) . "/" . substr($x_tgl_awal, 0, 4);
                $dateto = substr($x_tgl_akhir, 5, 2) . "/" . substr($x_tgl_akhir, 8, 2) . "/" . substr($x_tgl_akhir, 0, 4);

                // Convert dates to strings
                $todaystring = strtotime($today);
                $datefromstring = strtotime($datefrom);
                $datetostring = strtotime($dateto);

                if ($todaystring >= $datefromstring && $todaystring <= $datetostring) {
                    $ret_val = true;
                } else {
                    $ret_val = false;
                }
            }
        }
        return $ret_val;
    }

}
