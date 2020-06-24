<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_approve extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		$this->load->library('session');
        $this->load->model('M_menu');       
        // $this->load->model('M_login');       
	}

	public function index()
	{
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $data['content'] = 'call/list-call-approval';

        $data['javascriptLoad'] = array(
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
            12 => 'assets/vendors/iCheck/icheck.min.js',
            13 => 'assets/build/js/call.js'
        );

        $this->load->view('template', $data);
    }

    public function detail()
    {
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $data['content'] = 'call/view-call-approval';

        $this->load->view('template', $data);
    }
}