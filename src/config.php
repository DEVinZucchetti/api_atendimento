<?php
define('ARQUIVO_FILA_ATENDIMENTO', 'filaAtendimento.txt');
define('GUICHE_1', 'guiche1.txt');
define('GUICHE_2', 'guiche2.txt');
define('GUICHE_3', 'guiche3.txt');

header("Content-Type: application/json"); // a aplicação retorna json
header("Access-Control-Allow-Origin: *"); // vai aceitar requisições de todas origens
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // habilita métodos
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
