<?php
date_default_timezone_set('America/Sao_Paulo');

Class Comentario{

    private $pdo;

    //Construtor
    public function __construct($dnmae, $host, $usuario, $senha)
    {
        try {
            $this->pdo = new PDO("mysql:dbname=".$dnmae.";host=".$host, $usuario, $senha);
        } catch (PDOException $e) {
            echo "Erro no banco de dados: ".$e->getMessage();
        }
        catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }

    public function buscarComentarios()
    {
        $cmd = $this->pdo->prepare("SELECT *, (SELECT nome FROM usuarios WHERE id = fk_id_usuario) AS nome_pessoa FROM comentarios ORDER BY dia,horario DESC");
        $cmd->execute();
        $dados = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
        // todas as colunas de comentarios + sub consulta que traz nome_pessoa
    }

	public function excluirComentario($id_comentario, $id_user)
	{
		if($id_user == 1)
		{
			$cmd = $this->pdo->prepare("DELETE FROM comentarios WHERE id = :id_c");
			$cmd->bindValue(":id_c", $id_comentario);
			$cmd->execute();
		}
		else
		{
			$cmd = $this->pdo->prepare("DELETE FROM comentarios WHERE id = :id_c AND fk_id_usuario = :id_user");
                        $cmd->bindValue(":id_c", $id_comentario);
                        $cmd->bindValue(":id_user", $id_user);
                        $cmd->execute();
		}
	}

	public function inserirComentario($id_pessoa, $comentario)
    	{
            $cmd = $this->pdo->prepare("INSERT INTO comentarios (comentarios, dia, horario, fk_id_usuario) VALUES (:c, :d, :h, :fk)");
            $cmd->bindValue(":c",$comentario);
            $cmd->bindValue(":d",date('Y-m-d'));
            $cmd->bindValue(":h",date('H:i'));
            $cmd->bindValue(":fk",$id_pessoa);
            $cmd->execute();
    	}

}