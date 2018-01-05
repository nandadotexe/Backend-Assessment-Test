<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Format_name {

    public function __construct() {
        // default constructor
    }

    /**
     * Digunakan untuk memotong karakter agar sesuai dengan ejaan nama standar
     * Fixed position name on first, second and last word of name
     * Example:
     * 1. AAA (Lengkap)
     * 2. AAA BBB (Lengkap)
     * 3. AAA BBB CCC (Lengkap)
     * 4. AAA BBB CCC DDD (Disingkat AAA BBB C. DDD)
     * 5. AAA BBB CCC DDD EEE (Disingkat AAA BBB C. D. EEE)
     * 6. AAA BBB CCC DDD EEE FFF (Disingkat AAA BBB C. D. E. FFF)
     * 
     * @param string $name Karakter / Nama
     */
    public function short_name_format($nama = "") {
        $fixed_word_pos = array(0, 1);
        $rules_not_abb = "DOS|DA|DE";
        // init
        $arr_names = explode(" ", trim($nama));
        $word_count = count($arr_names);
        // if word count > 3
        if ($word_count > 3) {
            $fixed_word_pos[] = ($word_count - 1);
            $result = array();
            foreach ($arr_names as $pos => $tmp_name) {
                //--
                if (!in_array($pos, $fixed_word_pos) && strlen($tmp_name) > 2) {
                    if (strlen($tmp_name) > 4 && !preg_match("/$rules_not_abb/", $tmp_name)) {
                        $tmp_name = mb_substr($tmp_name, 0, 1) . ".";
                    }
                }
                //--
                $result[] = $tmp_name;
            }
            // concat array
            $nama = implode(" ", $result);
        }
        // return
        return $nama;
    }

}
