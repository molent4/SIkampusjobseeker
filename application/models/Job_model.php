<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_model extends CI_Model
{
    public function getdetail_pekerjaan()
    {
        $query = "SELECT `bidang`.`nama_bidang` ,`detail_lowongan`.*,`jenispekerjaan`.`jenis_pekerjaan`
        FROM `bidang` JOIN `detail_lowongan`
        ON `bidang`.`id_bidang` = `detail_lowongan`.`bidang`
        join `jenispekerjaan`
        on `detail_lowongan`.`jenis` = `jenispekerjaan`.`id_jenis`
        ";

        return $this->db->query($query)->result_array();
    }
}
