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
class Ponto extends AbstractController {

    protected function espelho() {
        $res = array();
        $this->returnView($res, true);
    }

    protected function justificativa() {
        $res = array();
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {

            unset($post['submit']);

            $url = ROOT_CLIENTE . "justificativas";

            $post = json_encode($post, JSON_UNESCAPED_UNICODE);

            $res = $this->servicePost($url, $post, $_SESSION['user']['token']);
            if ($res["code"] != 200) {
                $text = 'error';
            } else {
                $text = 'success';
            }

            \Config\Message\Message::setMessage($res["body"]["message"], $text);
        }
        $url = ROOT_CLIENTE . "tipo_justificativas";

        $res = $this->serviceGet($url, $_SESSION['user']['token']);


        if ($res["code"] == FORBIDDEN_CODE) {
            $this->logout();
        }

        if ($res["code"] == NOT_FOUND_CODE) {
            $res = array();
        } else {
            $res = $res["body"];
        }

        $this->returnView($res, true);
    }

    protected function registro() {
        $res = array();
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if ($post['submit']) {
            $url = ROOT_CLIENTE . "marcacoes/bater_ponto";

            unset($post['submit']);

            $post = json_encode($post, JSON_UNESCAPED_UNICODE);

            $res = $this->serviceGet($url, $_SESSION['user']['token']);

            if ($res["code"] != OK_CODE) {
                $text = 'error';
            } else {
                $text = 'success';
            }

            \Config\Message\Message::setMessage($res["body"]["message"], $text);
        }

        $url = ROOT_CLIENTE . "marcacoes/ponto_hoje";
        $res = $this->serviceGet($url, $_SESSION['user']['token']);

        if ($res["code"] == NOT_FOUND_CODE) {
            $res = array();
        } else {
            $res = $res["body"];
        }

        $this->returnView($res, false);
    }

}
