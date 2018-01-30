<?php

/*
 * Projeto feito para 2º fase da stefanini
 * Sistema de ponto
 * Criado por Wallison 25/01/2018
 */

namespace Controllers;

use Controllers\AbstractController;

/**
 * Classe Abastrata para as controladoras
 * @author Wallison do Carmo Costa
 */
class Error extends AbstractController {

    /**
     * Login dos usuários
     */
    protected function notFound() {
        $this->returnView([], false);
    }

}
