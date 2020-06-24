<?php defined('BASEPATH') OR exit('No direct script access allowed');

function getAuthToken()
{
	$CI =& get_instance();
	$CI->load->library('client_url');

	$response = $CI->client_url->getCURL(AUTH_TOKEN_PATH);
	$response = json_decode($response);
	if($response != null && !isset($response->auth_token))
		$response = json_decode($CI->encryption->sam_decrypt($response));

	return $response->auth_token;
}

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