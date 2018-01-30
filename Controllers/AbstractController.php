<?php

/*
 * Projeto feito para 2º fase da stefanini
 * Sistema de ponto
 * Criado por Wallison 25/01/2018
 */

namespace Controllers;

/**
 * Classe Abastrata para as controladoras
 * @author Wallison do Carmo Costa
 */
abstract class AbstractController extends \Config\Services {

    protected $request;
    protected $action;

    public function __construct($action, $request) {
        $this->action = $action;
        $this->request = $request;
    }

    public function executeAction() {
        return $this->{$this->action}();
    }

    protected function returnView($viewmodel, $fullview) {
        // remove parametos desnecessários e  troca a barras
        $view = str_replace(['\\', '/Controllers'], ["/", ''], 'views/' . get_class($this) . '/' . $this->action . '.php');
        if ($fullview) {
            require('views/main.php');
        } else {
            require($view);
        }
    }

    /**
     * Login dos usuários
     */
    protected function logout() {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();

        header("Location: " . ROOT_URL . "user/login");
    }

}
