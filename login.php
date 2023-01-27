<?php
    @include 'conectar.php';
	//$this->display('_Footer.tpl.php');
?>



<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tela Login</title>

        
    </head>
    <body>

        <style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;1,500&display=swap');


:root{
    --main-color:#192e5c;
    --black:#222;
    --white:#fff9;
    --light-black:#777;
    --light-white:#fff9;
    --sen-color: #355564;
    --dark-bg:rgba(0,0,0,.7);
    --light-bg:#eee;
    --fund-login: #dfd3d3;
    --fund-login1: #FFFFFF;
    --fund-login2: #EEEEEE;
    --input: #C8C8C8C8;
    --border:0.2rem solid var(--black);
    --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
    --text-shadow:0 1.5rem 3rem rgba(0,0,0,.3);
}

*{
    font-family: 'Poppins', sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    outline: none; border:none;
    text-decoration: none;
    text-transform: capitalize;
}

 /*-----------------login-----------------------*/
.user-container{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    padding-bottom: 60px;
    background: var(--fund-login1);
}

.user-container form{
    padding: 20px;
    border-radius: 5px;
    box-shadow: var(--box-shadow);
    background: var(--fund-login2);
    text-align: center;
    width: 400px;
}

.user-container form h3{
    font-size: 30px;
    text-transform: uppercase;
    margin-bottom: 10px;
    color: var(--black);
}

.user-container form input,
.user-container form select{
    width: 100%;
    padding: 10px 15px;
    font-size: 17px;
    margin: 8px 0;
    background: var(--input);
    border-radius: 5px;
}

.user-container form select option{
    background: var(--input);
    text-align: center;
}

.user-container form .form-btn{
    background: #1a1a1a;
    color: var(--fund-login);
    text-transform: capitalize;
    font-size: 20px;
    cursor: pointer;
}

.user-container form .form-btn:hover{
    background: white;
    color: var(--black);
}

.user-container form p{
    margin-top: 10px;
    font-size: 20px;
    color: var(--black);
}
.user-container form p a{
    color: var(--sen-color);
}

img{
    width: 50%;

}

/*---------Login Animado------*/
.user-container{
    animation-name: fade;
    animation-duration:  3s;
}
.user-container{
    animation-name: move;
    animation-duration: 1s;
}

@keyframes fade{
    from{
        opacity: 0;
        transform: scale(0.9);
    }to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes move{
    from{
        opacity: 0;
        transform: translateX(-35%);
    }to {
        opacity: 1;
        transform: translateX(0%);
    }
}


        </style>
    
    <div class="bg-container">  
        <div class="user-container">
            <form action="" method="post">
                <img src="Logo-Arena.png" alt="">
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <input type="email" name="email" required placeholder="Email">
                <input type="password" name="password" required placeholder="Senha">
                <input type="submit" name="submit" value="Acessar" class="form-btn">
                <p>Não tem cadastro?<a href="login.php"> Cadastre-se Aqui!</a></p>
            </form>
        </div>
    </div>
   
    </body>
</html>



