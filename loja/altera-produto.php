<?php require_once("cabecalho.php");

  #require_once("banco-produto.php");
   require_once("class/produto.php");
   require_once("class/categoria.php");
   
   $tipoProduto = $_POST['tipoProduto'];
   $produto_id = $_POST['id'];
   $categoria_id = $_POST['categoria_id'];
   
   $factory = new ProdutoFactory();
   $produto = $factory->criaPor($tipoProduto, $_POST);
   $produto->atualizaBaseadoEm($_POST);
   
   $produto->setId($produto_id);
   $produto->getCategoria()->setId($categoria_id);
    
    if(array_key_exists('usado', $_POST)) {
        $produto->setUsado("true");
    } else {
        $produto->setUsado("false");
    }
    
    $produtoDao = new ProdutoDao($conexao);

  if($produtoDao->alteraProduto($produto)){ 
      
      ?>
      <p class="adicionado-sucesso">O produto <?=$produto->getNome()?>, <?=$produto->getPreco()?>, foi alterado com sucesso!</p>
 <?php } else { 
        $msgerro = mysqli_error($conexao);
     ?>
      
    <p class="adicionado-erro">O produto <?=$produto->getNome()?> não foi alterado! Erro: <?= $msgerro?> </p>
      <?php
      
  }
    

   mysqli_close($conexao);
  

    ?>
    

<?php include("rodape.php")?>