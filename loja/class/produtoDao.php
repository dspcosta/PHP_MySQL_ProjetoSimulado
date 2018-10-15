<?php

class ProdutoDao{
    
    private $conexao;

    function __construct($conexao){
        $this->conexao = $conexao;

    }
    function listaProdutos(){
        $resultadoQuery = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias
        as c on c.id=p.categoria_id");
        $produtos = array();
        //pega o produto associado ao resultado
        while ($produto_array = mysqli_fetch_assoc($resultadoQuery)) {

          
            $tipoProduto = $produto_array['tipoProduto'];
            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipoProduto, $produto_array);    
            $produto->atualizaBaseadoEm($produto_array);
            
            $produto_id = $produto_array['id'];
                 
            $produto->setId($produto_id);
            $produto->getCategoria()->setNome($produto_array['categoria_nome']);
        

            array_push($produtos,$produto);
        }
        

            return $produtos;
        
        }

        



    function InsereProdutos(Produto $produto) {
        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $taxaImpressao = "";
        if ($produto->temTaxaimpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $waterMark = "";
        if ($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $tipoProduto = get_class($produto);
        #var_dump($tipoProduto);

        $query = "insert into produtos (nome,preco,descricao,categoria_id, usado, isbn, tipoProduto, taxaImpressao, waterMark) values ('{$produto->getNome()}', {$produto->getPreco()}, '{$produto->getDescricao()}', 
        {$produto->getCategoria()->getId()}, {$produto->isUsado()}, '{$isbn}', '{$tipoProduto}','{$taxaImpressao}', '{$waterMark}')";
           
        return mysqli_query($this->conexao, $query);
    }


    function alteraProduto(Produto $produto) {

        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $taxaImpressao = "";
        if ($produto->temTaxaimpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $waterMark = "";
        if ($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $tipoProduto = get_class($produto);
        var_dump($tipoProduto);

        $query = "update produtos set nome='{$produto->getNome()}', preco = {$produto->getPreco()}, descricao = '{$produto->getDescricao()}', 
        categoria_id = {$produto->getCategoria()->getId()}, usado = {$produto->isUsado()}, isbn = '{$isbn}', tipoProduto = '{$tipoProduto}', 
        taxaImpressao = '{$taxaImpressao}', waterMark = '{$waterMark}' where id = '{$produto->getId()}'";

        return mysqli_query($this->conexao, $query);
    }

    function buscaProduto($id){
        $query = "select * from produtos where id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        $produto_buscado = mysqli_fetch_assoc($resultado);
    
        $tipoProduto = $produto_buscado['tipoProduto'];
        $produto_id = $produto_buscado['id'];
        $categoria_id = $produto_buscado['categoria_id'];
    
        $factory = new ProdutoFactory();
        $produto = $factory->criaPor($tipoProduto, $produto_buscado);
        $produto->atualizaBaseadoEm($produto_buscado);
    
        $produto->setId($produto_id);
        $produto->getCategoria()->setId($categoria_id);
    
        return $produto;

    }

    function RemoveProduto($id){
        $query = "delete from produtos where id={$id}";
        return mysqli_query($this->conexao, $query);
    }

}

?>