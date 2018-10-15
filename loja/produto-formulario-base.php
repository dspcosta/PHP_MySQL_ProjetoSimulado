<tr>
    <td>Nome:</td>
    <td><input class ="form-control" type="text" name="nome" value="<?=$produto->getNome()?>"></td>
</tr>
<tr>
    <td>Preco:</td> 
    <td><input class ="form-control" type="text" name="preco" value="<?=$produto->getPreco()?>"></td>
</tr>
<tr>
    <td>Descrição:</td> 
    <td><textarea name="descricao" class="form-control"><?=$produto->getDescricao()?></textarea></td>
</tr>
<tr>
    <td></td>
    <td><input type="checkbox" name="usado" value="true" <?=$produto->isUsado()?>>Usado</td>
</tr>
<tr>
    <td>Categoria</td> 
    <td>
        <select class="form-control" name="categoria_id">
            <?php foreach ($categorias as $categoria) : 
                $essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
                $selecao = $essaEhACategoria ? "selected='selected'" : "";
                ?>
                <option value="<?=$categoria->getId()?>" <?=$selecao?>>
                <?=$categoria->getNome()?><br/>
            <?php endforeach ?>
        </select>
    </td>
</tr>
<tr>
    <td>Tipo de Produto</td>
    <td>
        <select class="form-control" name="tipoProduto">
            <?php 
            $tipos = array("Produto", "Livro Fisico", "Ebook");
                foreach ($tipos as $tipo) : 
                $tipoSemEspaco = str_replace(" ","",$tipo); #removendo o espaço em branco da string.
                $esseEhOTipo = get_class($produto) == $tipoSemEspaco;
                $selecaoTipo = $esseEhOTipo ? "selected='selected'" : "";
                ?>

                <?php if($tipo == "Livro Fisico") : ?>
                    <optgroup label="Livros">
                <?php endif ?>
                    <option value="<?=$tipoSemEspaco?>" <?=$selecaoTipo?>>
                    <?=$tipo?></br>
                    </option>
                <?php if($tipo == "Ebook") :?>   
                     </optgroup>
                <?php endif ?>   
                
            <?php endforeach ?>
        </select>
    </td>
</tr>
<tr>
    <td>ISBN (caso seja um livro)</td>
    <td>
        <input type="text" name="isbn" class="form-control" 
        value="<?php 
        if($produto->temIsbn()){ 
            echo $produto->getIsbn();
        };
        ?>">
    </td>

</tr>
<tr>
    <td>Taxa de Impressão (caso seja um livro físico)</td>
    <td>
        <input type="text" name="taxaImpressao" class="form-control" 
        value="<?php 
        if($produto->temTaxaImpressao()){ 
            echo $produto->getTaxaImpressao();
        };
        ?>">
    </td>

</tr>
<tr>
    <td>Water Mark (caso seja um livro Ebook)</td>
    <td>
        <input type="text" name="waterMark" class="form-control" 
        value="<?php 
        if($produto->temWaterMark()){ 
            echo $produto->getWaterMark();
        };
        ?>">
    </td>

</tr>