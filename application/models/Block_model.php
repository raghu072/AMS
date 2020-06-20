<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Block_model extends CI_Model {
	public function getBlocks() {
		$this->db->select ( '*' );
		$this->db->order_by ( 'block_name' );
		$query = $this->db->get ( 'block' );
		$data = $query->result_array ();
		return $data;
	}
	public function addBlock() {
		$data = array (
				'block_name' => $this->input->post ( 'block_name' ),
				'total_floors' => $this->input->post ( 'floors' ),
				'flats_per_floor' => $this->input->post ( 'flat_per_floors' )
		);

		$this->db->insert ( 'block', $data );
	}
	public function editBlock($block) {
		$this->db->where ( "block_name", $block );

		$result = $this->db->get ( "block" );
		$data = $result->result_array ();
		return $data;
	}
	public function updateBlock($blockName) {
		$data = array (
				'block_name' => $this->input->post ( 'block_name' ),
				'total_floors' => $this->input->post ( 'floors' ),
				'flats_per_floor' => $this->input->post ( 'flat_per_floors' )
		);

		$this->db->where ( "block_name", $this->input->post ( "block_name" ) );
		$this->db->update ( 'block', $data );
	}
	public function deleteBlock($blockName) {
		$this->db->where ( "block_name", $blockName );
		$this->db->delete ( "block" );
		return true;
	}
}
?>