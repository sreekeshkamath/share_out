<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$this->load->view('register_form');
	}
	public function login()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('auth_model');
		
		$data['title'] = 'Login';
		$data['hide_register'] = TRUE;
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		
		if ($this->form_validation->run() === FALSE)
		{
			// Load again
			$this->load->view('register_form', $data);
		}
		else
		{
			if ($this->control->do_login($this->form_validation->set_value('username'),
									$this->form_validation->set_value('password')
									)
				)
			{
				echo 'Success';
			} else {
				$data['error'] = 'Invalid Username/Password';
				$this->load->view('register_form', $data);
			}
		
		}
		
	}

	
	public function register()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('auth_model');

		$data['title'] = 'Register';
		
		$data['hide_login'] = TRUE;


		// Set form validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

		if ($this->form_validation->run() === FALSE)
		{
			// Load again
			$this->load->view('register_form', $data);

		}
		else
		{
			if ($this->auth_model->register($this->form_validation->set_value('username'),
										$this->form_validation->set_value('password'),
										$this->form_validation->set_value('email')
										)) 
			{
				echo 'You have successfully created an account.<br/>';
				
			}
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/auth.php */
