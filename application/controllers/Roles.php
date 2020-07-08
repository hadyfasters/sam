<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends SAM_Controller {

    public function __construct()
	{
		parent::__construct();     

        if(!$this->isLogin){
            redirect('login/out');
        }  
	}

	public function index()
	{
        $dt_user = [
            'is_sa' => $this->data['userdata']['is_sa']
        ];
        $userroles = $this->client_url->postCURL(ROLES_LIST,$this->secure($dt_user),$this->data['userdata']['token']); 
        $userroles = json_decode($userroles);
        if($userroles!=null && !isset($userroles->status)){
            // Decrypt the response
            $userroles = json_decode($this->recure($userroles));
        }

        if(isset($userroles->status) && $userroles->status)
        {
            $this->data['role_list'] = $userroles->data;
        }

        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'rolesmanagement/list-roles';

        $this->data['javascriptLoad'] = array(
            0 => 'assets/vendors/datatables.net/js/jquery.dataTables.min.js',
            1 => 'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
            2 => 'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
            3 => 'assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
            4 => 'assets/vendors/datatables.net-buttons/js/buttons.flash.min.js',
            5 => 'assets/vendors/datatables.net-buttons/js/buttons.html5.min.js',
            6 => 'assets/vendors/datatables.net-buttons/js/buttons.print.min.js',
            7 => 'assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
            8 => 'assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
            9 => 'assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
            10 => 'assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
            11 => 'assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
            12 => 'assets/build/js/roles.js'
        );

        $this->load->view('template', $this->data);
    }

    public function edit($id)
    {
        if(!$this->data['userdata']['is_sa'] && !$this->data['userdata']['acl_edit']) {
            $this->session->set_flashdata('error_message', 'Access denied! You have no rights to access this page.');
            redirect('userposition');
        }
        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'rolesmanagement/edit-roles';

        $this->data['id'] = $id;
        $roles = $this->client_url->postCURL(ROLES_GET,$this->secure(array('id'=>$id)),$this->data['userdata']['token']); 
        $roles = json_decode($roles);

        if($roles!=null && !isset($roles->status)){
            // Decrypt the response
            $roles = json_decode($this->recure($roles));
        }
        $this->data['data'] = $roles->data;

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/roles.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    public function edit_process()
    {
        extract($this->input->post());

        $is_sa = isset($sa_only) ? '1' : '0';
        $acl_input = isset($acl_input) ? '1' : '0';
        $acl_edit = isset($acl_edit) ? '1' : '0';
        $acl_delete = isset($acl_delete) ? '1' : '0';
        $acl_approve = isset($acl_approve) ? '1' : '0';

        $dt_roles = [
            'id' => $id,
            'role_name' => $role_name,
            'acl_input' => $acl_input,
            'acl_edit' => $acl_edit,
            'acl_delete' => $acl_delete,
            'acl_approve' => $acl_approve,
            'is_sa' => $is_sa,
            'is_active' => $status,
        ];

        // var_dump($dt_roles);exit;
        $roles = $this->client_url->postCURL(ROLES_UPDATE,$this->secure($dt_roles),$this->data['userdata']['token']); 
        $roles = json_decode($roles);

        if($roles!=null && !isset($roles->status)){
            // Decrypt the response
            $roles = json_decode($this->recure($roles));
        }

        if(isset($roles->status) && !$roles->status)
        {
            $this->session->set_flashdata('error_message', $roles->message);
            redirect('roles/edit/'.$id);
        }
        redirect('roles');
    }

    public function remove($id)
    {
        $dt_roles = [
            'id' => $id
        ];
        $roles = $this->client_url->postCURL(ROLES_DELETE,$this->secure($dt_roles),$this->data['userdata']['token']); 
        $roles = json_decode($roles);

        if($roles!=null && !isset($roles->status)){
            // Decrypt the response
            $roles = json_decode($this->recure($roles));
        }

        if(isset($roles->status))
        {
            $this->session->set_flashdata('error_message', $roles->message);
        }

        redirect('roles');
    }
}