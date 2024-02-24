<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamento extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('medicamento_model');
        
    }
    function add(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $nome   = $this->input->post('nome');
            $fabricante        = $this->input->post('fabricante');
            $forma_farmaceutica = $this->input->post('forma_farmaceutica');
            $efeitos_colaterais = $this->input->post('efeitos_colaterais');
            $descricao         = $this->input->post('descricao');

            $dados = array(
                'nome'=> $nome,
                'fabricante'=> $fabricante,
                'forma_farmaceutica'=> $forma_farmaceutica,
                'efeitos_colaterais'=> $efeitos_colaterais,
                'descricao'=> $descricao
            );

            $status = $this->medicamento_model->insertMedicamento($dados);
            if($status==true){
                $this->session->set_flashdata('success','Bem-sucedido');
                redirect(base_url('medicamento/add'));
            }
            else{
                $this->session->set_flashdata('error','Erro');
                $this->load->view('medicamento/add_medicamento');
            }
        }
        else{
            $this->load->view('medicamento/add_medicamento');
        }

    }
    function index(){
        $dados['medicamentos'] = $this->medicamento_model->getMedicamentos();
        $dados['resultado_busca'] = array();
        
        if($this->input->server('REQUEST_METHOD') == 'POST') {
            
            $nome   = $this->input->post('nome');
            if($nome==''){
                $this->session->set_flashdata('warning', 'Não encontrado');
                
            } else{
                $dados['resultado_busca'] = $this->medicamento_model->getMedicamentos($nome);
            }

            if (empty($dados['resultado_busca'])) {
 
                $this->session->set_flashdata('warning', 'Não encontrado');
                
            }
            
            
            
        }
        $this->load->view('medicamento/index', $dados);
        

       
    }

    function edit($id){
        $dados['medicamento'] = $this->medicamento_model->getMedicamento($id);
        $dados['id'] = $id;
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $nome   = $this->input->post('nome');
            $fabricante        = $this->input->post('fabricante');
            $forma_farmaceutica = $this->input->post('forma_farmaceutica');
            $efeitos_colaterais = $this->input->post('efeitos_colaterais');
            $descricao         = $this->input->post('descricao');

            $dados = array(
                'nome'=> $nome,
                'fabricante'=> $fabricante,
                'forma_farmaceutica'=> $forma_farmaceutica,
                'efeitos_colaterais'=> $efeitos_colaterais,
                'descricao'=> $descricao
            );

            $status = $this->medicamento_model->updateMedicamento($dados, $id);
            if($status==true){
                $this->session->set_flashdata('success','Bem-sucedido');
                redirect(base_url('medicamento/edit/' . $id));
            }
            else{
                $this->session->set_flashdata('error','Erro');
                $this->load->view('medicamento/edit_medicamento/' . $id);
            }
        }
        $this->load->view('medicamento/edit_medicamento', $dados);
    }
    function delete($id){
        if(is_numeric($id)){
            $status = $this->medicamento_model->deleteMedicamento($id);

            if($status==true){
                $this->session->set_flashdata('success');
                redirect(base_url('medicamento/index'));
            }
            else{
                $this->session->set_flashdata('error','Erro');
                redirect(base_url('medicamento/index'));
            }
        }
    }
}
