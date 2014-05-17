<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends MY_Controller {
	
	public function index()
	{
		
	}
	public function add_post()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Add Post';
		
		// Set form validation rules
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('type', 'Type', 'trim|required|callback__check_type');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		
		$this->form_validation->set_message('_check_type', 'Please select a type');
	
		if ($this->form_validation->run() === FALSE)
		{
			// Load again
			$this->load->view('share_out', $data);
		}
		else
		{
			$info = array('title' => $this->form_validation->set_value('title'),
						'description' => $this->form_validation->set_value('description'));
			redirect('content/do_upload');
		}
	}
	
	public function do_upload($info)
	{
		if ( ! is_array($info)) echo 'No direct access allowed.';
	}
	
	public function _check_type($str)
	{
		if ($str == 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/auth.php */
