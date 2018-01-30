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
class Home extends AbstractController {

    /**
     * Tela inicial da Home
     */
    protected function index() {
        $res = array();
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {
            $url = ROOT_CLIENTE . "marcacoes/bater_ponto";

            unset($post['submit']);

            $post = json_encode($post, JSON_UNESCAPED_UNICODE);

            $res = $this->serviceGet($url, $_SESSION['user']['token']);

            if ($res["code"] == FORBIDDEN_CODE) {
                $this->logout();
            }

            if ($res["code"] != OK_CODE) {
                $text = 'error';
            } else {
                $text = 'success';
            }

            \Config\Message\Message::setMessage($res["body"]["message"], $text);
        }

        $url = ROOT_CLIENTE . "marcacoes/ponto_hoje";
        $res = $this->serviceGet($url, $_SESSION['user']['token']);

        $res = $res["body"];

        if (!$res)
            $res = array();

        $this->returnView($res['data'], true);
    }

}
