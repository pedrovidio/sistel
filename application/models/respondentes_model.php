<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respondentes_model extends CI_Model {
	private $table = 'respondentes';

	function __construct()
	{
		parent::__construct();
	}

	public function all() {
    return $this->db->get($this->table)->result_array();
	}

	public function allCount() {
    return $this->db->count_all_results($this->table);
	}

	/** {admin home} {admin lists} */
	public function findByDate($date){
		// die('finalizados hj');
		$respondentes = [];

		$this->db->where('save_dt',$date);
		$respondentes = $this->db->get($this->table)->result_array();

		return $respondentes;
	}

	/** {login} {admin home} {admin lists} */
	public function findAvailables() {
		// die('disponivel');
		$this->db->where('Status','1');
		// $this->db->where('statusLigacao',null);
		$this->db->where('statusCota',true);
    return $this->db->get($this->table)->result_array();
	}

	public function findAvailablesCount() {
		// die('disponivel');
		$this->db->where('Status','1');
		// $this->db->where('statusLigacao',null);
		$this->db->where('statusCota',true);
    return $this->db->count_all_results($this->table);
	}

	/** {admin home} {admin lists} {oper painel} */
	public function findScheduledAll() {
		// die('agendados todos');
		$this->db->where('statusLigacao','Agendado com dia e hora certo');
		$this->db->where('statusCota',true);
		$this->db->order_by('dia', 'asc');
    return $this->db->get($this->table)->result_array();
	}

	public function findScheduledAllCount() {
		// die('agendados todos');
		$this->db->where('statusLigacao','Agendado com dia e hora certo');
		$this->db->where('statusCota',true);
		$this->db->order_by('dia', 'asc');
    return $this->db->count_all_results($this->table);
	}

	/** {oper painel} */
	public function findAvailablesOper($oper) {
		// die('disponivel oper');
		$this->db->where('operador',$oper);
		$this->db->where('Status','1');
		// $this->db->where('statusLigacao',null);
		$this->db->where('statusCota',true);
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit( 25, 0 );
    return $this->db->get($this->table)->result_array();
	}

	/** {oper painel} */
	public function findScheduledOper($oper) {
		// die('agendados oper');
		$this->db->where('operador',$oper);
		$this->db->where('statusLigacao','Agendado com dia e hora certo');
		$this->db->where('statusCota',true);
		$this->db->order_by('dia', 'asc');
		$this->db->limit( 25, 0 );
    return $this->db->get($this->table)->result_array();
	}

	/** {oper painel} */
	public function findUnfinished($oper) {
		// die('andamento');
		$this->db->where('operador',$oper);
		$this->db->where('statusLigacao', 'Entrevista em andamento');
		$this->db->where('statusCota',true);
		$this->db->limit( 25, 0 );
    return $this->db->get($this->table)->result_array();
	}

	/** {admin home} {admin lists} */
	public function findFinished() {
		// die('finalizados');
		$this->db->where('statusLigacao', 'Finalizado');
    return $this->db->get($this->table)->result_array();
	}

	public function findFinishedCount() {
		// die('finalizados');
		$this->db->where('statusLigacao', 'Finalizado');
    return $this->db->count_all_results($this->table);
	}

	/** {oper painel} */
	public function findFinishedOper($oper) {
		// die('finalizados');
		$this->db->where('operador',$oper);
		$this->db->where('statusLigacao', 'Finalizado');
    return $this->db->get($this->table)->result_array();
	}

	/** finish */
	public function findById($id){
		$this->db->where('id',$id);
		$data = $this->db->get($this->table)->result_array();
		
		foreach($data[0] as $key => $val){
			$respondente[$key] = $val;
		}
    return $respondente;
	}

	/** CRUD * Create, Retrive, Update, Destroy */

	public function update($contacts){
		$this->db->update_batch($this->table, $contacts,'id');
		
		return 1;
	}

	public function update_unique($data, $id){
		$this->db->where('id',$id);
		return $this->db->update($this->table, $data);
	}

	public function add($data){
		$this->db->insert('excluded', $data);
    $id = $this->db->insert_id();
		return $id;
	}

	public function delete($id){
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	/** COTA */
	public function ApplyIdCota($idCota,$cota){
		$divideCota = explode("-",$cota);
		$this->db->where('tipo_publico',$divideCota[0]);
		$this->db->where('uf',$divideCota[1]);
		return $this->db->update($this->table, array('cotas_id' => $idCota));
	}
}
