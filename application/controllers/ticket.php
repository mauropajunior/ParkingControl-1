<?php
class Ticket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ticket_model');
	}
	
	public function cadastrar()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('placa', 'Placa', 'required');
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_message('required', 'Campo %s obrigatório.');
			$this->load->view('templates/header');
			$this->load->view('pages/ticket');
			$this->load->view('templates/footer');
		}
		else
		{
			$dados['msg'] = $this->ticket_model->gera_ticket();
			
			$this->load->view('templates/header');
			$this->load->view('pages/ticket', $dados);
			$this->load->view('templates/footer');
		}
		
	}
	public function cobrar()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('placa', 'Placa', 'required');
	
		if ($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_message('required', 'Campo %s obrigatório.');
			$this->load->view('templates/header');
			$this->load->view('pages/ticket');
			$this->load->view('templates/footer');
		}
		else
		{
			$dados['msg'] = $this->ticket_model->cobrar_ticket();
			
			$this->load->view('templates/header');
			$this->load->view('pages/ticket', $dados);
			$this->load->view('templates/footer');
		}
		
	}
}
?>