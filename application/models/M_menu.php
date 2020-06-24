<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {
    private $_table = 'menu_mapping';
    private $_pk = 'id_menu_mapping';

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }

    public function getMenuParentByRole($role)
    {
        $query = $this->db->query("SELECT
			mapp.*,
			r.role_name,
			m.id_menu, m.nama_menu
            FROM menu_mapping mapp 
            JOIN role r ON mapp.id_role = r.id_role
            JOIN menu m ON m.id_menu = mapp.id_child
            WHERE r.id_role = $role AND mapp.id_parent = 0 AND mapp.active = 1");

            // var_dump($query);
        
		if ($query->num_rows() > 0) 
		{
			return $query->result_array();
		}

        return FALSE;
    }

    public function getMenuChildByRole($role, $parent)
    {
        $query = $this->db->query("SELECT
        mapp.*,
        r.role_name,
        m.id_menu, m.nama_menu
        FROM menu_mapping mapp 
        JOIN role r ON mapp.id_role = r.id_role
        JOIN menu m ON m.id_menu = mapp.id_child
        WHERE r.id_role = $role AND mapp.id_parent = $parent AND mapp.active = 1");

        if ($query->num_rows() > 0) 
        {
            return $query->result_array();
        }

        return FALSE;
    }

}


?>