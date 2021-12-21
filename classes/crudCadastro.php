<?php

interface crudCadastro {

    public function create();
    public function read();
    public function update($nome, $email, $dataNascimento, $telefone, $id);
    public function delete($id);
}