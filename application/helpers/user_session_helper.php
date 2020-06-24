<?php defined('BASEPATH') OR exit('No direct script access allowed');

function isLoggedin()
{
	$CI = & get_instance();  //get instance, access the CI superobject
	$CI->load->library('session');
  	$isLoggedIn = $CI->session->userdata('is_loggedin');

  	if( $isLoggedIn ) 
  	{
  		return TRUE;
  	}

  	redirect('login');
}