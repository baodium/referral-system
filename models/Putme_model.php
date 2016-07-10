<?php
class Putme_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
public function get_postutme($year = FALSE)
{
        if ($year === FALSE)
        {
                $query = $this->db->get('putme_tbl');
                return $query->result_array();
        }

        $query = $this->db->get_where('putme_tbl', array('year' => $year));
        return $query->result_array();
}

public function get_postutme_detail($sn = FALSE)
{
        if ($sn === FALSE)
        {
                $query = $this->db->get('putme_tbl');
                return $query->result_array();
        }

        $query = $this->db->get_where('putme_tbl', array('S_N' => $sn));
        return $query->result_array();
}

public function get_postutme_detail_by_hash($sn = FALSE)
{
        if ($sn === FALSE)
        {
                $query = $this->db->get('putme_tbl');
                return $query->result_array();
        }

        $query = $this->db->get_where('putme_tbl', array('hash' => $sn));
        return $query->result_array();
}

public function get_postutme_years()
{
        $query = $this->db->query('SELECT * FROM putme_tbl GROUP BY year DESC');
        return $query->result_array();
}

}