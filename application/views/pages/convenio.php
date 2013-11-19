<h2>Cadastro de Convênios</h2>
<?php
$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');

echo validation_errors();
?>
<form action="" method="post" accept-charset="utf-8" id="formconvenio">
    <table width="28%" border="0" align="center">
        <tr>
            <td width="48%">Companhia:</td>
            <td width="52%"><input name="companhia" type="companhia" id="companhia" size="20" maxlength="20" /></td>
        </tr>
        <tr>
            <td width="48%">CNPJ:</td>
            <td width="52%"><input name="cnpj" type="cnpj" id="cnpj" size="20" maxlength="14" /></td>
        </tr>
        <tr>
            <td width="48%">% Desconto:</td>
            <td width="52%"><input name="desconto" type="desconto" id="desconto" size="20" maxlength="3" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="button" name="cadastra" 
                       id="cadastra" value="Cadastrar Convênio" 
                       onclick="document.getElementById('formconvenio')
                                       .setAttribute('action',
                                               'http://localhost:8080/estacionamento/index.php/convenio/cadastrar')
                                       ;
                               document.getElementById('formconvenio').submit();"/>
            </td>
        </tr>
    </table>

</form>

<?php
if (isset($msg))
    echo "<h2>" . $msg . "</h2>";
?>