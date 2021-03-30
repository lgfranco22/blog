<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Comentarios - Entrar</title>
    <link rel="stylesheet" href="css/entrar.css">
	
</head>
<body>
    <span id="spn">Miriam<br>TECHCOD</span>
    <form method="POST">
        <h1>Acesse sua conta</h1>
        <img src="imagens/envelope.png" alt="">
        <input type="email" name="email" maxlength="40" autocomplete="off" id="inp_email">
        <img src="imagens/cadeado.png" alt="">
        <input type="password" name="senha" id="inp_pass">
        <input type="button" onclick="login();" value="entrar" id="btn-entrar">
        <a href="cadastrar.php">Registre-se agora!</a>
    </form>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="js/main.js"></script>
</body>
</html>