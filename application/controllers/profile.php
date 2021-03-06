<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {
	
	
	
	
	public function index($id=FALSE)
	{
		if ( ! $id) {
			$id = $this->control->is_logged_in();
			$data['own_page'] = TRUE;
		} else {
			$data['own_page'] = FALSE;
		}
		$query = $this->db->get_where('users', array('id' => $id));
		if ( ! $this->control->get_username($id) )
		{
			echo 'INVALID ID';
			die();
		}
		$user = $query->row();
		$data['username'] = $user->username;
		$data['email'] = $user->email;
		$data['user_id'] = $user->id;
		$query = $this->db->get_where('followers', array('follower_id' => $this->control->is_logged_in(), 
															'followed_id' => $id));
		if ($query->num_rows() > 0)
		{
			$data['following'] = TRUE;
		} else {
			$data['following'] = FALSE;
		}
		$this->load->view('profile', $data);
	}
	
	public function follow($user_id)
	{
		$this->db->insert('followers', array('follower_id' => $this->control->is_logged_in(),
											'followed_id' => $user_id)
						);
	}
	
	public function unfollow($user_id)
	{
		$this->db->delete('followers', array('follower_id' => $this->control->is_logged_in(),
											'followed_id' => $user_id)
						);
	}
	
	public function add_interest()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('profile_model');

		$data['title'] = 'Add Interests';


		// Set form validation rules
		$this->form_validation->set_rules('interest', 'Username', 'trim|required|min_length[3]|max_length[12]');
	
		if ($this->form_validation->run() === FALSE)
		{
			// Load again

		}
		else
		{
			$this->auth_model->register($this->form_validation->set_value('interest'),
										$this->control->get_user_id()
										);
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/auth.php */
