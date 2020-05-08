<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Applycheck_model extends CI_Model
{
    public function check_apply($nim, $id_lowongan)
    {
        $query = "SELECT * from `lamar` 
        where `lamar`.`nim` = '$nim'
        and `lamar`.`id_lowongan` = '$id_lowongan'";

        return $this->db->query($query)->row_array();
    }
}