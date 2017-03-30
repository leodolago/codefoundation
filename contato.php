
<h3>Formulario de contato</h3>
<p>Envie uma mensagen abaixo</p>

<form action="?pagina=contato1.php" method="post">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="nome"  name="nome" class="form-control" id="nome">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="assunto">Assunto:</label>
        <input type="assunto" name="assunto" class="form-control" id="assunto">
    </div>
    <div class="form-group">
        <label for="mensagem">Sua Mensagem:</label>
        <textarea name="mensagem" class="form-control" rows="5" id="mensagem"></textarea>
    </div>
    <button type="submit" name="enviar" class="btn btn-default">Enviar</button>
</form>
