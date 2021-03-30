<?php
if(isset($_POST['email']))
{
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['password']);
    
    if(!empty($email) && !empty($senha))
	{
		require_once 'Classes/Usuario.php';
					
		$us = new Usuario("projeto_comentarios" ,"localhost" ,"root" , "");
					
		if($us->entrar($email, $senha))
		{
            // header("Location: index.php");
            echo json_encode(array("status" => "success"));
		}
        else{
            echo json_encode(array("status" => "error_password_invalid"));
		}
	}
    else{
            echo json_encode(array("status" => "null_field"));
	}
}
else{
    header("Location:entrar.php");
    exit();
}


?>