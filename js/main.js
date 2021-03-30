function login()
{
    var email = document.getElementById("inp_email");
    var senha = document.getElementById("inp_pass");
    
    if(email.value.length == 0 || senha.value.length == 0){
    
        // se estiver campo vazio
        //alert("campo vazio");
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Preencha todos os campos',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
          })
    }
    else{
        var request = new XMLHttpRequest();

        request.open("POST", "login.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("email="+email.value+"&password="+senha.value);
        request.addEventListener("readystatechange", function () {

		    if(request.readyState == 4 && request.status == 200){
                var res = JSON.parse(request.response);
                if(res.status == 'success')
                {
                    window.location.href = 'index.php';
                }
                else{
                    if(res.status == 'error_password_invalid'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Credenciais invalidas',
                            text: 'Usuario ou senha incorretos!',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                          })
                    }
                    
                    if(res.status != 'error_password_invalid' && res.status != 'null_field' && res.status != 'success'){
                        alert("algo muito louco ocorreu");
                    }       
                }       
            }
        });
    }//else
}

function cadastrar()
{
    var nome = document.getElementById("inp_name");
    var email = document.getElementById("inp_email");
    var senha = document.getElementById("inp_pass");
    var conf_senha = document.getElementById("inp_conf_pass");

    if(nome.value.length > 0 && email.value.length > 0 
        && senha.value.length > 0 && conf_senha.value.length > 0){
        
        if(senha.value != conf_senha.value){
              Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'As senhas não conferem',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
              })
        }
        else{

        var request = new XMLHttpRequest();

        request.open("POST", "cadastro.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("name="+nome.value+"&email="+email.value+"&password="+senha.value);
        request.addEventListener("readystatechange", function () {

		    if(request.readyState == 4 && request.status == 200){
                var res = JSON.parse(request.response);
                if(res.status == 'success')
                {                       
                    nome.value = "";
                    email.value = "";
                    senha.value = "";
                    conf_senha.value = "";

                    window.location.href = 'index.php';
                }
                else{
                        if(res.status == 'email_exist'){
                          Swal.fire({
                            position: 'center',
                            icon: 'info',
                            title: 'Email ja existe',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                          })
                        }
                 
                    if(res.status != 'email_exist' && res.status != 'null_field' && res.status != 'success'){
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Houve um erro interno',
                            showConfirmButton: true
                          })
                    }
                }
            }
        });
    }
}
    
    else{
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Preencha todos os campos',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
          })
    }
}

