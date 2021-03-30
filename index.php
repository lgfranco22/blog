<?php
        require_once 'Classes/Usuario.php';
        session_start();
        if(isset($_SESSION['id_usuario']))
        {
                $us = new Usuario("projeto_comentarios","localhost","root","");
                $informacoes = $us->buscarDadosUser($_SESSION['id_usuario']);
        }elseif(isset($_SESSION['id_master']))
        {
                $us = new Usuario("projeto_comentarios","localhost","root","");
                $informacoes = $us->buscarDadosUser($_SESSION['id_master']);
        }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Comentarios</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <nav>
        <ul>
	<?php
	if(isset($_SESSION['id_master']))
	{ ?>
		<li><a href="dados.php">Dados</a></li>
	<?php }
	?>

            <li><a href="discussao.php">Discussão</a></li>
		<?php
			if(isset($informacoes)) // tem uma sessao
			{
			?>
			<li><a href="sair.php">Sair</a></li>
			<?php
			}
			else {
			?>
			<li><a href="entrar.php">Entrar</a></li>
			<?php
			}
			?>
        </ul>
    </nav>
	<?php

	if(isset($_SESSION['id_master']) || isset($_SESSION['id_usuario']))
	{
		?>
		<h2> <?php
			echo "Olá! ";
			echo $informacoes['nome'];
			echo ", seja bem vindo(a)!";
		      ?>
		</h2>
		<?php
	}
	?>
	    <h3>Conteudo Qualquer</h3>
		<p>Este é um projeto de <a href="https://www.youtube.com/watch?v=vinsTXSwrNE&list=PLYGFJHWj9BYr6O83uNfGbuskbQJk9ASs_">Miriam TECHCOD</a></p>
</body>
</html>