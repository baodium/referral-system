<?php
class Prend_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
public function get_prend($year = FALSE)
{
        if ($year === FALSE)
        {
                $query = $this->db->get('all_form');
                return $query->result_array();
        }

        $query = $this->db->get_where('all_form', array('year' => $year));
        return $query->result_array();
}

public function get_applications($program=FALSE,$year=FALSE)
{
//var_dump($year); exit;
        if ($year === FALSE || $year=="")
        {
                $query = $this->db->get_where('all_form', array('program' => $program));
                return $query->result_array();
        }

        $query = $this->db->get_where('all_form', array('program' => $program,'year'=>$year));
        return $query->result_array();
}

public function get_prend_detail($sn = FALSE)
{
        if ($sn === FALSE)
        {
                $query = $this->db->get('all_form');
                return $query->result_array();
        }

        $query = $this->db->get_where('all_form', array('id' => $sn));
        return $query->result_array();
}

public function get_prend_detail_by_hash($sn = FALSE)
{
        if ($sn === FALSE)
        {
                $query = $this->db->get('all_form');
                return $query->result_array();
        }

        $query = $this->db->get_where('all_form', array('hash' => $sn));
        return $query->result_array();
}

public function get_prend_years()
{
        $query = $this->db->query('SELECT * FROM all_form GROUP BY year DESC');
        return $query->result_array();
}

public function get_applications_years($program)
{
        $query = $this->db->query("SELECT * FROM all_form WHERE program='{$program}' GROUP BY year DESC ");
        return $query->result_array();
}

}