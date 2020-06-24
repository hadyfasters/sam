<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends SAM_Controller {

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
        $path = LEAD_LIST;
        $search = '';
        if(!empty($this->input->post())){
            $path = LEAD_SEARCH;
            $forms = [
                'produk' => $this->input->post('produksumberdana'),
                'nama_prospek' => $this->input->post('namaprospek'),
                'kategori_nasabah' => $this->input->post('kategorinasabah'),
                'jenis_nasabah' => $this->input->post('jenisnasabah')
            ];
            $search = $this->secure($forms);
            $this->data['search'] = $forms;
        }

        $products = $this->client_url->postCURL(PRODUCT_LIST,'',$this->data['userdata']['token']); 
        $products = json_decode($products);
        if($products!=null && !isset($products->status)){
            // Decrypt the response
            $products = json_decode($this->recure($products));
        }
        if(isset($products->status) && $products->status)
        {
            $this->data['product_list'] = $products->data;
        }

        $leads = $this->client_url->postCURL($path,$search,$this->data['userdata']['token']); 
        $leads = json_decode($leads);
        if($leads!=null && !isset($leads->status)){
            // Decrypt the response
            $leads = json_decode($this->recure($leads));
        }

        if(isset($leads->status) && $leads->status)
        {
            $this->data['lead_list'] = $leads->data;
        }
        $this->data['content'] = 'lead/list-lead';

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
            12 => 'assets/build/js/lead.js'
        );

        $this->load->view('template', $this->data);
    }

    public function add()
    {
        $provinces = $this->client_url->postCURL(PROVINCE_LIST,'',$this->data['userdata']['token']); 
        $provinces = json_decode($provinces);
        if($provinces!=null && !isset($provinces->status)){
            // Decrypt the response
            $provinces = json_decode($this->recure($provinces));
        }
        if(isset($provinces->status) && $provinces->status)
        {
            $this->data['province_list'] = $provinces->data;
        }

        $products = $this->client_url->postCURL(PRODUCT_LIST,'',$this->data['userdata']['token']); 
        $products = json_decode($products);
        if($products!=null && !isset($products->status)){
            // Decrypt the response
            $products = json_decode($this->recure($products));
        }
        if(isset($products->status) && $products->status)
        {
            $this->data['product_list'] = $products->data;
        }

        $this->data['content'] = 'lead/input-lead';
        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/lead.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    public function detail($id)
    {
        $this->data['content'] = 'lead/view-lead';

        $this->data['id'] = $id;
        $lead = $this->client_url->postCURL(LEAD_GET,$this->secure(array('id'=>$id)),$this->data['userdata']['token']);
        $lead = json_decode($lead);
        if($lead!=null && !isset($lead->status)){
            // Decrypt the response
            $lead = json_decode($this->recure($lead));
        }

        $this->data['data'] = $lead->data;
        
        $this->load->view('template', $this->data);
    }

    public function edit($id)
    {
        $this->data['content'] = 'lead/edit-lead';

        $this->data['id'] = $id;
        $lead = $this->client_url->postCURL(LEAD_GET,$this->secure(array('id'=>$id)),$this->data['userdata']['token']);
        $lead = json_decode($lead);
        if($lead!=null && !isset($lead->status)){
            // Decrypt the response
            $lead = json_decode($this->recure($lead));
        }

        $this->data['data'] = $lead->data;

        $provinces = $this->client_url->postCURL(PROVINCE_LIST,'',$this->data['userdata']['token']); 
        $provinces = json_decode($provinces);
        if($provinces!=null && !isset($provinces->status)){
            // Decrypt the response
            $provinces = json_decode($this->recure($provinces));
        }
        if(isset($provinces->status) && $provinces->status)
        {
            $this->data['province_list'] = $provinces->data;
        }

        $products = $this->client_url->postCURL(PRODUCT_LIST,'',$this->data['userdata']['token']); 
        $products = json_decode($products);
        if($products!=null && !isset($products->status)){
            // Decrypt the response
            $products = json_decode($this->recure($products));
        }
        if(isset($products->status) && $products->status)
        {
            $this->data['product_list'] = $products->data;
        }

        $arr = [
            'province' => $lead->data->provinsi
        ];

        $regency = $this->client_url->postCURL(REGENCY_LIST,$this->secure($arr),$this->data['userdata']['token']); 
        $regency = json_decode($regency);
        if($regency!=null && !isset($regency->status)){
            // Decrypt the response
            $regency = json_decode($this->recure($regency));
        }
        if(isset($regency->status) && $regency->status)
        {
            $this->data['regency_list'] = $regency->data;
        }

        $arr2 = [
            'regency' => $lead->data->kota_kabupaten
        ];

        $district = $this->client_url->postCURL(DISTRICT_LIST,$this->secure($arr2),$this->data['userdata']['token']); 
        $district = json_decode($district);
        if($district!=null && !isset($district->status)){
            // Decrypt the response
            $district = json_decode($this->recure($district));
        }
        if(isset($district->status) && $district->status)
        {
            $this->data['district_list'] = $district->data;
        }

        $arr3 = [
            'district' => $lead->data->kecamatan
        ];

        $village = $this->client_url->postCURL(VILLAGE_LIST,$this->secure($arr3),$this->data['userdata']['token']); 
        $village = json_decode($village);
        if($village!=null && !isset($village->status)){
            // Decrypt the response
            $village = json_decode($this->recure($village));
        }
        if(isset($village->status) && $village->status)
        {
            $this->data['village_list'] = $village->data;
        }

        $products = $this->client_url->postCURL(PRODUCT_LIST,'',$this->data['userdata']['token']); 
        $products = json_decode($products);
        if($products!=null && !isset($products->status)){
            // Decrypt the response
            $products = json_decode($this->recure($products));
        }
        if(isset($products->status) && $products->status)
        {
            $this->data['product_list'] = $products->data;
        }

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/lead.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    function getRegency()
    {
        $response = null;
        extract($this->input->post());

        $arr = [
            'province' => $province
        ];

        $regency = $this->client_url->postCURL(REGENCY_LIST,$this->secure($arr),$this->data['userdata']['token']); 
        $regency = json_decode($regency);
        if($regency!=null && !isset($regency->status)){
            // Decrypt the response
            $regency = json_decode($this->recure($regency));
        }
        if(isset($regency->status) && $regency->status)
        {
            $response = $regency->data;
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    function getDistrict()
    {
        $response = null;
        extract($this->input->post());

        $arr = [
            'regency' => $regency
        ];

        $district = $this->client_url->postCURL(DISTRICT_LIST,$this->secure($arr),$this->data['userdata']['token']); 
        $district = json_decode($district);
        if($district!=null && !isset($district->status)){
            // Decrypt the response
            $district = json_decode($this->recure($district));
        }
        if(isset($district->status) && $district->status)
        {
            $response = $district->data;
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    function getVillage()
    {
        $response = null;
        extract($this->input->post());

        $arr = [
            'district' => $district
        ];

        $village = $this->client_url->postCURL(VILLAGE_LIST,$this->secure($arr),$this->data['userdata']['token']); 
        $village = json_decode($village);
        if($village!=null && !isset($village->status)){
            // Decrypt the response
            $village = json_decode($this->recure($village));
        }
        if(isset($village->status) && $village->status)
        {
            $response = $village->data;
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    function saveData()
    {
        extract($this->input->post());

        $arr = [
            'kategori_nasabah' => $kategorinasabah,
            'nama_prospek' => $namaprospect,
            'jenis_nasabah' => $jenisnasabah,
            'alamat' => $alamat,
            'provinsi' => $provinsi,
            'kota_kabupaten' => $kota,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'kontak_person' => $contactperson,
            'no_kontak' => $contactnumber,
            'potensi_dana' => $potensidana,
            'produk' => $produksumberdana,
            'additional_info' => $additionalinfo,
            'user' => $this->data['userdata']['nama']
        ]; 

        $path = LEAD_CREATE;
        $return_path = 'lead/add';
        if(isset($id)){
            $arr['id'] = $id;
            $path = LEAD_UPDATE;
            $return_path = 'lead/edit/'.$id;
            unset($arr['user']);

            $datelead = date('Y-m-d',strtotime(str_replace('/','-',$datelead)));
            $timelead = date('H:i:s',strtotime($timelead));

            $arr['created_date'] = $datelead." ".$timelead;
        }

        $saving = $this->client_url->postCURL($path,$this->secure($arr),$this->data['userdata']['token']); 
        $saving = json_decode($saving);
        if($saving!=null && !isset($saving->status)){
            // Decrypt the response
            $saving = json_decode($this->recure($saving));
        }
        if(isset($saving->status) && !$saving->status)
        {
            $this->session->set_flashdata('error_message', $saving->message);
            redirect($return_path);
        }
        redirect('lead');
    }

    function approve($id)
    {
        $arr = [
            'id' => $id,
            'approval' => 1,
            'approval_by' => $this->data['userdata']['nama']
        ]; 

        $saving = $this->client_url->postCURL(LEAD_APPROVE,$this->secure($arr),$this->data['userdata']['token']); 
        $saving = json_decode($saving);
        if($saving!=null && !isset($saving->status)){
            // Decrypt the response
            $saving = json_decode($this->recure($saving));
        }
        if(isset($saving->status) && !$saving->status)
        {
            $this->session->set_flashdata('error_message', $saving->message);
        }
        redirect('lead');
    }
}