<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  MY_Controller  extends  CI_Controller  {
	function __construct()
	{
		parent::__construct();
		$this->load->library('control');
		if ($this->control->check_login() === FALSE) {
			redirect(site_url("auth/login"));
		}
		
		
	}
	
}

/* End of file */
