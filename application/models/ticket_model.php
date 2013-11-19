<?php
class Ticket_model extends CI_Model 
{

	public function __construct()
	{
		$this->load->database();
	}
	
	public function gera_ticket()
	{
		$data = array(
    		'placa' => strtoupper($this->input->post('placa')),
    		'data' => date('Y/m/d H:m:s')
		);
		$query = "SELECT * FROM tb_ticket WHERE placa = ? AND pago = '0'";
		$r = $this->db->query($query, array($data['placa'])); 
		if ($r->num_rows() == 0)
		{
			$this->db->insert('tb_ticket', $data);
			return "Ticket cadastrado com sucesso.";
		}
		else
		{
			return "O carro ".strtoupper($data['placa'])." ainda está no estacionamento.";	
		}
			
	}
	
	public function cobrar_ticket()
	{
		$data = array(
    		'placa' => strtoupper($this->input->post('placa')),
    		'data' => date('Y/m/d H:m:s')
		);
		$query = "SELECT TIMESTAMPDIFF(MINUTE,data, NOW()) AS minutos FROM tb_ticket WHERE placa = ? AND pago = '0'";
		$r = $this->db->query($query, array($data['placa']));
		
		$query2 = "SELECT hora1, demais_horas FROM tb_precos";
		$r2 = $this->db->query($query2);
		$precos = $r2->row_array();
				  
		if ($r->num_rows() == 1)
		{
			$tempo = $r->row_array();
			$totalminutos = $tempo['minutos'];
			if ($totalminutos <= 60)
			{ 
				$cobranca = $precos['hora1'];
			}
			else
			{
				// Cobrança é igual ao preço da primeira hora + preço das demais horas, inclusive fração
				$cobranca = $precos['hora1'] + ((int)(($totalminutos - 60)/60)) * $precos['demais_horas'];
				if (($totalminutos - 60)%60 > 1)
					$cobranca += $precos['demais_horas']; 
			}
			//$this->db->insert('tb_ticket', $data);
			return "Placa: ".$data['placa']."<br>Tempo estacionado: ".number_format($totalminutos/60.0, 2, ',', '.')." h<br>Valor: R$ ". number_format($cobranca,2, ',', '.');
		}
		else
		{
			return "Carro ".strtoupper($data['placa'])." não está no estacionamento.";	
		}
		
	}
}
