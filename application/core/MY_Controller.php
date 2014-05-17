<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  MY_Controller  extends  CI_Controller  {
	function __construct()
	{
		parent::__construct();
		$this->load->library('control');
		
		if ( ($this->control->is_logged_in() === FALSE) &&  ($this->uri->segment(1) != 'auth')) {
			redirect(site_url("auth/"));
		}
		
		
		
	}
	
}

/* End of file */
