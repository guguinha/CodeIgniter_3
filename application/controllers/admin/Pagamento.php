<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamento extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('categorias_model','modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();

	}

	public function index()
	{
		$this->load->library('table');
		// $dados['categorias'] = $this->categorias;
		// $this->load->model('publicacoes_model','modelpublicacoes');
		// $dados['postagem'] = $this->modelpublicacoes->destaques_home();

		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Página de Pagamento';
		$dados['subtitulo'] = 'PayPal';

		$this->load->view('backend/template/html-header',$dados);
		$this->load->view('backend/template/template');
		$this->load->view('backend/pagamento');
		$this->load->view('backend/template/html-footer');
	}

}
