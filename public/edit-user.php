<?php
    require_once "../config/header.inc.html"; 
?>

<div>
    <div>
        <h5>Editar Aluno</h5><hr>

            <?php 

                require_once "../classes/autoload.php"; 

                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

                $editUser = new Aluno();
                $editUser->dadosDaTabela($id);


            
            ?>
    </div>
</div>

<?php
    require_once "../config/footer.inc.html"; 
?>