<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Tenent extends CI_Controller {
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
	public function tenentList() {
		$data ['title'] = 'AMS Tenent';
		$data ['pageTitle'] = 'AMS Tenents';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Tenent';
		$data ['text2'] = 'Tenent List';

		$data ['userDetails'] = $this->setUserData ();

		$data ['tenents'] = $this->Tenent_model->getTenents ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'tenent/list_tenent', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function addTenent() {
		$data ['title'] = 'AMS Tenent';
		$data ['pageTitle'] = 'AMS Tenents';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Tenent';
		$data ['text2'] = 'Add Tenent';

		$data ['userDetails'] = $this->setUserData ();

		$this->form_validation->set_rules ( "tenent_name", "Tenent Name", "required" );
		$this->form_validation->set_rules ( "email", "Email", "required" );
		$this->form_validation->set_rules ( "contact", "Phone Number", "required" );
		$this->form_validation->set_rules ( "flat_moved", "Flat Number", "required" );
		$this->form_validation->set_rules ( "block", "Block", "required" );
		$this->form_validation->set_rules ( "moved_date", "Moved Date", "required" );
		$this->form_validation->set_rules ( "password", "Password", "required" );

		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'tenent/add_tenent', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->Tenent_model->addTenent ();
			redirect ( 'Tenent/tenentList' );
		}
	}
	public function editTenent($flat) {
		$data ['title'] = 'AMS Tenent';
		$data ['pageTitle'] = 'AMS Tenents';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Tenent';
		$data ['text2'] = 'Edit Tenent';

		$data ['userDetails'] = $this->setUserData ();

		$block = $flat [0];
		$flatNumber = $flat [1] . $flat [2] . $flat [3];

		$data ['tenentData'] = $this->Tenent_model->editTenent ( $block, $flatNumber );
		// $data ['flatDetails'] = $this->Flat_model->editFlat ( $block, $flatNumber );

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'tenent/edit_tenent', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function updateTenent($flat) {
		$block = $flat [0];
		$flatNumber = $flat [1] . $flat [2] . $flat [3];

		$this->form_validation->set_rules ( "tenent_name", "Tenent Name", "required" );
		$this->form_validation->set_rules ( "email", "Email", "required" );
		$this->form_validation->set_rules ( "contact", "Phone Number", "required" );
		$this->form_validation->set_rules ( "flat_moved", "Flat Number", "required" );
		$this->form_validation->set_rules ( "block", "Block", "required" );
		/*
		 * $this->form_validation->set_rules ( "moved_date", "Moved Date", "required" );
		 * $this->form_validation->set_rules ( "password", "Password", "required" );
		 */

		if ($this->form_validation->run () === FALSE) {
			$this->editTenent ( $flat );
		} else {
			$this->Tenent_model->updateTenent ( $block, $flatNumber );
			redirect ( 'Tenent/tenentList' );
		}
	}
	public function deleteTenent($flat) {
		$block = $flat [0];
		$flatNumber = $flat [1] . $flat [2] . $flat [3];
		$this->Tenent_model->deleteTenent ( $block, $flatNumber );
		redirect ( 'Tenent/tenentList' );
	}
	public function checkFlatMoved() {
		$flat = $this->input->post ();
		$flatNumber = $flat ['flat'];
		$blockName = $flat ['block_name'];
		$flatSoldFlag = $this->Tenent_model->hasTenentMoved ( $flatNumber, $blockName );
		echo $flatSoldFlag;
	}
}
?>