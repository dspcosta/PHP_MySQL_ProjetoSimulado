<?php

session_start();

function usuarioEstaLogado(){
    return isset($_SESSION["usuario_logado"]);
    #isset($_COOKIE['usuario_logado']);
}

function verificaUsuario(){
    if (!usuarioEstaLogado()) {
        $_SESSION["danger"] = 'Você não tem acesso a essa funcionalidade, por favor efetue o login.';
        header('Location: index.php?falhaDeSeguranca=1');
        die();
    }
}

function usuarioLogado(){
    #$_COOKIE['usuario_logado'];
    return $_SESSION['usuario_logado'];
}

function logaUsuario($email){
    $_SESSION["usuario_logado"]=$email;
    #setcookie("usuario_logado", $email, time() + 60);
}

function logout(){
    session_destroy();
    session_start();
    #cria novamente, para as mensagens.
}
