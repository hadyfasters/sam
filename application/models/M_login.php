<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    private $_table = 'user';
    private $_pk = 'id_user';

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

    public function getDataUser($npp)
    {
        $data = array(
            'npp' => $npp,
            'active' => 1
        );

        $this->db->where($data);
        $this->db->join('user_position','up_id=position','inner');
		$query = $this->db->get($this->_table);

        if ($query->num_rows() > 0) 
		{
			return $query->row();
		}

		return FALSE;
    }

}


?>