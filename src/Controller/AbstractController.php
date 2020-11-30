<?php

namespace App\Controller;

use JsonSerializable;

class AbstractController
{

    public function json(?array $json, int $status): void
    {
        header('Content-Type: application/json; charset=utf-8');

        if ($status) {
            http_response_code($status);
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
        die();
    }

    protected function render(string $_tpl, array $param = null): void
    {
        define('NOM_TPL', $_tpl);

        if ($param) {
            extract($param, EXTR_SKIP);
        }

        require dirname(__DIR__) . '/../templates/' . NOM_TPL . '.php';
    }
}