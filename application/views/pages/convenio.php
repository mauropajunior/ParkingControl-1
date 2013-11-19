<?php 
$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');

echo validation_errors();
?>    
    <!-- Conteúdo -->
    <div id="form">
        <form class="rounded" method="post" action="" accept-charset="utf-8" id="formconvenio">
        <h2>Convênios - Incluir</h2>
        
        <div class="field">
            <label>Companhia:</label>
            <input id="companhia" type="text" class="input" maxlength="60" id="companhia"></input>
        </div>
  
        <div class="field">
            <label>CNPJ:</label>
            <input id="cnpj" type="text" class="input" maxlength="14" id="cnpj"></input>
        </div>
        
        <div class="field">
            <label>Desconto (%):</label>
            <input id="desconto" type="number" class="input" step="0.5" id="convenio"></input>
        </div>
        
        <button type="submit" class="button" name="cadastra"
                id="cadastra" value="Cadastrar"
                onclick="document.getElementById('formconvenio').setAttribute('action', 
                            'http://localhost:8080/estacionamento/index.php/convenio/cadastrar');
                    document.getElementById('formconvenio').submit();"></button>
        </form>
    </div>
    <!-- FimConteúdo -->
</body>
</html>