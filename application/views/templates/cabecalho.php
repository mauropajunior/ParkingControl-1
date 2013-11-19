<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>.: Controle de Estacionamento :.</title>
    <script src="js/menu.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(function($){
            $("#data").mask("99/99/9999");
            $("#placaVeiculo").mask("aaa-9999");
            $("#cpf").mask("999.999.999-99");
            $("#cnpj").mask("99.999.999/9999-99");
        });
	</script>
        <link rel="stylesheet" type="text/css" href="../../../assets/css/estilo.css">
        
<head>
<body>
    <!-- Cabeçalho -->
    <div id="cabecalho">
        <h1>
            <img alt="Logo" style="width: 64px; heigth: 64px;" src="../../../assets/img/logo.png" /> Controle de Estacionamento
        </h1>
    </div>
    <!-- FimCabeçalho -->
    
    <!-- Menu -->
    <div id="sse2">
        <div id="sses2">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="tickets.php">Tickets</a></li>
                <li><a href="mensalistas.php">Mensalistas</a></li>
                <li><a href="convenios.php">Convênios</a></li>
                <li><a href="precos.php">Preços</a></li>
            </ul>
        </div>
    </div>
    <!-- FimMenu -->