<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {
	
	public function __construct()
	{
		//Your own constructor code
		parent::__construct();
	}
	public function input($identitas, $users)
	{

		if( $this->db->insert('identitas', $identitas) && $this->db->insert('users', $users) )
		{
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function tampil()
	{
		return $this->db->get('identitas');
	}

	public function login($userdata)
	{
		$query = " SELECT username, password FROM users WHERE  username = '" . $userdata['username']. "' AND password = '". $userdata['password'] . " ' ";
		if( $result = $this->db->query($query) ) {
			return true;			
			

		// if( $result = $this->db->get_where('users',
		// 	array( 
		// 		'username'=> $userdata['username'],
		// 		'password' => $userdata['password'] 
		// 	) ) ) {
		// 	$result->row();
			// die();
		} else {
			echo "sosadd";
			die();
		}
	}
}

