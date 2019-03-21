<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacao extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logado')){
			redirect(base_url('admin/login'));
		}
		$this->load->model('categorias_model','modelcategorias');
		$this->load->model('publicacoes_model','modelpublicacao');
		$this->categorias = $this->modelcategorias->listar_categorias();
	}

	public function index()
	{
		$this->load->library('table');
		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Painel de Controle';
		$dados['subtitulo'] = 'Publicações';
		$dados['categorias'] = $this->categorias;
		$dados['publicacoes'] = $this->modelpublicacao->listar_publicacoes();

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/publicacao');
		$this->load->view('backend/template/html-footer');
	}


	public function inserir()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-titulo','Titulo','required|min_length[3]');
		$this->form_validation->set_rules('txt-subtitulo','Subtitulo','required|min_length[3]');
		$this->form_validation->set_rules('txt-conteudo','Conteudo','required|min_length[20]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$titulo = $this->input->post('txt-titulo');
			$subtitulo = $this->input->post('txt-subtitulo');
			$conteudo = $this->input->post('txt-conteudo');
			$datapub = $this->input->post('txt-data');
			$categoria =$this->input->post('select-categoria');
			$userpub = $this->input->post('txt-usuario');
			if($this->modelpublicacao->adicionar($titulo,$subtitulo,$conteudo,$datapub,$categoria,$userpub)){
				redirect(base_url('admin/publicacao'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}

	}

	public function excluir($id){
		if($this->modelpublicacao->excluir($id)){
			redirect(base_url('admin/publicacao'));
		}else{
			echo "Houve um erro no sistema!";
		}

	}
	

	public function alterar($id){
		$this->load->library('table');
		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Painel de Controle';
		$dados['subtitulo'] = 'Publicação';
		$dados['categorias'] = $this->modelcategorias->listar_categorias();
		$dados['publicacoes'] = $this->modelpublicacao->listar_publicacao($id);

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/alterar-publicacao');
		$this->load->view('backend/template/html-footer');
	}

	public function salvar_alteracoes(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-categoria','Nome da Categoria','required|min_length[3]|is_unique[categoria.titulo]');
		if($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$titulo = $this->input->post('txt-categoria');
			$id = $this->input->post('txt-id');
			if($this->modelcategorias->alterar($titulo,$id)){
				redirect(base_url('admin/categoria'));
			}else{
				echo "Houve um erro no sistema!";
			}
		}
	}


}
