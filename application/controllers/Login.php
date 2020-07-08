<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends SAM_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}

	public function index()
	{
        $this->load->helper('captcha');
        // $data['auth_token'] = getAuthToken();
        $vals = array(
            'img_path'      => './assets/captcha/',
            'img_url'       => site_url('assets/captcha/'),
            'font_path'     => site_url('assets/fonts/Gosrokan.otf'),
            'font_size'     => 40,
            'img_width'     => 150,
            'img_height'    => 35,
            'word_length'   => 6,
            'pool'          => '1234567890'
        );

        $cap = create_captcha($vals);
        $dataPost = array(
                'captcha_time'  => $cap['time'],
                'ip_address'    => $this->input->ip_address(),
                'word'          => $cap['word']
        );

        // Post a Secure data
        $postcap = $this->client_url->postCURL(AUTH_CAPTCHA, $this->secure($dataPost));
        $response = json_decode($postcap);
        if($response!=null && !isset($response->status)){
            // Decrypt the response
            $response = json_decode($this->recure($response));
        }

        $data['captcha_img'] = $cap['image'];

        $data['error_message'] = $this->session->flashdata('error_message');
        $data['login'] = 'login/process';
        $data['attributes'] = array('class' => 'col s12', 'id' => 'login-form', 'method' => 'post');
		$this->load->view('login', $data);
    }
    
    public function process(){
        extract($this->input->post());

        $dataPost = [
            'username' => $npp,
            'password' => $password,
            'captcha' => $captcha,
            'ip_address' => $this->input->ip_address()
        ];

        // Post a Secure data
        $login = $this->client_url->postCURL(AUTH_LOGIN_CHECK, $this->secure($dataPost));
        $response = json_decode($login);
        if($response!=null && !isset($response->status)){
            // Decrypt the response
            $response = json_decode($this->recure($response));
        }

        // Check response status
        if($response->status && isset($response->status))
        {
            $data_login = array(
                'id_user' => $response->data->id_user,
                'npp' => $response->data->npp,
                'nama' => $response->data->nama,
                'job' => $response->data->job,
                'job_id' => $response->data->job_id,
                'role' => $response->data->role,
                'role_id' => $response->data->role_id,
                'branch_id' => $response->data->branch_id,
                'branch_code' => $response->data->branch_code,
                'token' => $response->data->token,
                'expired' => $response->data->expired,
                'is_sa' => $response->data->is_sa,
                'acl_view' => $response->data->acl_view,
                'acl_input' => $response->data->acl_input,
                'acl_edit' => $response->data->acl_edit,
                'acl_delete' => $response->data->acl_delete,
                'acl_approve' => $response->data->acl_approve,
                'is_loggedin' => TRUE
            );
            
            $this->session->set_userdata('data_login', $data_login);
            redirect('dashboard');
        }
        else
        {
            // $this->session->set_flashdata('error_message', 'Username or password is wrong');
            $this->session->set_flashdata('error_message', $response->message);
            redirect('login');
        }        
    }

    public function out()
    {
        unset(
            $_SESSION['data_login'],
            $_SESSION['menu_list']
        );
        redirect('login');
    }
}