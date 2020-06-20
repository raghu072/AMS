<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Block extends CI_Controller {
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
	public function getBlocks() {
		$data ['title'] = 'AMS Block';
		$data ['pageTitle'] = 'Block List';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['block'] = 'Block';
		$data ['blockList'] = 'Block List';

		$data ['userDetails'] = $this->setUserData ();
		$data ['blocks'] = $this->Block_model->getBlocks ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'block/block_list', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function addNewBlock() {
		$data ['title'] = 'AMS Block';
		$data ['pageTitle'] = 'Add New Block';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['module'] = 'Block';
		$data ['addBlock'] = 'Add Block';

		$data ['userDetails'] = $this->setUserData ();

		$this->form_validation->set_rules ( "block_name", "Block", "required" );
		$this->form_validation->set_rules ( "floors", "Number of floors", "required" );
		$this->form_validation->set_rules ( "flat_per_floors", "Flat per floors", "required" );

		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'block/add_block', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->Block_model->addBlock ();
			$this->session->set_flashdata ( 'block_inserted', 'New block created' );
			redirect ( 'Block/getBlocks' );
		}
	}
	public function editBlock($block) {
		$data ['title'] = 'AMS Block';
		$data ['pageTitle'] = 'Edit Block';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['module'] = 'Block';

		$data ['userDetails'] = $this->setUserData ();

		$data ['editBlock'] = $this->Block_model->editBlock ( $block );

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'block/edit_block', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function updateBlock($blockName) {
		$this->Block_model->updateBlock ( $blockName );
		$this->session->set_flashdata ( 'block_updated', 'Block updated' );
		redirect ( 'Block/getBlocks' );
	}
	public function deleteBlock($blockName) {
		$this->Block_model->deleteBlock ( $blockName );
		$this->session->set_flashdata ( "block_deleted", "Block has been deleted" );
		redirect ( "Block/getBlocks" );
	}
}
?>