<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Admin_model extends CI_Model {
	public function login($username, $password, $userType) {
		$this->db->where ( "admin_email", $username );
		$this->db->where ( "password", $password );

		$result = $this->db->get ( "admin" );
		$data = $result->result_array ();

		if ($result->num_rows () == 1) {
			return $data [0] ["admin_id"];
		} else {
			return FALSE;
		}
	}
	public function getAdmin($username) {
		$this->db->select ( 'admin_id, admin_name, admin_email' );
		$this->db->where ( 'admin_email', $username );
		$query = $this->db->get ( "admin" );
		return $query->result_array ();
	}
}
?>