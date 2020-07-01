/<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends SAM_Controller {

    public function __construct()
	{
		parent::__construct();
		// $this->load->helper('form');
		$this->load->library('session'); 

        if(!$this->isLogin){
            redirect('login/out');
        }  
	}

	public function index()
	{
        $dt_user = [
            'is_sa' => $this->data['userdata']['is_sa']
        ];
        $users = $this->client_url->postCURL(USER_LIST,$this->secure($dt_user),$this->data['userdata']['token']); 
        $users = json_decode($users);
        if($users!=null && !isset($users->status)){
            // Decrypt the response
            $users = json_decode($this->recure($users));
        }
        if(isset($users->status) && $users->status)
        {
            $this->data['user_list'] = $users->data;
        }

        $this->data['content'] = 'usermanagement/list-user';

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
            12 => 'assets/build/js/user.js'
        );

        $this->load->view('template', $this->data);
    }

   
    public function add()
    {
        if(!$this->data['userdata']['is_sa'] && !$this->data['userdata']['acl_input']) {
            $this->session->set_flashdata('error_message', 'Access denied! You have no rights to access this page.');
            redirect('user');
        }
        $userToken = $this->data['userdata']['token'];

        $region = $this->client_url->postCURL(REGION_LIST,'',$userToken); 
        $region = json_decode($region);
        if($region!=null && !isset($region->status)){
            // Decrypt the response
            $region = json_decode($this->recure($region));
        }
        if(isset($region->status) && $region->status)
        {
            $this->data['region_list'] = $region->data;
        }

        $branch = $this->client_url->postCURL(BRANCH_LIST,'',$userToken);  
        $branch = json_decode($branch);
        if($branch!=null && !isset($branch->status)){
            // Decrypt the response
            $branch = json_decode($this->recure($branch));
        }
        if(isset($branch->status) && $branch->status)
        {
            $this->data['branch_list'] = $branch->data;
        }

        $dt_user = [
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

        $dt_roles = [
            'is_sa' => $this->data['userdata']['is_sa'],
            'status' => 1
        ];
        $roles = $this->client_url->postCURL(ROLES_LIST,$this->secure($dt_roles),$userToken); 
        $roles = json_decode($roles);
        if($roles!=null && !isset($roles->status)){
            // Decrypt the response
            $roles = json_decode($this->recure($roles));
        }
        if(isset($roles->status) && $roles->status)
        {
            $this->data['roles_list'] = $roles->data;
        }

        // $this->data['auth_token'] = $this->getAuthToken();
        $this->data['content'] = 'usermanagement/input-user';

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/user.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    public function detail()
    {
        $this->data['content'] = 'usermanagement/view-user';
      
        $this->load->view('template', $this->data);
    }

    public function edit($id)
    {
        if(!$this->data['userdata']['is_sa'] && !$this->data['userdata']['acl_edit']) {
            $this->session->set_flashdata('error_message', 'Access denied! You have no rights to access this page.');
            redirect('user');
        }
        $userToken = $this->data['userdata']['token'];

        $region = $this->client_url->postCURL(REGION_LIST,'',$userToken); 
        $region = json_decode($region);
        if($region!=null && !isset($region->status)){
            // Decrypt the response
            $region = json_decode($this->recure($region));
        }
        if(isset($region->status) && $region->status)
        {
            $this->data['region_list'] = $region->data;
        }

        $branch = $this->client_url->postCURL(BRANCH_LIST,'',$userToken);  
        $branch = json_decode($branch);
        if($branch!=null && !isset($branch->status)){
            // Decrypt the response
            $branch = json_decode($this->recure($branch));
        }
        if(isset($branch->status) && $branch->status)
        {
            $this->data['branch_list'] = $branch->data;
        }

        $dt_user = [
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

        $dt_roles = [
            'is_sa' => $this->data['userdata']['is_sa'],
            'status' => 1
        ];
        $roles = $this->client_url->postCURL(ROLES_LIST,$this->secure($dt_roles),$userToken); 
        $roles = json_decode($roles);
        if($roles!=null && !isset($roles->status)){
            // Decrypt the response
            $roles = json_decode($this->recure($roles));
        }
        if(isset($roles->status) && $roles->status)
        {
            $this->data['roles_list'] = $roles->data;
        }

        $this->data['id'] = $id;
        $user = $this->client_url->postCURL(USER_GET,$this->secure(array('id'=>$id)),$this->data['userdata']['token']);
        $user = json_decode($user);

        if($user!=null && !isset($user->status)){
            // Decrypt the response
            $user = json_decode($this->recure($user));
        }

        $this->data['data'] = $user->data;
        
        $this->data['error_message'] = $this->session->flashdata('error_message');
        $this->data['content'] = 'usermanagement/edit-user';

        $this->data['javascriptLoad'] = array(
            1 => 'assets/build/js/user.js',
            2 => 'assets/build/js/jquery.validate.min.js'
        );

        $this->load->view('template', $this->data);
    }

    public function add_process()
    {
        extract($this->input->post());
        $dt_user = [
            'npp' => $npp,
            'nama' => $nama,
            'region' => $wilayah,
            'branch' => $cabang,
            'position' => $jabatan,
            'roles' => $roles,
            'status' => 1
        ];
        $user = $this->client_url->postCURL(USER_CREATE,$this->secure($dt_user),$this->data['userdata']['token']); 
        $user = json_decode($user);

        if($user!=null && !isset($user->status)){
            // Decrypt the response
            $user = json_decode($this->recure($user));
        }

        if(isset($user->status) && !$user->status)
        {
            $this->session->set_flashdata('error_message', $user->message);
            redirect('user/add');
        }
        redirect('user');
    }

    public function edit_process()
    {
        extract($this->input->post());
        $dt_user = [
            'id' => $id,
            'npp' => $npp,
            'nama' => $nama,
            'region' => $wilayah,
            'branch' => $cabang,
            'position' => $jabatan,
            'roles' => $roles,
            'status' => $status,
            'user' => $this->data['userdata']['nama']
        ];

        $user = $this->client_url->postCURL(USER_UPDATE,$this->secure($dt_user),$this->data['userdata']['token']); 
        $user = json_decode($user);    

        if($user!=null && !isset($user->status)){
            // Decrypt the response
            $user = json_decode($this->recure($user));
        }   
        if(isset($user->status) && !$user->status)
        {
            $this->session->set_flashdata('error_message', $user->message);
            redirect('user/edit/'.$user->$id);
        }
        redirect('user');
    }
}
