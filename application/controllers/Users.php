<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Users extends CI_Controller {
	function __construct() {
		parent::__construct ();
	}
	public function login() {
		$this->form_validation->set_rules ( "username", "Name", "required" );
		$this->form_validation->set_rules ( "password", "Password", "required" );
		$this->form_validation->set_rules ( "ddlLoginType", "User type", "required" );

		$data ['title'] = 'Appartment Management System';

		if ($this->form_validation->run () === FALSE) {
			$this->load->view ( 'users/login', $data );
		} else {
			$username = $this->input->post ( "username" );
			$userType = $this->input->post ( "ddlLoginType" );
			$password = $this->input->post ( "password" );

			if ($userType == 'A') {
				$userId = $this->Admin_model->login ( $username, $password, $userType );
			} else if ($userType == 'O') {
				$userId = $this->Owner_model->login ( $username, $password, $userType );
			} else if ($userType == 'E') {
				$userId = $this->Employee_model->login ( $username, $password, $userType );
			} else {
				$userId = $this->Tenent_model->login ( $username, $password, $userType );
			}

			if ($userId) {
				$userData = array (
						'userId' => $userId,
						'username' => $username,
						'userType' => $userType,
						'logged_in' => TRUE
				);
				// set session data
				$this->session->set_userdata ( $userData );
				// set flash message
				$this->session->set_flashdata ( "login_success", "You are now logged in" );
				redirect ( 'Dashboard/index' );
			} else {
				// set flash message
				$this->session->set_flashdata ( "failed_login", "login failed" );
				redirect ( 'users/login' );
			}
		}
	}
	public function logout() {
		$this->session->unset_userdata ( "logged_in" );
		$this->session->unset_userdata ( "userId" );
		$this->session->unset_userdata ( "username" );
		$this->session->unset_userdata ( "userType" );

		$this->session->set_flashdata ( "user_logged_out", "You are now logged out" );
		redirect ( "users/login" );
	}
}
?>