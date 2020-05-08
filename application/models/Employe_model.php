<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employe_model extends CI_Model
{
    public function getdetail_pelamar()
    {
        $query = "SELECT `mahasiswa`.*,`lamar`.*,`detail_lowongan`.*
        FROM `mahasiswa` JOIN `lamar`
        ON `mahasiswa`.`nim` = `lamar`.`nim`
        Join `lowongan`
        On `lowongan`.`id_lowongan` = `lamar`.`id_lowongan`
        Join `detail_lowongan`
        ON `detail_lowongan`.`id_lowongan` = `lowongan`.`id_lowongan`
        ";

        return $this->db->query($query)->result_array();
    }
}
