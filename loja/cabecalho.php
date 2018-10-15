<html>
<?php  
error_reporting(E_ALL ^ E_NOTICE); #reporta todos os erros, exceto o o notice, como estava ocorrendo.
require_once("mostra-alerta.php");
require_once("conecta.php");

function carregaClasse($nomeDaClasse){
    require_once("class/".$nomeDaClasse.".php");
}

spl_autoload_register("carregaClasse");

?>
<head>
        <meta charset="UTF-8">
        <title>Minha loja</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/loja.css">
    
    </head>
    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container" >
                <div class= "navbar-header">
                    <a class="navbar-brand" href="index.php">Minha Loja</a>
                </div>
                <div>
                       <ul class="nav navbar-nav">
                            <li><a href="produto-formulario.php">Adiciona Produto</a></li>
                            <li><a href="contato.php">Contato</a></li>
                            <li><a href="produto-lista.php">Produtos</a></li>
                       </ul>
                </div>
                    
                
            </div>
        </div>

        <div class="container">
            <div class="principal">
            <?php mostraAlerta("success");?>
           <?php mostraAlerta("danger"); ?>