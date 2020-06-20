<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Committee extends CI_Controller {
	function construct() {
		parent::__construct ();
	}
	public function setUserData() {
		$username = $this->session->userdata ( "username" );
		$userType = $this->session->userdata ( "userType" );

		if ($userType == 'A') {
			$userDetails = $this->Admin_model->getAdmin ( $username );
		} else if ($userType == 'O') {
			$userDetails = $this->Owner_model->getOwner ( $username );
		} else if ($userType == 'E') {
			$userDetails = $this->Employee_model->getEmployee ( $username );
		} else {
			$userDetails = $this->Tenent_model->getTenent ( $username );
		}
		return $userDetails;
	}
	public function committeMemberList() {
		$data ['title'] = 'AMS Committee';
		$data ['pageTitle'] = 'AMS Committee Members';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Committee';
		$data ['text2'] = 'Members';

		$data ['userDetails'] = $this->setUserData ();

		$data ['members'] = $this->Committee_model->getCommitteeMembers ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'committee/list_committee_members', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function addCommitteeMember() {
		$data ['title'] = 'AMS Committee';
		$data ['pageTitle'] = 'AMS Committee Members';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Committee';
		$data ['text2'] = 'Add member';

		$data ['userDetails'] = $this->setUserData ();

		$this->form_validation->set_rules ( "member_name", "Member Name", "required" );
		$this->form_validation->set_rules ( "designation", "Designation", "required" );
		$this->form_validation->set_rules ( "joined_date", "Join Date", "required" );

		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'committee/add_committee_member', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->Committee_model->insertMember ();
			redirect ( 'Committee/committeMemberList' );
		}
	}
	public function editCommitteeMember($memberId) {
		$data ['title'] = 'AMS Committee';
		$data ['pageTitle'] = 'AMS Committee Members';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Committee';
		$data ['text2'] = 'Edit member';

		$data ['userDetails'] = $this->setUserData ();

		$data ['member'] = $this->Committee_model->editCommitteeMember ( $memberId );

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'committee/edit_committee_member', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function udateCommitteeMember($memberId) {
		$this->Committee_model->updateCommitteeModel ( $memberId );
		redirect ( 'Committee/committeMemberList' );
	}
	public function deleteCommitteeMember($memberId) {
		$this->Committee_model->deleteCommitteeMember ( $memberId );
		redirect ( 'Committee/committeMemberList' );
	}
	public function listMeetings() {
		$data ['title'] = 'AMS Meeting';
		$data ['pageTitle'] = 'AMS Meeting';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Committee';
		$data ['text2'] = 'Meetings List';

		$data ['userDetails'] = $this->setUserData ();

		$data ['meetings'] = $this->Committee_model->getMeetings ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'committee/list_meeting', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function callMeeting() {
		$data ['title'] = 'AMS Meeting';
		$data ['pageTitle'] = 'AMS Meeting';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Committee';
		$data ['text2'] = 'Call meeting';

		$data ['userDetails'] = $this->setUserData ();

		$data ['members'] = $this->Committee_model->getCommitteeMembers ();

		$this->form_validation->set_rules ( "meeting_name", "Meeting Subject", "required" );
		$this->form_validation->set_rules ( "place", "Venue", "required" );
		$this->form_validation->set_rules ( "joined_date", "Meeting Date", "required" );
		$this->form_validation->set_rules ( "time", "Meeting time", "required" );
		$this->form_validation->set_rules ( "meeting_description", "Meeting Description", "required" );
		$this->form_validation->set_rules ( "duration", "Meeting Duration", "required" );

		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'committee/call_meeting', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->Committee_model->addMeeting ();
			redirect ( 'Committee/listMeetings' );
		}
	}
	public function getMeetingNotifications() {
		echo 'notification';
	}
}
?>