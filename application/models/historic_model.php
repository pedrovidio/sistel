<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historic_model extends CI_Model {
  private $table = 'logs';

  function __construct()
	{
		parent::__construct();
  }
  
  public function all(){
    $this->db->select('logs.id as log_id, respondentes.handle, respondentes.nome_participante, respondentes.municipio, respondentes.uf, respondentes.status, respondentes.statusCota, logs.statusLigacao, opers.user, logs.created_at');
    $this->db->join('respondentes', 'respondentes.id = logs.respondentes_id');
    $this->db->join('opers', 'opers.id = logs.opers_id');
    $this->db->where('logs.statusLigacao <> "Finalizado"');
    return $this->db->get($this->table)->result_array();
  }

  public function update($id){
    $this->db->where('id', $id);
    $log['statusLigacao'] = "Cancelado";
		return $this->db->update($this->table, $log);
	}
}
