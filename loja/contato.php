<?php require_once("cabecalho.php");?>


<form action="envia-contato.php" method ="post">
    <table class="table">
        <tr>
            <td>Nome:</td>
            <td><input type="text" class="form-control" name ="nome"></td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td><input type="email" class="form-control" name ="email"></td>
        </tr>
        <tr>
            <td>Sua mensagem:</td>
            <td><textarea name="mensagem" class="form-control" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td><button class="btn btn-primary">Enviar</button></td>
        </tr>
    </table>

</form>









<?php require_once("rodape.php"); ?>