<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends SAM_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->library('session');     

        if(!$this->isLogin){
            redirect('login/out');
        }        
	}

	public function index()
	{
        redirect('report/activityreport');
    }

    public function activityreport() 
    {
        $path = ACTIVITY_REPORT;
        $search = '';
        // if(!empty($this->input->post())){
        //     $forms = [
        //         'produk' => $this->input->post('produksumberdana'),
        //         'nama_prospek' => $this->input->post('namaprospek'),
        //         'kategori_nasabah' => $this->input->post('kategorinasabah'),
        //         'jenis_nasabah' => $this->input->post('jenisnasabah')
        //     ];
        //     $search = $this->secure($forms);
        //     $this->data['search'] = $forms;
        // }

        $leads = $this->client_url->postCURL($path,$search,$this->data['userdata']['token']);
        if($leads!=null && !isset($leads->status)){
            // Decrypt the response
            $leads = json_decode($this->recure($leads));
        }
        if(isset($leads->status) && $leads->status)
        {
            $this->data['activity_report_data'] = $leads->data;
        }
        
        $this->data['content'] = 'report/activity-report';

        $this->data['javascriptLoad'] = array(
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
            15 => 'assets/build/js/report.js'
        );

        $this->load->view('template', $this->data);
    }

    public function performancereport() 
    {
        $this->data['content'] = 'report/performance-report';

        $this->data['javascriptLoad'] = array(
            1 => 'assets/vendors/datatables.net/js/jquery.dataTables.min.js',
            2 => 'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js',
            3 => 'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js',
            4 => 'assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
            5 => 'assets/vendors/datatables.net-buttons/js/buttons.flash.min.js',
            6 => 'assets/vendors/datatables.net-buttons/js/buttons.html5.min.js',
            7 => 'assets/vendors/datatables.net-buttons/js/buttons.print.min.js',
            8 => 'assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
            9 => 'assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js',
            10 => 'assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js',
            11 => 'assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js',
            12 => 'assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js',
            13 => 'assets/build/js/report.js'
        );

        $this->load->view('template', $this->data);
    }

    

    public function add(){
        $data['userdata'] = $this->session->userdata('data_login');
        $data['menu_parent'] = $this->M_menu->getMenuParentByRole((int)$data['userdata']['id_role']);
        $this->load->view('inputandview/input-meet', $data);
    }
}