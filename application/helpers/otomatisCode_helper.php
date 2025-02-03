<?php

if (!function_exists('generateCode')) {
    function generateCode($table, $prefix, $total_0 = 2)
    {
        $CI = &get_instance();
        // menghitng total data dari table
        $total_data = $CI->db->count_all($table);


        // generate kode otomatis
        $angka_otomatis = str_pad(($total_data + 1), ($total_0 + 1), "0", STR_PAD_LEFT);

        if ($total_data == 0) {
            return $prefix . "" . $angka_otomatis;
        }

        $pk = $CI->db->field_data($table)[0]->name; // Get nama_field Primary key

        $kode_otomatis = $prefix . "" . ($angka_otomatis + 1);

        if ($total_data > 0) {
            for ($i = $total_data; $i <= ($total_data * 100); $i++) {
                $ada = $CI->db->get_where($table, [$pk => $prefix . "" . str_pad($i, ($total_0 + 1), "0", STR_PAD_LEFT)])->num_rows();
                if ($ada) {
                    continue;
                } else {
                    $kode_otomatis = $prefix . "" . str_pad($i, ($total_0 + 1), "0", STR_PAD_LEFT);
                    break;
                }
            }
        }

        return $kode_otomatis;
    }
}

if (!function_exists('generateCodeSession')) {
    function generateCodeSession($username, $where, $table)
    {
        $CI = &get_instance();
        // menghitung total data dari table
        $CI->db->where($username, $where);
        $CI->db->from($table);
        $total_data = $CI->db->count_all_results();

        return $total_data;
    }
}
