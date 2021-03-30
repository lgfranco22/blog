<?php
if(isset($_POST['name']))
{
    $nome = htmlentities(addslashes($_POST['name']));
    $email = htmlentities(addslashes($_POST['email']));
    $senha = htmlentities(addslashes($_POST['password']));
    
    if(!empty($nome) && !empty($email) && !empty($senha))
	{
		require_once 'Classes/Usuario.php';
					
		$us = new Usuario("projeto_comentarios" ,"localhost" ,"root" , "");
					
		if($us->cadastrar($nome, $email, $senha))
		{
            echo json_encode(array("status" => "success"));
		}
        else{
            echo json_encode(array("status" => "email_exist"));
		}
	}
    else{
            echo json_encode(array("status" => "null_field"));
	}
}
else{
    header("Location:cadastrar.php");
    exit();
}


?>