<?php

require_once "../../classes/autoload.php";


$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$dataNascimento = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);

$newUser = new Aluno();
$newUser->dadosFormulario($nome, $email, $dataNascimento, $telefone);
$newUser->create();