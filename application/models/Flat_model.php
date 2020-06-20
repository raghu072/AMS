<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Flat_model extends CI_Model {
	public function getFlats() {
		$this->db->select ( '*' );
		$this->db->order_by ( 'block' );
		$query = $this->db->get ( 'flat' );
		$data = $query->result_array ();
		return $data;
	}
	public function addFlat() {
		$data = array (
				'flat_number' => $this->input->post ( 'flat_number' ),
				'block' => strtoupper ( $this->input->post ( 'block' ) ),
				'description' => $this->input->post ( 'description' )
		);
		$this->db->insert ( 'flat', $data );
	}
	public function editFlat($block, $flatNumber) {
		$this->db->where ( 'flat_number', $flatNumber );
		$this->db->where ( 'block', $block );

		$query = $this->db->get ( 'flat' );
		return $query->row_array ();
	}
	public function updateFlat($block, $flatNumber) {
		$data = array (
				'flat_number' => $this->input->post ( 'flat_number' ),
				'block' => strtoupper ( $this->input->post ( 'block' ) ),
				'description' => $this->input->post ( 'description' )
		);

		$this->db->where ( 'flat_number', $flatNumber );
		$this->db->where ( 'block', $block );
		$this->db->update ( 'flat', $data );
	}
}
?>