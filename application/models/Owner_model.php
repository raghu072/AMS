<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Owner_model extends CI_Model {
	public function login($username, $password, $userType) {
		$this->db->where ( "email", $username );
		$this->db->where ( "password", md5 ( $password ) );

		$result = $this->db->get ( "owner" );
		// die($this->db->last_query());
		$data = $result->result_array ();

		if ($result->num_rows () == 1) {
			return $data [0] ["owner_id"];
		} else {
			return FALSE;
		}
	}
	public function getOwners() {
		$this->db->select ( 'owner_id, owner_name, email, block, flat_owned, contact, own_flag,owned_to, owned_from' );
		$query = $this->db->get ( "owner" );
		return $query->result_array ();
	}
	public function getOwner($username) {
		$this->db->select ( 'owner_id, owner_name, email, block, flat_owned, contact, own_flag, own_flag,owned_to, owned_from' );
		$this->db->where ( 'email', $username );
		$query = $this->db->get ( "owner" );
		return $query->result_array ();
	}
	public function addOwner() {
		$data = array (
				'owner_name' => $this->input->post ( 'owner_name' ),
				'contact' => $this->input->post ( 'contact' ),
				'flat_owned' => $this->input->post ( 'flat_owned' ),
				'block' => $this->input->post ( 'block' ),
				'email' => $this->input->post ( 'email' ),
				'owned_from' => date ( 'Y-m-d', strtotime ( $this->input->post ( 'owned_date' ) ) ),
				'password' => md5 ( $this->input->post ( 'password' ) ),
				'own_flag' => 1
		);

		$this->db->insert ( 'owner', $data );
		// $insertId = $this->db->insert_id ();

		// is_sold column
		$soldFlag = array (
				'is_sold' => 1
		);
		$this->db->where ( "block", $this->input->post ( 'block' ) );
		$this->db->where ( "flat_number", $this->input->post ( 'flat_owned' ) );
		$this->db->update ( 'flat', $soldFlag );

		// is_occupied
		if ($this->input->post ( 'stay' ) == '1') {
			$isOccupied = array (
					'is_occupied' => 1
			);
			$this->db->where ( "block", $this->input->post ( 'block' ) );
			$this->db->where ( "flat_number", $this->input->post ( 'flat_owned' ) );
			$this->db->update ( 'flat', $isOccupied );
		} else if ($this->input->post ( 'stay' ) == '2') {
			$isOccupied = array (
					'is_occupied' => 2
			);
			$this->db->where ( "block", $this->input->post ( 'block' ) );
			$this->db->where ( "flat_number", $this->input->post ( 'flat_owned' ) );
			$this->db->update ( 'flat', $isOccupied );

			/*
			 * $onRent = array (
			 * 'on_rent_flat' => $this->input->post ( 'flat_owned' ),
			 * 'block' => $this->input->post ( 'block' ),
			 * 'rent_price' => $this->input->post ( 'rent' ),
			 * 'deposit_amount' => $this->input->post ( 'deposit_amt' ),
			 * 'owner' => $insertId
			 * );
			 *
			 * $this->db->insert ( 'flat_for_rent', $onRent );
			 */
		}
	}
	public function editOwner($block, $flatNumber) {
		$this->db->select ( 'owner_id, owner_name, email, block, flat_owned, contact, own_flag, own_flag,owned_to, owned_from' );
		$this->db->where ( "block", $block );
		$this->db->where ( "flat_owned", $flatNumber );

		$result = $this->db->get ( "owner" );
		$data = $result->row_array ();
		return $data;
	}
	public function updateOwner($block, $flatNumber) {
		$soldDate = $this->input->post ( 'sold_date' );

		$ownedTo = ($soldDate == '0000-00-00 00:00:00' || $soldDate == '') ? '0000-00-00 00:00:00' : $soldDate;
		$ownedFlag = ($ownedTo == '0000-00-00 00:00:00' || $ownedTo == '') ? 1 : 0;

		$data = array (
				'owner_name' => $this->input->post ( 'owner_name' ),
				'contact' => $this->input->post ( 'contact' ),
				'flat_owned' => $this->input->post ( 'flat_owned' ),
				'block' => $this->input->post ( 'block' ),
				'email' => $this->input->post ( 'email' ),
				'owned_from' => date ( 'Y-m-d', strtotime ( $this->input->post ( 'owned_date' ) ) ),
				'owned_to' => date ( 'Y-m-d', strtotime ( $ownedTo ) ),
				'own_flag' => $ownedFlag
		);

		$this->db->where ( 'block', $block );
		$this->db->where ( 'flat_owned', $flatNumber );
		$this->db->update ( 'owner', $data );
	}
	public function deleteOwner($block, $flatNumber) {
		$ownFlag = 0;
		$data = array (
				'own_flag' => $ownFlag
		);
		$this->db->where ( 'block', $block );
		$this->db->where ( 'flat_owned', $flatNumber );
		$this->db->update ( 'owner', $data );
	}
	public function isFlatSold($flatNumber, $block) {
		$this->db->select ( 'is_sold' );
		$this->db->where ( 'block', $block );
		$this->db->where ( 'flat_number', $flatNumber );

		$result = $this->db->get ( "flat" );
		$data = $result->result_array ();

		return $data [0] ['is_sold'];
	}
}
?>