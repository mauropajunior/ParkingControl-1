<?php

class Convenio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function salva_convenio() {
        $data = array(
            #'placa' => strtoupper($this->input->post('placa')),
            #'data' => date('Y/m/d H:m:s')
            'companhia' => $this->input->post('companhia'),
            'cnpj' => $this->input->post('cnpj'),
            'percentual_desconto' => $this->input->post('desconto'),
            'data_registro' => date('Ymd'),
            'ativo' => 1
        );

        $query = "SELECT * FROM tb_convenio WHERE cnpj = ?";
        $r = $this->db->query($query, array($data['cnpj']));

        if ($r->num_rows() == 0) {
            $this->db->insert('tb_convenio', $data);
            return "Convênio cadastrado com sucesso.";
        } else {
            return "Convênio já cadastrado para o CNPJ: " . strtoupper($data['cnpj']) . ".";
        }
    }

}
