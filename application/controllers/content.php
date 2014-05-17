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
						'description' => $this->form_validation->set_value('description'),
						'user_id' => $this->control->is_logged_in()
						);
						
			if ($this->form_validation->set_value('type') == '1') {
				// Temp code, THIS IS A VERY BAD IDEA to pass the file name
				$info['picture'] = uniqid().'.jpg';
				$this->db->insert('ads', $info);
				$this->session->set_userdata('filename', $info['picture']);
				echo 'GOD';
				//~ $this->load->view('upload_form');
			} else if ($this->form_validation->set_value('type') == '2') {
				$this->db->insert('ideas', $info);
				echo 'Successfully posted new idea.<br />';
			}
		}
	}
	
	public function do_upload()
	{
		
		echo $this->session->userdata('filename');
		$this->load->helper('form');
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $this->session->userdata('filename');
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->session->unset_userdata('filename');
			echo 'Successfully added new ad';
		}
		
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