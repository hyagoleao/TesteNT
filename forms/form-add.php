<form action="../database/usuario/create.php" method="post">
    <div class="form">
        <label for="nome">Digite um nome:</label>
        <input type="text" name="nome" id="nome" required autofocus>
    </div>
    <div class="form">
        <label for="email">Digite seu Email:</label>
        <input type="text" name="email" id="email" required autofocus>
    </div>
    <div class="form">
        <label for="date">Data Nascimento:</label>
        <input type="text" name="date" id="date" required autofocus>
    </div>
    <div class="form">
        <label for="telefone">Numero telefone:</label>
        <input type="text" name="telefone" id="telefone" required autofocus>
    </div>
    <div class="form">
        <input type="submit" value="cadastrar">
        <input type="reset" value="limpar">
    </div>
</form>