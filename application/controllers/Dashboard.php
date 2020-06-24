<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends SAM_Controller {

    public function __construct()
	{
		parent::__construct();     

        if(!$this->isLogin){
            redirect('login/out');
        }     
	}

	public function index()
	{
        redirect('dashboard/produkchart');
        // $this->data['content'] = 'dashboard/produkchart';

        // $this->data['javascriptLoad'] = array(
        //     0 => 'assets/vendors/Chart.js/dist/Chart.min.js',
        //     1 => 'assets/build/js/charts.js'
        // );

        // $this->load->view('template', $this->data);
    }

    public function produkchart()
    {
        $this->data['content'] = 'dashboard/produkchart';
        $this->data['javascriptLoad'] = array(
            0 => 'assets/vendors/Chart.js/dist/Chart.min.js',
            1 => 'assets/build/js/charts.js'
        );

        $this->load->view('template', $this->data);
    }

    public function proseschart()
    {
        $this->data['content'] = 'dashboard/proseschart';
        $this->data['javascriptLoad'] = array(
            0 => 'assets/vendors/Chart.js/dist/Chart.min.js',
            1 => 'assets/build/js/charts.js'
        );

        $this->load->view('template', $this->data);
    }

}