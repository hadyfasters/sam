<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userposition extends SAM_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');     

        if(!$this->isLogin){
            redirect('login/out');
        }  
	}

	public function index()
	{
        $dt_user = [
            'is_sa' => $this->data['userdata']['is_sa']
        ];
        $userposition = $this->client_url->postCURL(USERPOSITION_LIST,$this->secure($dt_user),$this->data['userdata']['token']); 
        $userposition = json_decode($userposition);
        if($userposition!=null && !isset($userposition->status)){
            // Decrypt the response
            $userposition = json_decode($this->recure($userposition));
        }

        if(isset($userposition->status) && $userposition->status)
        {
            $this->data['userposition_list'] = $userposition->data;
        }

        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'userposition/list-user-position';

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
            12 => 'assets/build/js/userposition.js'
        );

        $this->load->view('template', $this->data);
    }

   
    public function add()
    {
        if(!$this->data['userdata']['is_sa'] && !$this->data['userdata']['acl_input']) {
            $this->session->set_flashdata('error_message', 'Access denied! You have no rights to access this page.');
            redirect('userposition');
        }

        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'userposition/input-user-position';

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/userposition.js',
            2 => 'assets/build/js/jquery.validate.min.js'
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
        $this->data['content'] = 'userposition/edit-user-position';

        $this->data['id'] = $id;
        $userposition = $this->client_url->postCURL(USERPOSITION_GET,$this->secure(array('id'=>$id)),$this->data['userdata']['token']); 
        $userposition = json_decode($userposition);

        if($userposition!=null && !isset($userposition->status)){
            // Decrypt the response
            $userposition = json_decode($this->recure($userposition));
        }
        $this->data['data'] = $userposition->data;

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/userposition.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    public function add_process()
    {
        extract($this->input->post());

        $dt_userposition = [
            'position_name' => $userposition_title,
            'default_password' => $default_password,
            'is_active' => 0
        ];
        $userposition = $this->client_url->postCURL(USERPOSITION_CREATE,$this->secure($dt_userposition),$this->data['userdata']['token']); 
        $userposition = json_decode($userposition);

        if($userposition!=null && !isset($userposition->status)){
            // Decrypt the response
            $userposition = json_decode($this->recure($userposition));
        }

        if(isset($userposition->status) && !$userposition->status)
        {
            $this->session->set_flashdata('error_message', $userposition->message);
            redirect('userposition/add');
        }
        redirect('userposition');
    }

    public function edit_process()
    {
        extract($this->input->post());

        $dt_userposition = [
            'id' => $id,
            'position_name' => $userposition_title,
            'default_password' => $default_password,
            'is_active' => $status,
        ];
        $userposition = $this->client_url->postCURL(USERPOSITION_UPDATE,$this->secure($dt_userposition),$this->data['userdata']['token']); 
        $userposition = json_decode($userposition);

        if($userposition!=null && !isset($userposition->status)){
            // Decrypt the response
            $userposition = json_decode($this->recure($userposition));
        }

        if(isset($userposition->status) && !$userposition->status)
        {
            $this->session->set_flashdata('error_message', $userposition->message);
            redirect('userposition/edit/'.$id);
        }
        redirect('userposition');
    }

    public function remove($id)
    {
        $dt_userposition = [
            'id' => $id
        ];
        $userposition = $this->client_url->postCURL(USERPOSITION_DELETE,$this->secure($dt_userposition),$this->data['userdata']['token']); 
        $userposition = json_decode($userposition);

        if($userposition!=null && !isset($userposition->status)){
            // Decrypt the response
            $userposition = json_decode($this->recure($userposition));
        }

        if(isset($userposition->status))
        {
            $this->session->set_flashdata('error_message', $userposition->message);
        }

        redirect('userposition');
    }
}