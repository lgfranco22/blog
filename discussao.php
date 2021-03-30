<?php
	session_start();
		require_once 'Classes/Comentarios.php';
    	$cmt = new Comentario("projeto_comentarios", "localhost", "root", "");
    	$coments = $cmt->buscarComentarios();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/discussao.css">
    <title>Sistema de Comentarios</title>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
		<?php
			if(isset($_SESSION['id_master']))
			{
			    ?>
                                <li><a href="dados.php">Dados</a></li>
                            <?php
			}
			if(isset($_SESSION['id_usuario']) || isset($_SESSION['id_master']))
			{
		            ?>
				<li><a href="sair.php">Sair</a></li>
			    <?php
			}else
			{
			    ?>
                               	<li><a href="entrar.php">Entrar</a></li>
                            <?php
			}
		?>
        </ul>
    </nav>
    <div id="largura-pagina">
        <section id="conteudo1">
            <h1>Guia Definitivo Como Criar um Blog Incrível e Ganhar Dinheiro Com Ele</h1>
            <img src="imagens/computador.jpg" alt="">
            <p class="texto">É um fato há muito estabelecido que um leitor se distrairá com o conteúdo legível de uma página ao analisar seu layout. O ponto de usar o Lorem Ipsum é que ele tem uma distribuição de letras mais ou menos normal, em vez de usar 'Conteúdo aqui, conteúdo aqui'.</p>
            <p class="texto">1. O ponto de usar o Lorem Ipsum</p>
            <p class="texto">2. È que ele tem uma distribuição de letras</p>
            <p class="texto">3. Lorem Ipsum é que ele tem uma distribuição</p>
            <p class="texto">4. letras mais ou menos normal</p>
		<?php
		if(isset($_SESSION['id_usuario']) || isset($_SESSION['id_master']))
		{
		?>
		<h2>Deixe seu comentario</h2>
			<form method="POST">
        	    <img src="imagens/perfil.png" alt="perfil">
      		    <textarea name="texto" id="coment" cols="30" rows="10" placeholder="Participe da discussão" maxlength="400"></textarea>
        	    <input type="submit" id="btn-coment" value="Publicar comentario">
	        </form>
		<?php
		}else
		{
		?>
		<h2>Comentarios</h2>
		<?php
		}
		?>
	<?php
	if(count($coments) > 0)
	{
		foreach($coments as $v)
		{
		?>
			<div class="area-comentario">
            		<img src="imagens/perfil.png" alt="">
            		<h3><?php echo addslashes(htmlentities($v['nome_pessoa']));?></h3>
        	    	<h4>
			<?php
				$data = new DateTime($v['dia']);
				echo $data->format('d/m/Y');
				echo " às ";
				echo $v['horario'];
			?>
			<?php
			if(isset($_SESSION['id_usuario']))
			{
				//verifica se comentario eh de quem esta logado
				if($_SESSION['id_usuario'] == $v['fk_id_usuario'])
				{
					?>
						 <a href="discussao.php?id_exc=<?php echo $v['id']; ?>">Excluir</a>
					<?php
				}
			}
				elseif(isset($_SESSION['id_master'])){
                    ?>
    	            	<a href="discussao.php?id_exc=<?php echo $v['id']; ?>">Excluir</a>
                	<?php
                }

			?>

			</h4>
	            	<p><?php addslashes(htmlentities(echo $v['comentarios'])); ?></p>
        	</div>
		<?php
		}
	}
	else
	{
		echo "Ainda nao ha comentarios por aqui";
	}
	?>
        </section>
        <section id="conteudo2">
            <div>
                <img src="imagens/img-lateral.jpg" alt="">
                <p>Analisar seu layout. O ponto de usar o Lorem Ipsum é que ele tem uma distribuição de letras mais ou menos normal, em vez de usar 'Conteúdo aqui, conteúdo aqui'.</p>
            </div>
        </section>
        <section id="conteudo3">
            <div>
                <h5>Saiba mais sobre como fazer</h5>
                <p>Analisar seu layout. O ponto de usar o Lorem Ipsum é que ele tem uma distribuição de letras mais ou menos normal, em vez de usar 'Conteúdo aqui, conteúdo aqui'.</p>
            </div>
        </section>
    </div>
	<script src="js/comentarios.js"></script>
</body>
</html>

<?php

// excluir comentario

if(isset($_GET['id_exc']))
{
	$id_e = addslashes($_GET['id_exc']);
	if(isset($_SESSION['id_master']))
	{
		$cmt->excluirComentario($id_e, $_SESSION['id_master']);
	}
	elseif(isset($_SESSION['id_usuario']))
	{
		$cmt->excluirComentario($id_e, $_SESSION['id_usuario']);
	}
	header("Location: discussao.php");
}

// publicar comentario

if(isset($_POST['texto']))
{
	$texto = htmlentities(addslashes($_POST['texto']));
	if(isset($_SESSION['id_master']))
	{
		$cmt->inserirComentario($_SESSION['id_master'], $texto);
	}elseif(isset($_SESSION['id_usuario']))
	{
		$cmt->inserirComentario($_SESSION['id_usuario'], $texto);
	}
	header("Location:discussao.php");
}

?>
