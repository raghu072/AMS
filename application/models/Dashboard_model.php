<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Dashboard_model extends CI_Model {
	public function getblocks() {
		$this->db->select ( 'count(*) as no_of_blocks' );
		$query = $this->db->get ( 'block' );
		$data = $query->result_array ();
		return $data;
	}
	public function getUnits() {
		$this->db->select ( 'count(*) as no_of_units' );
		$query = $this->db->get ( 'flat' );
		$data = $query->result_array ();
		return $data;
	}
	public function getOwners() {
		$this->db->select ( 'count(*) as no_of_owners' );
		$this->db->where ( 'own_flag', 1 );
		$query = $this->db->get ( 'owner' );
		$data = $query->result_array ();
		return $data;
	}
	public function getTenents() {
		$this->db->select ( 'count(*) as no_of_tenents' );
		$query = $this->db->get ( 'tenent' );
		$data = $query->result_array ();
		return $data;
	}
	public function getEmployees() {
		$this->db->select ( 'count(*) as no_of_employees' );
		$query = $this->db->get ( 'employee' );
		$data = $query->result_array ();
		return $data;
	}
	public function getCommittees() {
		$this->db->select ( 'count(*) as no_of_committees' );
		$query = $this->db->get ( 'committee' );
		$data = $query->result_array ();
		return $data;
	}
	public function buildingInfo() {
		$this->db->select ( '*' );
		$query = $this->db->get ( 'building_info' );
		$data = $query->result_array ();
		return $data;
	}
	public function gymMembersInfo() {
		$this->db->select ( '*' );
		$this->db->where ( 'active', 1 );
		$query = $this->db->get ( 'gym_member' );
		$data = $query->result_array ();
		return $data;
	}
	public function addGymMember() {
		$memberFrom = date ( 'Y-m-d', strtotime ( $this->input->post ( 'member_from' ) ) );
		$memberTill = ($this->input->post ( 'member_till' ) != '') ? date ( 'Y-m-d', strtotime ( $this->input->post ( 'member_till' ) ) ) : '';

		$data = array (
				'member_name' => $this->input->post ( 'member_name' ),
				'gym_member_from' => $memberFrom,
				'gym_member_to' => $memberTill
		);
		$this->db->insert ( 'gym_member', $data );
	}
	public function editGymMember($memberId) {
		$this->db->select ( '*' );
		$this->db->where ( 'gym_member_id', $memberId );
		$query = $this->db->get ( 'gym_member' );
		$data = $query->row_array ();
		return $data;
	}
	public function updateGymMember($memberId) {
		$memberFrom = date ( 'Y-m-d', strtotime ( $this->input->post ( 'member_from' ) ) );
		$memberTill = ($this->input->post ( 'member_till' ) != '') ? date ( 'Y-m-d', strtotime ( $this->input->post ( 'member_till' ) ) ) : '';

		$data = array (
				'member_name' => $this->input->post ( 'member_name' ),
				'gym_member_from' => $memberFrom,
				'gym_member_to' => $memberTill
		);
		$this->db->where ( 'gym_member_id', $memberId );
		$this->db->update ( 'gym_member', $data );
	}
	public function deleteGymMember($memberId) {
		$data = array (
				'active' => 0
		);
		$this->db->where ( 'gym_member_id', $memberId );
		$this->db->update ( 'gym_member', $data );
	}
}
?>