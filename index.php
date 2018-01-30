<?php

// start SESSION
session_start();
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

require('config.php');
require('autoload.php');
require('Config/leng/texto_pt.php');

// importa as funcoes publicas
require('Util/public_function.php');

// Importa as configurações
use Config\Bootstrap;

if (!isset($_SESSION['is_logged_in']) && $_GET['controller'] . '/' . $_GET['action'] != "user/login")
    header('Location: ' . ROOT_URL . "user/login");

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();


if ($controller) {
    $controller->executeAction();
}

