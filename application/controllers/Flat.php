<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Flat extends CI_Controller {
	function __construct() {
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
	public function flatList() {
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['title'] = 'AMS Flats List';
		$data ['pageTitle'] = 'AMS Flats List';
		$data ['text1'] = 'Flat';
		$data ['text2'] = 'Flat List';
		$data ['userDetails'] = $this->setUserData ();

		$data ['flats'] = $this->Flat_model->getFlats ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'flat/flat_list', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function addFlat() {
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['title'] = 'AMS Add Flat';
		$data ['pageTitle'] = 'AMS Add Flat';
		$data ['text1'] = 'Flat';
		$data ['text2'] = 'Add Flat';
		$data ['userDetails'] = $this->setUserData ();

		$this->form_validation->set_rules ( "flat_number", "Flat Number", "required" );
		$this->form_validation->set_rules ( "block", "Block", "required" );
		$this->form_validation->set_rules ( "description", "Description", "required" );

		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'flat/add_flat', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->Flat_model->addFlat ();
			$this->session->set_flashdata ( 'flat_inserted', 'Flat created' );
			redirect ( 'Flat/flatList' );
		}
	}
	public function editFlat($flat) {
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['title'] = 'AMS Edit Flat';
		$data ['pageTitle'] = 'AMS Edit Flat';
		$data ['text1'] = 'Flat';
		$data ['text2'] = 'Edit Flat';

		$data ['userDetails'] = $this->setUserData ();

		$block = $flat [0];
		$flatNumber = $flat [1] . $flat [2] . $flat [3];

		$data ['flatData'] = $this->Flat_model->editFlat ( $block, $flatNumber );

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'flat/edit_flat', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function updateFlat($flat) {
		$block = $flat [0];
		$flatNumber = $flat [1] . $flat [2] . $flat [3];

		$this->Flat_model->updateFlat ( $block, $flatNumber );
		redirect ( 'Flat/flatList' );
	}
}
?>