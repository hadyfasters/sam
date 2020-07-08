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

function formatSizeUnits($bytes)
{
	if ($bytes >= 1073741824)
	{
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	}
	elseif ($bytes >= 1048576)
	{
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	}
	elseif ($bytes >= 1024)
	{
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	}
	elseif ($bytes > 1)
	{
		$bytes = $bytes . ' bytes';
	}
	elseif ($bytes == 1)
	{
		$bytes = $bytes . ' byte';
	}
	else
	{
		$bytes = '0 bytes';
	}

	return $bytes;
}