<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lead extends CI_Model {
    private $_table = 'lead';
    private $_pk = 'id_lead';

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

    public function getDataLead()
    {
        $data = array(
            'npp' => $npp,
            'active' => 1
        );

        $this->db->where($data);
		$query = $this->db->get($this->_table);

        if ($query->num_rows() > 0) 
		{
			return $query->row();
		}

		return FALSE;
    }

}


?>