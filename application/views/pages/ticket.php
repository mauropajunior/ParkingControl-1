<h2>Emitir Ticket - Cobrança por Hora</h2>
<?php 

$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');
		
echo validation_errors(); 

?>
<form action="" method="post" accept-charset="utf-8" id="formplaca">
<table width="28%" border="0" align="center">
  <tr>
    <td width="48%">Placa do Veículo:</td>
    <td width="52%"><input name="placa" type="text" id="placa" size="20" maxlength="7" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="button" name="cadastra" id="cadastra" value="Cadastrar Ticket" onclick="document.getElementById('formplaca').setAttribute('action', 'http://localhost:8080/estacionamento/index.php/ticket/cadastrar');document.getElementById('formplaca').submit();"/><input type="button" name="calcula" id="calcula" value="Calcular Cobrança" onclick="document.getElementById('formplaca').setAttribute('action', 'http://localhost:8080/estacionamento/index.php/ticket/cobrar');document.getElementById('formplaca').submit();" /></td>
    </tr>
</table>

</form>

<?php 
	if (isset($msg))
		echo "<h2>".$msg."</h2>"; 
?>