<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Control {
	
	function __construct()
	{
		$this->ci =& get_instance();


		
	}
	public function is_logged_in()
	{
		return $this->ci->session->userdata('user_id');
	}
	
	public function do_login($username, $password)
	{
		$query = $this->ci->db->get_where('users', array('username' => $username, 'password' => $password));

		if ($query->num_rows() > 0)
		{
			$user = $query->row(); 
			$this->ci->session->set_userdata(array('user_id' => $user->id,
												'username' => $user->username
												)
										);
			return $user->id;
			
		}
		return FALSE;
		
	}
	
	public function get_username($user_id=FALSE)
	{
		if ( ! $user_id) $user_id = $this->is_logged_in();
		if ($user_id) {
			$query = $this->ci->db->get_where('users', array('id' => $user_id));
			if ($query->num_rows() > 0) {
				$user = $query->row();
				return $user->username;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
}

/* End of file Someclass.php */
