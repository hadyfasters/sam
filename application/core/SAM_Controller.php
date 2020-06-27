<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SAM_Controller extends CI_Controller{
    protected $data;
    protected $menulist;
    protected $isLogin=FALSE;

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('client_url');

        if(!empty($this->session->userdata('data_login'))){
            if(time() < $this->session->userdata('data_login')['expired']){
                $this->isLogin = TRUE;
                $this->data['userdata'] = $this->session->userdata('data_login');
                $this->data['menulist'] = $this->getMenu($this->data['userdata']);
            }
        }
    }

    public function getMenu($data)
    {
        $menuFilter = [
            'id_user' => $data['id_user'],
            'npp' => $data['npp'],
            'roles' => $data['role_id'],
            'is_sa' => $data['is_sa'],
        ];
        $menu = $this->client_url->postCURL(MENU_USER, $this->secure($menuFilter), $data['token']);
        $menu_resp = json_decode($menu);
        if($menu_resp!=null && !isset($menu_resp->status)){
            // Decrypt the response
            $menu_resp = json_decode($this->recure($menu_resp));
        }

        return $menu_resp->data;
    }

    public function secure($input)
    {
        $result = $this->encryption->sam_encrypt($input);

        return $result;
    }

    public function recure($input)
    {
        $result = $this->encryption->sam_decrypt($input);

        return $result;
    }
}