<?php
require_once("logica-usuario.php");

logout();

$_SESSION["success"] = "Você foi deslogado com sucesso.";
header("Location: index.php");
die();