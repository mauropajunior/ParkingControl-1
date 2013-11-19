<?php

class Convenio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('convenio_model');
    }

    public function cadastrar() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('companhia', 'Companhia', 'required');
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required');
        $this->form_validation->set_rules('desconto', 'Desconto', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_message('required', 'Campo %s obrigatório.');
            #$this->load->view('templates/header');
            $this->load->view('pages/convenio');
            #$this->load->view('templates/footer');
        } else {
            $dados['msg'] = $this->convenio_model->salva_convenio();

            $this->load->view('templates/header');
            $this->load->view('pages/convenio', $dados);
            $this->load->view('templates/footer');
        }
    }

    public function lista() {
        $r = $this->convenio_model->listaConvenios();
        if ($r->num_rows() == 0) {
            $dados['msg'] = 'Não há dados cadastrados';
            $this->load->view('templates/header');
            $this->load->view('pages/convenio', $dados);
            $this->load->view('templates/footer');
        } else {
            $dados['msg'] = $r;
            $this->load->view('templates/header');
            $this->load->view('pages/convenio', $dados);
            $this->load->view('templates/footer');
        }
    }

}
