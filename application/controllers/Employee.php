<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Employee extends CI_Controller {
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
	public function employeeList() {
		$data ['title'] = 'AMS Employee';
		$data ['pageTitle'] = 'AMS Employee List';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Employee';
		$data ['text2'] = 'Employee List';

		$data ['userDetails'] = $this->setUserData ();

		$data ['employees'] = $this->Employee_model->getEmployees ();

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'employee/list_employee', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function addEmployee() {
		$data ['title'] = 'AMS Employee';
		$data ['pageTitle'] = 'AMS Add Employee';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Employee';
		$data ['text2'] = 'Add Employee';

		$data ['userDetails'] = $this->setUserData ();

		$this->form_validation->set_rules ( "emp_name", "Employee Name", "required" );
		$this->form_validation->set_rules ( "emp_username", "Username", "required" );
		$this->form_validation->set_rules ( "contact", "Phone Number", "required" );
		$this->form_validation->set_rules ( "salary", "Salary", "required" );
		$this->form_validation->set_rules ( "joined_date", "Joined Date", "required" );
		$this->form_validation->set_rules ( "shift_start_time", "Shift start time", "required" );
		$this->form_validation->set_rules ( "shift_end_time", "Shift end time", "required" );
		$this->form_validation->set_rules ( "password", "Password", "required" );

		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'templates/header', $data );
			$this->load->view ( 'employee/add_employee', $data );
			$this->load->view ( 'templates/footer' );
		} else {
			$this->Employee_model->addEmployee ();
			redirect ( 'Employee/employeeList' );
		}
	}
	public function editEmployee($id) {
		$data ['title'] = 'AMS Employee';
		$data ['pageTitle'] = 'AMS Edit Employee';
		$data ['homeBreadcam'] = 'Dashboard';
		$data ['text1'] = 'Employee';
		$data ['text2'] = 'Edit Employee';

		$data ['userDetails'] = $this->setUserData ();

		$data ['employee'] = $this->Employee_model->getEmployeeById ( $id );

		$this->load->view ( 'templates/header', $data );
		$this->load->view ( 'employee/edit_employee', $data );
		$this->load->view ( 'templates/footer' );
	}
	public function updateEmployee($empID) {
		$this->Employee_model->updateEmployee ( $empID );
		redirect ( 'Employee/employeeList' );
	}
	public function deleteEmployee($empID) {
		$this->Employee_model->deleteEmployee ( $empID );
		redirect ( "Employee/employeeList" );
	}
}
?>