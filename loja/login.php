<?php

require_once("banco-usuario.php");
require_once("logica-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);



if ($usuario == null) {
    $_SESSION["danger"] = "usuário ou senha inválido.";
    header("Location: index.php");
    #redireciona
} else {
    $_SESSION["success"] = "Usuário logado com sucesso.";
    logaUsuario($usuario['email']);
    header("Location: index.php");
    
    
}

die();


#var_dump($usuario);
