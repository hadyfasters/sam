<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends SAM_Controller {

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

        // var_dump($products);exit;
        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'productmanagement/list-product';

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
            12 => 'assets/build/js/product.js'
        );

        $this->load->view('template', $this->data);
    }

   
    public function add()
    {
        if(!$this->data['userdata']['is_sa'] && !$this->data['userdata']['acl_input']) {
            $this->session->set_flashdata('error_message', 'Access denied! You have no rights to access this page.');
            redirect('product');
        }
        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'productmanagement/input-product';

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/product.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    public function edit($id)
    {
        if(!$this->data['userdata']['is_sa'] && !$this->data['userdata']['acl_edit']) {
            $this->session->set_flashdata('error_message', 'Access denied! You have no rights to access this page.');
            redirect('product');
        }
        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'productmanagement/edit-product';

        $this->data['id'] = $id;
        $product = $this->client_url->postCURL(PRODUCT_GET,$this->secure(array('id'=>$id)),$this->data['userdata']['token']);
        $product = json_decode($product);

        if($product!=null && !isset($product->status)){
            // Decrypt the response
            $product = json_decode($this->recure($product));
        }

        $this->data['data'] = $product->data;

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/product.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    public function add_process()
    {
        extract($this->input->post());

        $dt_product = [
            'product_name' => $productname,
            'product_desc' => $productdesc,
            'status' => 1,
            'user' => $this->data['userdata']['nama']
        ];
        $product = $this->client_url->postCURL(PRODUCT_CREATE,$this->secure($dt_product),$this->data['userdata']['token']); 
        $product = json_decode($product);

        if($product!=null && !isset($product->status)){
            // Decrypt the response
            $product = json_decode($this->recure($product));
        }

        if(isset($product->status) && !$product->status)
        {
            $this->session->set_flashdata('error_message', $product->message);
            redirect('product/add');
        }
        redirect('product');
    }

    public function edit_process()
    {
        extract($this->input->post());

        $dt_product = [
            'id' => $id,
            'product_name' => $productname,
            'product_desc' => $productdesc,
            'status' => $status
        ];
        
        $product = $this->client_url->postCURL(PRODUCT_UPDATE,$this->secure($dt_product),$this->data['userdata']['token']); 
        $product = json_decode($product);

        if($product!=null && !isset($product->status)){
            // Decrypt the response
            $product = json_decode($this->recure($product));
        }

        if(isset($product->status) && !$product->status)
        {
            $this->session->set_flashdata('error_message', $product->message);
            redirect('product/edit/'.$id);
        }
        redirect('product');
    }
}