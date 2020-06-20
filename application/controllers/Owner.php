<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Owner extends CI_Controller {
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
	public function ownerList() {
		/*
		 * if (! $this->session->userdata ( "logged_in" )) {
		 * redirect ( "users/login" );
		 * }
		 */
		$data ['title'] = 'AMS Owner';
		$data ['pageTitle'] = 'AMS Owner List';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Owner';
		$data ['text2'] = 'Owner List';

		$data ['userDetails'] = $this->setUserData ();

		$data ['owners'] = $this->Owner_model->getOwners ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'owner/owner_list', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function addOwner() {
		$data ['title'] = 'AMS ADD Owner';
		$data ['pageTitle'] = 'ADD Owner';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Owner';
		$data ['text2'] = 'Add Owner';

		$data ['userDetails'] = $this->setUserData ();

		$this->form_validation->set_rules ( "owner_name", "Owner Name", "required" );
		$this->form_validation->set_rules ( "email", "Email", "required" );
		$this->form_validation->set_rules ( "contact", "Phone Number", "required" );
		$this->form_validation->set_rules ( "flat_owned", "Flat Number", "required" );
		$this->form_validation->set_rules ( "block", "Block", "required" );
		$this->form_validation->set_rules ( "owned_date", "Bought Date", "required" );
		$this->form_validation->set_rules ( "password", "Password", "required" );

		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'owner/add_owner', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->Owner_model->addOwner ();
			// set flash data
			redirect ( 'Owner/ownerList' );
		}
	}
	public function editOwner($flat) {
		$data ['title'] = 'AMS Edit Owner';
		$data ['pageTitle'] = 'AMS Owner List';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Owner';
		$data ['text2'] = 'Edit Owner';

		$data ['userDetails'] = $this->setUserData ();

		$block = $flat [0];
		$flatNumber = $flat [1] . $flat [2] . $flat [3];

		$data ['ownerData'] = $this->Owner_model->editOwner ( $block, $flatNumber );
		$data ['flatDetails'] = $this->Flat_model->editFlat ( $block, $flatNumber );

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'owner/edit_owner', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function updateOwner($flat) {
		$block = $flat [0];
		$flatNumber = $flat [1] . $flat [2] . $flat [3];
		$this->Owner_model->updateOwner ( $block, $flatNumber );
		redirect ( 'Owner/ownerList' );
	}
	public function deleteOwner($flat) {
		$block = $flat [0];
		$flatNumber = $flat [1] . $flat [2] . $flat [3];
		$this->Owner_model->deleteOwner ( $block, $flatNumber );
		redirect ( 'Owner/ownerList' );
	}
	public function checkFlatOwned() {
		$flat = $this->input->post ();
		$flatNumber = $flat ['flat'];
		$blockName = $flat ['block_name'];
		$flatSoldFlag = $this->Owner_model->isFlatSold ( $flatNumber, $blockName );
		echo $flatSoldFlag;
	}
}
?>