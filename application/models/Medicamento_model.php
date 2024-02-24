<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamento_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function insertMedicamento($dados){
        $this->db->insert('medicamentos', $dados);
        if($this->db->affected_rows()>0){
            return true;
        } 
        else{
            return false;
        }
    }

    function getMedicamentos($arg1 = null){
        if ($arg1 != null){
            $this->db->like('nome', $arg1);
            $query = $this->db->get('medicamentos');
            if ($this->db->affected_rows()>0){
                return $query->result_array();
            }
            else{
                return null;
            }
            
        }
        else{
            $query = $this->db->get('medicamentos');
            return $query->result_array();
        }
    }
    function getMedicamento($id){
        $this->db->where('id', $id);
        $query = $this->db->get('medicamentos');
        return $query->row();
        
    }


    function updateMedicamento($dados, $id){
        $this->db->where('id', $id);
        $this->db->update('medicamentos', $dados);
        if($this->db->affected_rows()>=0){
            return true;
        } 
        else{
            return false;
        }
    }

    function deleteMedicamento($id){
        $this->db->where('id', $id);
        $this->db->delete('medicamentos');
        if($this->db->affected_rows()>0){
            return true;
        } 
        else{
            return false;
        }
    }
}