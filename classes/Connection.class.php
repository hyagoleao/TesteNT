<?php

 abstract class Connection {
    private $servDB= 'mysql:host=localhost;dbname=cadastro';
    private $user = 'root';
    private $pass = 'WaNpisu777!';

    protected function connect() {
        try {
            $conn = new PDO($this->servDB, $this->user, $this->pass);
            $conn->exec("set names utf8");
            return $conn;

        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
}