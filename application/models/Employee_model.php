<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Employee_model extends CI_Model {
	public function login($username, $password, $userType) {
		$this->db->where ( "emp_username", $username );
		$this->db->where ( "emp_password", md5 ( $password ) );

		$result = $this->db->get ( "employee" );
		$data = $result->result_array ();

		if ($result->num_rows () == 1) {
			return $data [0] ["emp_id"];
		} else {
			return FALSE;
		}
	}
	public function getEmployees() {
		$this->db->select ( 'emp_id,emp_name,emp_username,contact,salary,joined_date,shift_type,shift_start_time,shift_end_time,is_active' );
		$this->db->where ( 'is_active', 1 );
		$query = $this->db->get ( 'employee' );
		return $query->result_array ();
	}
	public function addEmployee() {
		$data = array (
				'emp_name' => $this->input->post ( 'emp_name' ),
				'emp_username' => $this->input->post ( 'emp_username' ),
				'contact' => $this->input->post ( 'contact' ),
				'salary' => $this->input->post ( 'salary' ),
				'joined_date' => $this->input->post ( 'joined_date' ),
				'shift_start_time' => $this->input->post ( 'shift_start_time' ),
				'shift_end_time' => $this->input->post ( 'shift_end_time' ),
				'password' => $this->input->post ( 'password' ),
				'address' => $this->input->post ( 'address' )
		);
		$this->db->insert ( 'employee', $data );
	}
	public function getEmployee($username) {
		$this->db->select ( 'emp_id, emp_name, emp_username' );
		$this->db->where ( 'emp_username', $username );
		$query = $this->db->get ( "employee" );
		$data = $query->result_array ();
		return $data;
	}
	public function getEmployeeById($empID) {
		$this->db->select ( 'emp_id,emp_name,emp_username,contact,salary,address,joined_date,shift_type,shift_start_time,shift_end_time,is_active' );
		$this->db->where ( 'emp_id', $empID );
		$query = $this->db->get ( "employee" );
		$data = $query->row_array ();
		return $data;
	}
	public function updateEmployee($empID) {
		$password = $this->input->post ( 'password' );
		if (strlen ( $password ) > 0) {
			$data = array (
					'emp_name' => $this->input->post ( 'emp_name' ),
					'emp_username' => $this->input->post ( 'emp_username' ),
					'contact' => $this->input->post ( 'contact' ),
					'salary' => $this->input->post ( 'salary' ),
					'joined_date' => date ( 'Y-m-d', strtotime ( $this->input->post ( 'joined_date' ) ) ),
					'shift_start_time' => $this->input->post ( 'shift_start_time' ),
					'shift_end_time' => $this->input->post ( 'shift_end_time' ),
					'emp_password' => md5 ( $password ),
					'address' => $this->input->post ( 'address' )
			);
		} else {
			$data = array (
					'emp_name' => $this->input->post ( 'emp_name' ),
					'emp_username' => $this->input->post ( 'emp_username' ),
					'contact' => $this->input->post ( 'contact' ),
					'salary' => $this->input->post ( 'salary' ),
					'joined_date' => date ( 'Y-m-d', strtotime ( $this->input->post ( 'joined_date' ) ) ),
					'shift_start_time' => $this->input->post ( 'shift_start_time' ),
					'shift_end_time' => $this->input->post ( 'shift_end_time' ),
					'address' => $this->input->post ( 'address' )
			);
		}
		$this->db->where ( 'emp_id', $empID );
		$this->db->update ( 'employee', $data );
	}
	public function deleteEmployee($empID) {
		$data = array (
				'is_active' => 0
		);
		$this->db->where ( 'emp_id', $empID );
		$this->db->update ( 'employee', $data );
	}
}
?>