<?php require_once("cabecalho.php");
require_once('logica-usuario.php');
#require_once("banco-produto.php");
require_once("class/produto.php");
require_once("class/categoria.php");


verificaUsuario();

$tipoProduto = $_POST["tipoProduto"];

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipoProduto, $_POST);    
$produto->atualizaBaseadoEm($_POST);
  

$produto->getCategoria()->setId($_POST["categoria_id"]);


    if (array_key_exists('usado', $_POST)) {
        
        $produto->setUsado("true");
    } else{
        $produto->setUsado("false");
       
    }

$produtoDao = new ProdutoDao($conexao);
  

  if($produtoDao->InsereProdutos($produto)){ 
      
      ?>
      <p class="adicionado-sucesso">O produto <?= $produto->getNome()?>, <?= $produto->getPreco()?>, foi adicionado com sucesso!</p>
 <?php } else { 
        $msgerro = mysqli_error($conexao);
     ?>
      
    <p class="adicionado-erro">O produto <?= $produto->getNome()?> não foi adicionado! Erro: <?= $msgerro?> </p>
      <?php
      
  }
    

   mysqli_close($conexao);
  

    ?>
    

<?php include("rodape.php")?>