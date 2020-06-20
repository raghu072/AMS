<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Committee_model extends CI_Model {
	public function getCommitteeMembers() {
		$this->db->select ( '*' );
		$this->db->where ( 'active', 1 );
		$query = $this->db->get ( 'committee' );
		return $query->result_array ();
	}
	public function insertMember() {
		$data = array (
				'member_name' => $this->input->post ( 'member_name' ),
				'designation' => $this->input->post ( 'designation' ),
				'member_from' => date ( 'Y-m-d', strtotime ( $this->input->post ( 'joined_date' ) ) )
		);
		$this->db->insert ( 'committee', $data );
	}
	public function editCommitteeMember($memberId) {
		$this->db->select ( '*' );
		$this->db->where ( 'member_id', $memberId );
		$query = $this->db->get ( 'committee' );
		return $query->row_array ();
	}
	public function updateCommitteeModel($memberId) {
		$memberTill = ($this->input->post ( 'member_till' ) != '') ? date ( 'Y-m-d', strtotime ( $this->input->post ( 'member_till' ) ) ) : '';
		$data = array (
				'member_name' => $this->input->post ( 'member_name' ),
				'designation' => $this->input->post ( 'designation' ),
				'member_from' => date ( 'Y-m-d', strtotime ( $this->input->post ( 'joined_date' ) ) ),
				'member_till' => $memberTill
		);
		$this->db->where ( 'member_id', $memberId );
		$this->db->update ( 'committee', $data );
	}
	public function deleteCommitteeMember($memberId) {
		$data = array (
				'active' => 0
		);
		$this->db->where ( 'member_id', $memberId );
		$this->db->update ( 'committee', $data );
	}
	/* Committee members concepts ends */
	/* Meeting concepts starts */
	public function getMeetings() {
		$this->db->select ( '*' );
		$query = $this->db->get ( 'meeting' );
		return $query->result_array ();
	}
	public function addMeeting() {
		$meetingDate = date ( 'Y-m-d', strtotime ( $this->input->post ( 'joined_date' ) ) );
		$meetingTime = date ( 'H:i', strtotime ( $this->input->post ( 'time' ) ) );
		$data = array (
				'meeting_on' => $this->input->post ( 'meeting_name' ),
				'meeting_venue' => $this->input->post ( 'place' ),
				'meeting_date' => $meetingDate,
				'meeting_time' => $meetingTime,
				'meeting_duration' => $this->input->post ( 'duration' ),
				'description' => $this->input->post ( 'meeting_description' )
		);
		$this->db->insert ( 'meeting', $data );
	}
	/* Meeting concepts ends */
}
?>