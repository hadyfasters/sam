<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends SAM_Controller {

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
        $this->data['content'] = 'messagemanagement/list-message';

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
            12 => 'assets/build/js/message.js',
        );

        $this->load->view('template', $this->data);
    }

    public function add()
    {
        $this->data['auth_token'] = $this->getAuthToken();
        $this->data['content'] = 'messagemanagement/input-message';
        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/message.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    public function edit()
    {
        $this->data['auth_token'] = $this->getAuthToken();
        $this->data['content'] = 'messagemanagement/edit-message';
        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/message.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    
}