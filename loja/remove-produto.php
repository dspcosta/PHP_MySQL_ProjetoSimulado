<?php require_once("cabecalho.php");
#require_once("banco-produto.php");
require_once("logica-usuario.php");
require_once("class/produto.php");


#$produto = new Produto();
$id = $_POST['id'];
$produtoDao = new ProdutoDao($conexao);


$produtoDao->RemoveProduto($id);
$_SESSION["success"] = "produto {$id} removido com sucesso.";

header("Location: produto-lista.php");

die(); //interrompe o php, sempre apos um location fazer um die.
?>



