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

    public function leadreport() 
    {
        $path = LEAD_REPORT;
        $search = '';

        $leads = $this->client_url->postCURL($path,$search,$this->data['userdata']['token']);
        if($leads!=null && !isset($leads->status)){
            // Decrypt the response
            $leads = json_decode($this->recure($leads));
        }
        if(isset($leads->status) && $leads->status)
        {
            $this->data['lead_report_data'] = $leads->data;
        }
        
        $this->data['content'] = 'report/lead-report';

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

    public function callreport() 
    {
        $path = CALL_REPORT;
        $search = '';

        $calls = $this->client_url->postCURL($path,$search,$this->data['userdata']['token']);
        if($calls!=null && !isset($calls->status)){
            // Decrypt the response
            $calls = json_decode($this->recure($calls));
        }
        if(isset($calls->status) && $calls->status)
        {
            $this->data['call_report_data'] = $calls->data;
        }
        
        $this->data['content'] = 'report/call-report';

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

    public function meetreport() 
    {
        $path = MEET_REPORT;
        $search = '';

        $meets = $this->client_url->postCURL($path,$search,$this->data['userdata']['token']);
        if($meets!=null && !isset($meets->status)){
            // Decrypt the response
            $meets = json_decode($this->recure($meets));
        }
        if(isset($meets->status) && $meets->status)
        {
            $this->data['meet_report_data'] = $meets->data;
        }
        
        $this->data['content'] = 'report/meet-report';

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

    public function closereport() 
    {
        $path = CLOSE_REPORT;
        $search = '';

        $closes = $this->client_url->postCURL($path,$search,$this->data['userdata']['token']);
        if($closes!=null && !isset($closes->status)){
            // Decrypt the response
            $closes = json_decode($this->recure($closes));
        }
        if(isset($closes->status) && $closes->status)
        {
            $this->data['close_report_data'] = $closes->data;
        }
        
        $this->data['content'] = 'report/close-report';

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


    public function leadmainreport() 
    {
        $path = ACTIVITY_REPORT;
        $search = '';
        if(!empty($this->input->post())){
            $forms = [
                'data_summary' => $this->input->post('datasummary'),
                'rentang_waktu' => $this->input->post('rentangwaktu')
            ];
            $search = $this->secure($forms);
            $this->data['search'] = $forms;
        }
        
        $leads = $this->client_url->postCURL($path,$search,$this->data['userdata']['token']);
        $leads = json_decode($this->recure($leads));  
        if($leads!=null && !isset($leads->status)){
            // Decrypt the response
            $leads = json_decode($this->recure($leads));  
        }
        if(isset($leads->status) && $leads->status)
        {            
            $this->data['main_lead_report_data'] = $leads->data;            
        }
        $this->data['content'] = 'report/lead-main-report';

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
            15 => 'assets/build/js/leadmainreport.js'
        );
        $this->data['javascriptLoadcdn'] = array(
            1 => 'https://code.jquery.com/jquery-3.5.1.js',
            2 => 'https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js',
            3 => 'https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js'
        );        

        $this->load->view('template', $this->data);
    }

    public function getleadmainreport() 
    {
        $path = ACTIVITY_REPORT;
        $search = '';
        if(!empty($this->input->post())){
            $forms = [
                'data_summary' => $this->input->post('datasummary'),
                'rentang_waktu' => $this->input->post('rentangwaktu')
            ];
            $search = $this->secure($forms);
            $this->data['search'] = $forms;
        }
        
        $leads = $this->client_url->postCURL($path,$search,$this->data['userdata']['token']);
        $leads = json_decode($this->recure($leads));  
        if($leads!=null && !isset($leads->status)){
            // Decrypt the response
            $leads = json_decode($this->recure($leads));  
        }
        if(isset($leads->status) && $leads->status)
        {            
            return json_decode($leads->data);     
        }
        return json_decode(null);
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