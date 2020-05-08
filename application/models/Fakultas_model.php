<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{
    public function getfakjur()
    {
        $query = "SELECT `prodi`.`jurusan` ,`fakultas`.*
        FROM `fakultas` JOIN `prodi`
        ON `fakultas`.`id_fakultas` = `prodi`.`id_fakultas`
        ORDER BY `fakultas` ASC
        ";

        return $this->db->query($query)->result_array();
    }
}
