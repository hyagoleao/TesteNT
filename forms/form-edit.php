<form action="../database/usuario/update.php" method="post">
<div class="container">
    <div class="form-edit">
        <input type="text" name="id" value="<?php echo $values['id'] ?>">
    </div>
    <div class="form-edit">
        <input type="text" name="nome" value="<?php echo $values['nome'] ?>"required>
        <label for="nome">Digite  Nome</label>
    </div>
    <div class="form-edit">
        <input type="text" name="email" value="<?php echo $values['email'] ?>"required>
        <label for="email">Digite seu email</label>
    </div>
    <div class="form-edit">
        <input type="text" name="date" value="<?php echo $values['date'] ?>"required>
        <label for="date">Data de Nascimento</label>
    </div>
    <div class="form-edit">
        <input type="text" name="telefone" value="<?php echo $values['telefone'] ?>"required>
        <label for="telefone">Digite um Telefone</label>
    </div>
    <div class="form-edit">
        <input type="submit" value="alterar">
        <a href="cadastro.php">cancelar</a>
    </div>
    </div>

</form>

