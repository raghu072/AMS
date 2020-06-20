<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Dashboard extends CI_Controller {
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
	public function index() {
		if (! $this->session->userdata ( "logged_in" )) {
			redirect ( "users/login" );
		}

		$data ['title'] = 'AMS Dashboard';
		$data ['homeBreadcam'] = 'Dashboard';

		$data ['userDetails'] = $this->setUserData ();

		$data ['blocks'] = $this->Dashboard_model->getblocks ();
		$data ['units'] = $this->Dashboard_model->getUnits ();
		$data ['owners'] = $this->Dashboard_model->getOwners ();
		$data ['tenents'] = $this->Dashboard_model->getTenents ();
		$data ['employees'] = $this->Dashboard_model->getEmployees ();
		$data ['committee'] = $this->Dashboard_model->getCommittees ();

		// Fetch data for dashboard
		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'dashboard/dashboard', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function buildingInformation() {
		$data ['title'] = 'Building Information';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text_1'] = 'Building Information';

		$data ['userDetails'] = $this->setUserData ();

		$data ['buildingInfo'] = $this->Dashboard_model->buildingInfo ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'building/building_info', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function gymMembers() {
		$data ['title'] = 'Gym';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Gym info';
		$data ['pageTitle'] = 'Gym info';

		$data ['userDetails'] = $this->setUserData ();

		$data ['gymMembers'] = $this->Dashboard_model->gymMembersInfo ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'building/gym_members', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function addGymMember() {
		$data ['title'] = 'Gym';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Gym';
		$data ['text2'] = 'Add member';
		$data ['pageTitle'] = 'Gym info';

		$data ['userDetails'] = $this->setUserData ();

		$this->form_validation->set_rules ( "member_name", "Name", "required" );
		$this->form_validation->set_rules ( "member_from", "Member from date", "required" );

		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'building/add_gym_member', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->Dashboard_model->addGymMember ();
			redirect ( 'Dashboard/gymMembers' );
		}
	}
	public function editGymMember($memberId) {
		$data ['title'] = 'Gym';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Gym';
		$data ['text2'] = 'Edit member';
		$data ['pageTitle'] = 'Gym Info';

		$data ['userDetails'] = $this->setUserData ();

		$data ['gymMember'] = $this->Dashboard_model->editGymMember ( $memberId );

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'building/edit_gym_member', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function updateGymMember($memberId) {
		$this->Dashboard_model->updateGymMember ( $memberId );
		redirect ( 'Dashboard/gymMembers' );
	}
	public function deleteGymMember($memberId) {
		$this->Dashboard_model->deleteGymMember ( $memberId );
		redirect ( 'Dashboard/gymMembers' );
	}
}
?>