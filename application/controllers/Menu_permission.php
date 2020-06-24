<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_permission extends SAM_Controller {

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
        $userToken = $this->data['userdata']['token'];

        $dt_user = [
            'level' => $this->data['userdata']['level'],
            'status' => 1
        ];
        $userposition = $this->client_url->postCURL(USERPOSITION_LIST,$this->secure($dt_user),$userToken); 
        $userposition = json_decode($userposition);
        if($userposition!=null && !isset($userposition->status)){
            // Decrypt the response
            $userposition = json_decode($this->recure($userposition));
        }

        if(isset($userposition->status) && $userposition->status)
        {
            $this->data['userposition_list'] = $userposition->data;
        }


        $menu = $this->client_url->postCURL(MENU_LIST, '',$userToken);
        $menu_resp = json_decode($menu);
        if($menu_resp!=null && !isset($menu_resp->status)){
            // Decrypt the response
            $menu_resp = json_decode($this->recure($menu_resp));
        }

        if(isset($menu_resp->status) && $menu_resp->status)
        {
            $this->data['menu_list'] = $menu_resp->data;
        }

        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['auth_token'] = $this->getAuthToken();
        $this->data['content'] = 'menumanagement/menu-management';

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
            12 => 'assets/build/js/menu.js'
        );

        $this->load->view('template', $this->data);
    }

    public function process()
    {
        extract($this->input->post());

        $userToken = $this->data['userdata']['token'];

        $dt_permission = [
            'userposition' => $userposition,
            'menu' => $menu,
            'auth_token' => $auth_token
        ];

        $permission = $this->client_url->postCURL(PERMISSION_CREATE,$this->secure($dt_permission),$userToken); 
        $permission = json_decode($permission);
        if($permission!=null && !isset($permission->status)){
            // Decrypt the response
            $permission = json_decode($this->recure($permission));
        }

        if(isset($permission->status))
        {
            $this->session->set_flashdata('error_message', $permission->message);
        }

        redirect('menu_permission');
    }

    
}