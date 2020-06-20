<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Tenent_model extends CI_Model {
	public function login($username, $password, $userType) {
		$this->db->where ( "email", $username );
		$this->db->where ( "password", md5 ( $password ) );

		$result = $this->db->get ( "tenent" );
		$data = $result->result_array ();

		if ($result->num_rows () == 1) {
			return $data [0] ["tenent_id"];
		} else {
			return FALSE;
		}
	}
	public function getTenents() {
		$this->db->select ( 'tenent_id,tenent_name,email,contact,moved_date,flat,block,is_tenent' );
		$query = $this->db->get ( 'tenent' );
		return $query->result_array ();
	}
	public function addTenent() {
		$movedDate = date ( 'Y-m-d', strtotime ( $this->input->post ( 'moved_date' ) ) );
		$data = array (
				'tenent_name' => $this->input->post ( 'tenent_name' ),
				'email' => $this->input->post ( 'email' ),
				'password' => md5 ( $this->input->post ( 'password' ) ),
				'moved_date' => $movedDate,
				'flat' => $this->input->post ( 'flat_moved' ),
				'block' => $this->input->post ( 'block' ),
				'contact' => $this->input->post ( 'contact' )
		);
		$this->db->insert ( 'tenent', $data );
	}
	public function editTenent($block, $flatNumber) {
		$this->db->select ( 'tenent_id,tenent_name,email,contact,moved_date,flat,block,is_tenent' );
		$this->db->where ( "block", $block );
		$this->db->where ( "flat", $flatNumber );

		$result = $this->db->get ( "tenent" );
		$data = $result->row_array ();
		return $data;
	}
	public function updateTenent($block, $flatNumber) {
		$password = $this->input->post ( 'password' );
		$movedDate = date ( 'Y-m-d', strtotime ( $this->input->post ( 'moved_date' ) ) );

		if (strlen ( $password ) == 0) {
			$data = array (
					'tenent_name' => $this->input->post ( 'tenent_name' ),
					'email' => $this->input->post ( 'email' ),
					'moved_date' => $movedDate,
					'flat' => $this->input->post ( 'flat_moved' ),
					'block' => $this->input->post ( 'block' ),
					'contact' => $this->input->post ( 'contact' )
			);
		} else {
			$data = array (
					'tenent_name' => $this->input->post ( 'tenent_name' ),
					'email' => $this->input->post ( 'email' ),
					'password' => md5 ( $password ),
					'moved_date' => $movedDate,
					'flat' => $this->input->post ( 'flat_moved' ),
					'block' => $this->input->post ( 'block' ),
					'contact' => $this->input->post ( 'contact' )
			);
		}
		$this->db->where ( 'block', $block );
		$this->db->where ( 'flat', $flatNumber );
		$this->db->update ( 'tenent', $data );
	}
	public function getTenent($username) {
		$this->db->select ( 'tenent_id, tenent_name, email, flat, block' );
		$this->db->where ( 'email', $username );
		$query = $this->db->get ( "tenent" );
		return $query->result_array ();
	}
	public function deleteTenent($block, $flatNumber) {
		$data = array (
				'is_tenent' => 0
		);
		$this->db->where ( 'flat', $flatNumber );
		$this->db->where ( 'block', $block );
		$this->db->update ( 'tenent', $data );
	}
	public function hasTenentMoved($flatNumber, $blockName) {
		$this->db->select ( 'is_occupied' );
		$this->db->where ( 'block', $blockName );
		$this->db->where ( 'flat_number', $flatNumber );

		$result = $this->db->get ( "flat" );
		$data = $result->result_array ();

		return $data [0] ['is_occupied'];
	}
}
?>