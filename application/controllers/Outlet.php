<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outlet extends SAM_Controller {

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
        redirect('outlet/wilayah');
    }

    public function wilayah()
    {
        $region = $this->client_url->postCURL(REGION_LIST,'',$this->data['userdata']['token']); 
        $region = json_decode($region);
        if($region!=null && !isset($region->status)){
            // Decrypt the response
            $region = json_decode($this->recure($region));
        }
        if(isset($region->status) && $region->status)
        {
            $this->data['region_list'] = $region->data;
        }

        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'outletmanagement/list-outlet-wilayah';
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
            12 => 'assets/build/js/outlet.js'
        );

        $this->load->view('template', $this->data);
    }

    public function add_outlet_wilayah()
    {
        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'outletmanagement/input-outlet-wilayah';

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/outlet.js',
            2 => 'assets/build/js/jquery.validate.min.js',
            3 => 'assets/vendors/moment/min/moment.min.js',
            4 => 'assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js',
            5 => 'assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
        );
        $this->load->view('template', $this->data);
    }

    public function edit_outlet_wilayah($id)
    {
        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'outletmanagement/edit-outlet-wilayah';

        $this->data['id'] = $id;
        $outlet = $this->client_url->postCURL(REGION_GET,$this->secure(array('id'=>$id)),$this->data['userdata']['token']); 
        $outlet = json_decode($outlet);

        if($outlet!=null && !isset($outlet->status)){
            // Decrypt the response
            $outlet = json_decode($this->recure($outlet));
        }

        $this->data['data'] = $outlet->data;

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/outlet.js',
            2 => 'assets/build/js/jquery.validate.min.js',
            3 => 'assets/vendors/moment/min/moment.min.js',
            4 => 'assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js',
            5 => 'assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
        );
        $this->load->view('template', $this->data);
    }

    public function add_process_wilayah()
    {
        extract($this->input->post());

        $dt_outlet = [
            'code' => $kodewilayah,
            'name' => $namawilayah,
            'start_date' => date('Y-m-d',strtotime(str_replace("/", "-", $startdate))),
            // 'end_date' => date('Y-m-d',strtotime(str_replace("/", "-", $enddate))),
            'status' => $status,
            'user' => $this->data['userdata']['nama']
        ];
        $outlet = $this->client_url->postCURL(REGION_CREATE,$this->secure($dt_outlet),$this->data['userdata']['token']); 
        $outlet = json_decode($outlet);

        if($outlet!=null && !isset($outlet->status)){
            // Decrypt the response
            $outlet = json_decode($this->recure($outlet));
        }

        if(isset($outlet->status) && !$outlet->status)
        {
            $this->session->set_flashdata('error_message', $outlet->message);
            redirect('outlet/add_outlet_wilayah');
        }
        redirect('outlet/wilayah');
    }

    public function edit_process_wilayah()
    {
        extract($this->input->post());

        $dt_outlet = [
            'id' => $id,
            'code' => $kodewilayah,
            'name' => $namawilayah,
            'start_date' => date('Y-m-d',strtotime(str_replace("/", "-", $startdate))),
            // 'end_date' => date('Y-m-d',strtotime(str_replace("/", "-", $enddate))),
            'status' => $status,
            'user' => $this->data['userdata']['nama']
        ];
        $outlet = $this->client_url->postCURL(REGION_UPDATE,$this->secure($dt_outlet),$this->data['userdata']['token']); 
        $outlet = json_decode($outlet);

        if($outlet!=null && !isset($outlet->status)){
            // Decrypt the response
            $outlet = json_decode($this->recure($outlet));
        }

        if(isset($outlet->status) && !$outlet->status)
        {
            $this->session->set_flashdata('error_message', $outlet->message);
            redirect('outlet/add_outlet_wilayah');
        }
        redirect('outlet');
    }

    public function cabang()
    {
        $region = $this->client_url->postCURL(REGION_LIST,'',$this->data['userdata']['token']); 
        $region = json_decode($region);
        if($region!=null && !isset($region->status)){
            // Decrypt the response
            $region = json_decode($this->recure($region));
        }
        if(isset($region->status) && $region->status)
        {
            $this->data['region_list'] = $region->data;
        }

        $branch = $this->client_url->postCURL(BRANCH_LIST,'',$this->data['userdata']['token']); 
        $branch = json_decode($branch);
        if($branch!=null && !isset($branch->status)){
            // Decrypt the response
            $branch = json_decode($this->recure($branch));
        }
        if(isset($branch->status) && $branch->status)
        {
            $this->data['branch_list'] = $branch->data;
        }

        // var_dump($this->data['branch_list']);exit;

        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'outletmanagement/list-outlet-cabang';
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
            12 => 'assets/build/js/outlet.js'
        );

        $this->load->view('template', $this->data);
    }   

    public function add_outlet_cabang()
    {
        $region = $this->client_url->postCURL(REGION_LIST,'',$this->data['userdata']['token']); 
        $region = json_decode($region);
        if($region!=null && !isset($region->status)){
            // Decrypt the response
            $region = json_decode($this->recure($region));
        }
        if(isset($region->status) && $region->status)
        {
            $this->data['region_list'] = $region->data;
        }

        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'outletmanagement/input-outlet-cabang';

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/outlet.js',
            2 => 'assets/build/js/jquery.validate.min.js',
            3 => 'assets/vendors/moment/min/moment.min.js',
            4 => 'assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js',
            5 => 'assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
        );
        $this->load->view('template', $this->data);
    }

    public function edit_outlet_cabang($id)
    {

        $this->data['error_message'] = $this->session->flashdata('error_message');
        // $this->data['auth_token'] = $this->getAuthToken();
        $this->data['content'] = 'outletmanagement/edit-outlet-cabang';

        $region = $this->client_url->postCURL(REGION_LIST,'',$this->data['userdata']['token']); 
        $region = json_decode($region);
        if($region!=null && !isset($region->status)){
            // Decrypt the response
            $region = json_decode($this->recure($region));
        }
        if(isset($region->status) && $region->status)
        {
            $this->data['region_list'] = $region->data;
        }

        $this->data['id'] = $id;
        $outlet = $this->client_url->postCURL(BRANCH_GET,$this->secure(array('id'=>$id)),$this->data['userdata']['token']); 
        $outlet = json_decode($outlet);

        if($outlet!=null && !isset($outlet->status)){
            // Decrypt the response
            $outlet = json_decode($this->recure($outlet));
        }

        $this->data['data'] = $outlet->data;
        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/outlet.js',
            2 => 'assets/build/js/jquery.validate.min.js',
            3 => 'assets/vendors/moment/min/moment.min.js',
            4 => 'assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js',
            5 => 'assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
        );
        $this->load->view('template', $this->data);
    }

    public function add_process_cabang()
    {
        extract($this->input->post());

        $dt_outlet = [
            'code' => $kodecabang,
            'name' => $namacabang,
            'region' => $wilayah,
            'start_date' => date('Y-m-d',strtotime(str_replace("/", "-", $startdate))),
            'end_date' => date('Y-m-d',strtotime(str_replace("/", "-", $enddate))),
            'user' => $this->data['userdata']['nama']
        ];
        $outlet = $this->client_url->postCURL(BRANCH_CREATE,$this->secure($dt_outlet),$this->data['userdata']['token']); 
        $outlet = json_decode($outlet);

        if($outlet!=null && !isset($outlet->status)){
            // Decrypt the response
            $outlet = json_decode($this->recure($outlet));
        }

        if(isset($outlet->status) && !$outlet->status)
        {
            $this->session->set_flashdata('error_message', $outlet->message);
            redirect('outlet/add_outlet_cabang');
        }
        redirect('outlet/cabang');
    }

    public function edit_process_cabang()
    {
        extract($this->input->post());

        $dt_outlet = [
            'id' => $id,
            'code' => $kodecabang,
            'name' => $namacabang,
            'region' => $wilayah,
            'start_date' => date('Y-m-d',strtotime(str_replace("/", "-", $startdate))),
            'end_date' => date('Y-m-d',strtotime(str_replace("/", "-", $enddate))),
            'user' => $this->data['userdata']['nama']
        ];

        $outlet = $this->client_url->postCURL(BRANCH_UPDATE,$this->secure($dt_outlet),$this->data['userdata']['token']); 
        $outlet = json_decode($outlet);

        if($outlet!=null && !isset($outlet->status)){
            // Decrypt the response
            $outlet = json_decode($this->recure($outlet));
        }

        if(isset($outlet->status) && !$outlet->status)
        {
            $this->session->set_flashdata('error_message', $outlet->message);
            redirect('outlet/edit_outlet_cabang/'.$id);
        }
        redirect('outlet/cabang');
    }
}