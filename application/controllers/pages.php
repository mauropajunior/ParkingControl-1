<?php

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ticket_model');
	}

	public function view($page = 'home')
	{
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Página não existente
			show_404();
		}
		
		#$this->load->view('templates/header');
		$this->load->view('pages/'.$page);
		#$this->load->view('templates/footer');
                $this->load->view('templates/cabecalho');

	}
	
	
}
