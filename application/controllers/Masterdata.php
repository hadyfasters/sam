<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterdata extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		$this->load->library('session');
        $this->load->model('M_menu');       
        // $this->load->model('M_login');       
    }
    
    public function index(){
        redirect('userhistory');
    }

	public function userhistory()
	{
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $data['content'] = 'masterdata/userhistory';

        $data['javascriptLoad'] = array(
            1 => 'assets/vendors/moment/min/moment.min.js',
            2 => 'assets/vendors/bootstrap-daterangepicker/daterangepicker.js',
            3 => 'assets/vendors/datatables.net/js/jquery.dataTables.min.js',
            4 => 'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
            5 => 'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
            6 => 'assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
            7 => 'assets/vendors/datatables.net-buttons/js/buttons.flash.min.js',
            8 => 'assets/vendors/datatables.net-buttons/js/buttons.html5.min.js',
            9 => 'assets/vendors/datatables.net-buttons/js/buttons.print.min.js',
            10 => 'assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
            11 => 'assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
            12 => 'assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
            13 => 'assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
            14 => 'assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
            15 => 'assets/build/js/masterdata.js'
        );

        $this->load->view('template', $data);
    }

    public function activitylog()
	{
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $data['content'] = 'masterdata/activitylog';

        $data['javascriptLoad'] = array(
            1 => 'assets/vendors/moment/min/moment.min.js',
            2 => 'assets/vendors/bootstrap-daterangepicker/daterangepicker.js',
            3 => 'assets/vendors/datatables.net/js/jquery.dataTables.min.js',
            4 => 'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
            5 => 'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
            6 => 'assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
            7 => 'assets/vendors/datatables.net-buttons/js/buttons.flash.min.js',
            8 => 'assets/vendors/datatables.net-buttons/js/buttons.html5.min.js',
            9 => 'assets/vendors/datatables.net-buttons/js/buttons.print.min.js',
            10 => 'assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
            11 => 'assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
            12 => 'assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
            13 => 'assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
            14 => 'assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
            15 => 'assets/build/js/masterdata.js'
        );

        $this->load->view('template', $data);
    }

    public function tableLeadRender(){
        echo "gai";

        die(json_encode("hai"));
    }

    public function add(){
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $this->load->view('usermanagement/input-user', $data);
    }
}