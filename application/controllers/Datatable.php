<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('categorias_model','modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();

		$this->load->model('datatable_model','modeltable');
		//$this->veiculos = $this->modeltable->listar_veiculos();

	}

	public function index()
	{
		$dados['categorias'] = $this->categorias;

		$dados['veiculos'] = $this->modeltable->listar_veiculos();

		//echo '<pre>';
		//var_dump($dados['veiculos']);
		//echo '</pre>';

		//$this->load->model('publicacoes_model','modelpublicacoes');
		//$dados['postagem'] = $this->modelpublicacoes->destaques_home();

		//Dados a serem enviados para o cabeçalho
		$dados['titulo'] = 'Página Inicial';
		$dados['subtitulo'] = 'Postagens Recentes';

		

		$this->load->view('frontend/template/html-header',$dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/datatable');
		//$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}


}
