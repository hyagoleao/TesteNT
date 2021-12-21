<?php
session_start();

require_once "crudCadastro.php";

class Aluno extends Connection implements crudCadastro{
    private $id, $nome, $email, $dataNascimento, $telefone;

    protected function setId($id) {
        $this->id = $id;
    }

    protected function setNome($nome) {
        $this->nome = $nome;
    }

    protected function setEmail($email) {
        $this->email = $email;
    }

    protected function setBirth($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    protected function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    protected function getId() {
        return $this->id;
    }

    protected function getNome() {
        return $this->nome;
    }

    protected function getEmail() {
        return $this->email;
    }

    protected function getBirth() {
        return $this->dataNascimento;
    }

    protected function getTelefone() {
        return $this->telefone;
    }

    //metodos especificos
    public function dadosFormulario($nome, $email, $dataNascimento, $telefone) {

            $this->setNome($nome);
            $this->setEmail($email);
            $this->setBirth($dataNascimento);
            $this->setTelefone($telefone);

    }

    public function dadosDaTabela($id) {

        $conn = $this->connect();

        $this->setId($id);
        $_id = $this->getId();

        $sql= "SELECT * FROM aluno WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach($result as $values):
            require_once '../forms/form-edit.php';
        endforeach;
    }
    //metodos da interface
    public function create() {

        $nom = $this->getNome();
        $em = $this->getEmail();
        $birth = $this->getBirth();
        $phone = $this->getTelefone();

        $conn = $this->connect();

        $sql = "INSERT INTO aluno VALUES (default, :nom,:em, :birth, :phone)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':em', $em);
        $stmt->bindParam(':birth', $birth);
        $stmt->bindParam(':phone', $phone);

        if($stmt->execute()):
            $_SESSION['sucesso'] = 'Cadastrado com sucesso!';
            $destino = header("Location:../../public/cadastro.php");
        else:
            $_SESSION['error'] = 'Usuario ja cadastrado';
            $destino = header("Location:../../public/cadastro.php");
        endif;

    }
    public function read(){

        $conn = $this->connect();

        $sql = "SELECT * FROM aluno";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach($result as $values):

            $this->setId(($values['id']));
            $this->setNome($values['nome']);
            $this->setEmail($values['email']);
            $this->setBirth($values['dataNascimento']);
            $this->setTelefone($values['telefone']);

            $_id = $this->getId();
            $_nome = $this->getNome();
            $_email = $this->getEmail();
            $_dataNascimento = $this->getBirth();
            $_telefone = $this->getTelefone();

            echo "<tr>";

            echo "<td>$_id</td>";
            echo "<td>$_nome</td>";
            echo "<td>$_email</td>";
            echo "<td>$_dataNascimento</td>";
            echo "<td>$_telefone</td>";
            echo "<td><a href='edit-user.php?id=$_id'><i>Editar</i></a></td>";
            echo "<td><a href='../database/usuario/delete.php?id=$_id'><i>Deletar</i></a></td>";

            echo "</tr>";
        endforeach;
    }
    public function update($nome, $email, $dataNascimento, $telefone, $id){
        $conn = $this->connect();

        $this->setNome($nome);
        $this->setEmail($email);
        $this->setBirth($dataNascimento);
        $this->setTelefone($telefone);
        $this->setId($id);

        $nome = $this->getNome();
        $email = $this->getEmail();
        $dataNascimento = $this->getBirth();
        $telefone = $this->getTelefone();
        $id = $this->getId();

        $sql = "UPDATE aluno SET  nome = :nome, email = :email, dataNascimento = :dataNascimento, telefone = :telefone WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dataNascimento', $dataNascimento);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $destino = header("Location:../../public/cadastro.php");
    }
    public function delete($id){
        $conn = $this->connect();

        $this->setId($id);
        $_id = $this->getId();

        $sql = "DELETE FROM aluno WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $destino = header("Location:../../public/cadastro.php");
    }
    
}