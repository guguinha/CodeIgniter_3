<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('categorias_model','modelcategorias');
		$this->categorias = $this->modelcategorias->listar_categorias();
		$this->load->model('usuarios_model','modelusuarios');

	}

	public function index()
	{
		$dados['categorias'] = $this->categorias;		
		$dados['autores'] = $this->modelusuarios->listar_autores();
		$dados['titulo'] = 'Teste';

		$this->load->view('frontend/template/html-header',$dados);
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/teste');
		$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
		
	
	}

	

}
