<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model { 
	
public function add_interest($interest, $user_id)
{
	$data = array(
		'interest' => $username,
		'user_id' => $user_id,
	);

	return $this->db->insert('interests', $data);
}
}

