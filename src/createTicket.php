<?php
require_once 'config.php';
require_once 'utils.php';
require_once 'email.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $body = getBody();

    $name = filter_var($body->name, FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_var($body->cpf, FILTER_SANITIZE_SPECIAL_CHARS);
    $type = filter_var($body->type, FILTER_VALIDATE_INT);

    if (!$name || !$cpf || !$type) {
        echo json_encode(['error' => 'Faltaram informações para iniciar o atendimento']);
    }

    $filaAtendimento =  readFileContent(ARQUIVO_FILA_ATENDIMENTO);

    if ($type === 1) {
        array_push($filaAtendimento, ['name' => $name, 'cpf' => $cpf]);
    } else if ($type === 2) {
        array_unshift($filaAtendimento, ['name' => $name, 'cpf' => $cpf]);
    }

    file_put_contents(ARQUIVO_FILA_ATENDIMENTO, json_encode($filaAtendimento));

    http_response_code(201);
    sendEmail('emai@gmail.com', $name, 'TICKET CRIADO'); // Fila 
    echo json_encode(['message' => 'Aguarde sua vez !!!']);
}
