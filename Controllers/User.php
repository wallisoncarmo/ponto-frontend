<?php

/*
 * Projeto feito para 2º fase da stefanini
 * Sistema de ponto
 * Criado por Wallison 25/01/2018
 */

namespace Controllers;

use Controllers\AbstractController;
use Config\Message\Message;

/**
 * Classe Abastrata para as controladoras
 * @author Wallison do Carmo Costa
 */
class User extends AbstractController {

    /**
     * Login dos usuários
     */
    protected function login() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $res = array();

        if ($post['submit']) {

            unset($post['submit']);

            $url = ROOT_CLIENTE . "usuarios/login";

            $post = json_encode($post, JSON_UNESCAPED_UNICODE);

            $res = $this->servicePost($url, $post);
            if ($res["code"] == OK_CODE) {

                $url = ROOT_CLIENTE . "usuarios/usuario-token";

                $token = $res["header"]["authorization"][0];

                $res = $this->serviceGet($url, $token);

                $_SESSION['is_logged_in'] = true;
                $_SESSION['user'] = [
                    'token' => $token,
                    'nome' => $res["body"]["nome"],
                    'email' => $res["body"]["email"],
                    'acesso_id' => $res["body"]["acessos_id"],
                    'acesso' => $res["body"]["acessos"],
                ];
                header('Location: ' . ROOT_URL);
            }

            Message::setMessage($res["body"]["message"], 'error');
        }
        $this->returnView($res, false);
    }

}
