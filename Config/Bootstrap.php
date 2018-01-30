<?php

/*
 * Projeto feito para 2º fase da stefanini
 * Sistema de ponto
 * Criado por Wallison 25/01/2018
 */

namespace Config;

/**
 * Arquivo de configuração inicial
 * @author Wallison do Carmo Costa
 */
class Bootstrap {

    private $controller;
    private $action;
    private $request;

    public function __construct($request) {
        $this->request = $request;

        // verifca o valor da controller
        if ($this->request['controller'] == "") {
            $this->controller = 'Home';
        } else {
            $this->controller = str_replace(["_", "-"], ["", ""], $this->request['controller']) . '';
        }

        // verifca o valor da action
        if ($this->request['action'] == "") {
            $this->action = "index";
        } else {
            $this->action = str_replace(["_", "-"], ["", ""], $this->request['action']);
        }
    }

    public function createController() {

        $this->controller = 'Controllers\\' . $this->controller;

        // verifica se a classe existe
        if (class_exists($this->controller)) {

            $parent = class_parents($this->controller);

            // Verifica se a classe abstrata de controller existe
            if (in_array("Controllers\AbstractController", $parent)) {

                //verifica se o metodo existe
                if (method_exists($this->controller, $this->action)) {
                    return new $this->controller($this->action, $this->request);
                } else {
                    // metodo não listado
                    header('Location: ' . ROOT_URL . "error/notFound");
                    return;
                }
            } else {
                // Controle não listado
                header('Location: ' . ROOT_URL . "error/notFound");
                return;
            }
        } else {
            // A classe controller não existe
            header('Location: ' . ROOT_URL . "error/notFound");
            return;
        }
    }

}
