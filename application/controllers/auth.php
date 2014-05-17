<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {
	
	public function index()
	{
		
	}
	public function register()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Register';


		// Set form validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

		if ($this->form_validation->run() === FALSE)
		{
			// Load again

		}
		else
		{
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/auth.php */