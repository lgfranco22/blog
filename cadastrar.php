<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Comentarios - Entrar</title>
    <link rel="stylesheet" href="css/cadastrar.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <form method="POST">
        <h1>Cadastre-se</h1>
        <label for="">Nome</label>
        <input type="text" name="nome" maxlength="40" id="inp_name">
        <label for="">Email</label>
        <input type="email" name="email" maxlength="40" autocomplete="off" id="inp_email">
        <label for="">Senha</label>
        <input type="password" name="senha" id="inp_pass">
        <label for="">Confirmar Senha</label>
        <input type="password" name="confSenha" id="inp_conf_pass">
        <input type="button" onclick="cadastrar();" value="cadastrar" id="btn-entrar">
        <div id="sucesso"></div>
    </form>
    <script src="js/main.js"></script>
</body>
</html>