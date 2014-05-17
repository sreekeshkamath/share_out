<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model { 
	
	public function register($username, $password, $email)
	{
		$data = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,
		);

		return $this->db->insert('users', $data);
	}
	
	public function check_creds($username, $password)
	{
		
	}
	
}

