<?php

/*
 * Projeto feito para 2º fase da stefanini
 * Sistema de ponto
 * Criado por Wallison 25/01/2018
 */

namespace Config\Message;

/**
 * Arquivo de configuração inicial
 * @author Wallison do Carmo Costa
 */
class Message {

    public static function setMessage($text, $type) {
        if ($type == 'error') {
            $_SESSION['errorMsg'] = $text;
        } else {
            $_SESSION['successMsg'] = $text;
        }
    }

    public static function display() {
        if (isset($_SESSION['errorMsg'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['errorMsg'] . '</div>';
            unset($_SESSION['errorMsg']);
        } else if (isset($_SESSION['successMsg'])) {
            echo '<div class="alert alert-success">' . $_SESSION['successMsg'] . '</div>';
            unset($_SESSION['successMsg']);
        }
    }

}
