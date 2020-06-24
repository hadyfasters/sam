<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meet extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		$this->load->library('session');
        $this->load->model('M_menu');       
        // $this->load->model('M_login');    

        if(!$this->isLogin){
            redirect('login/out');
        }      
	}

	public function index()
	{
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $data['content'] = 'meet/list-meet';

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
            12 => 'assets/build/js/meet.js'
        );

        $this->load->view('template', $data);
    }

    public function add(){
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $data['content'] = 'meet/input-meet';

        $data['javascriptLoad'] = array(
            1 => 'assets/build/js/meet.js',
            2 => 'assets/build/js/jquery.validate.min.js',
            3 => 'assets/vendors/moment/min/moment.min.js',
            4 => 'assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js',
            5 => 'assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
        );
        $this->load->view('template', $data);
    }

    public function detail()
    {
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $data['content'] = 'meet/view-meet';
        // $data['javascriptLoad'] = array(
        //     1 => 'assets/build/js/lead.js',
        //     2 => 'assets/build/js/jquery.validate.min.js'
        // );

        $this->load->view('template', $data);
    }

    public function edit()
    {
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $data['content'] = 'meet/edit-meet';
        $data['javascriptLoad'] = array(
            1 => 'assets/build/js/meet.js',
            2 => 'assets/build/js/jquery.validate.min.js',
            3 => 'assets/vendors/moment/min/moment.min.js',
            4 => 'assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js',
            5 => 'assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
        );

        $this->load->view('template', $data);
    }
}