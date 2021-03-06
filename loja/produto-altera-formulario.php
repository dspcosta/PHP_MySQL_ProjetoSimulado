<?php require_once("cabecalho.php");

require_once("banco-categoria.php");
#require_once("banco-produto.php");
require_once("class/Produto.php");

$id=$_GET['id'];
$produtoDao = new ProdutoDao($conexao);
$categoriaDao = new CategoriaDao($conexao);

$produto = $produtoDao->buscaProduto($id);
$categorias = $categoriaDao->listaCategorias();


$selecao_usado = $produto->isUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado); #operador ternario, semelhante ao if.
?>

        <h1>Alterando Produto</h1>

        <form action="altera-produto.php" method="post">
            <input type="hidden" name="id" value="<?=$produto->getId()?>">
            <table class="table">
                
                <?php include("produto-formulario-base.php");?>

                <tr>
                    <td>
                        <button class = "btn btn-primary" type="submit">Alterar</button>
                    </td>
                </tr>
            </table>
        </form>

<?php include("rodape.php")?>