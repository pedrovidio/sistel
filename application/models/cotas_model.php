<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotas_model extends CI_Model {
	private $table = 'cotas';
	function __construct()
	{
		parent::__construct();
	}

	public function all() {
    return $this->db->get($this->table)->result_array();
	}

	public function findUfTipo() {
		$this->db->distinct();
		$this->db->select('uf,tipo_publico');
		$rows = $this->db->get('respondentes')->result();
		
		foreach($rows as $key => $cota){
			$cotas[] = $cota->tipo_publico.'-'.$cota->uf;
		}
		return $cotas;
	}

	public function findById($id) {
		$this->db->where('id', $id);
		$data = $this->db->get($this->table)->result_array();

		return $data[0];
	}

	public function findOneUfTipo($cota) {
		$this->db->where('cotas', $cota);
		return $this->db->get($this->table)->result();
	}

	public function add($data){
		$this->db->insert($this->table, $data);
    return $this->db->insert_id();
	}

	public function updateCotaRespondentes($ufTipo, $statusCota){
		$respondentes['statusCota'] = $statusCota;
		$this->db->where('ufTipo',$ufTipo);
		return $this->db->update('respondentes', $respondentes);
	}

	public function update($id, $data){
		$this->db->where('id',$id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}
}
