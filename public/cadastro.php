<?php
require_once "../config/header.inc.html";
?>

<div>
    <h5>Cadastro Aluno</h5>
        <?php
            if(isset($_SESSION['sucesso'])):
                echo "<p>";

                echo $_SESSION['sucesso'];
                unset($_SESSSIO['sucesso']);

                echo "</p>";

                elseif(isset($_SESSION['error'])):
                    echo "<p>";

                    echo $_SESSION['error'];
                    unset($_SESSSIO['error']);   

                    echo "</p>";             
            endif;
            require_once "../forms/form-add.php" ;
        ?>
</div>

<div>
    <h5>Usuarios Cadastrados</h5><hr>
    <!-- tabela -->
    <table>
            <thead>
                <tr>
                    <th>Id:</th>
                    <th>Nome:</th>
                    <th>Email:</th>
                    <th>Data de Nascimento:</th>
                    <th>Telefone:</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once "../database/usuario/read.php";?>
            </tbody>
    </table>
</div>

<?php
require_once "../config/footer.inc.html";
?>


