<?php

include "../../Includes/Head/head.php";

require '../../App/config.inc.php';
require '../../App/Session/Login.php';



Login::requireLogout();

$erro = '';
$Sucess = '';


if(isset($_POST['logar'])){

    if(!empty($_POST['email']) || !empty($_POST['senha'])){



        $email = $_POST['email'];
        $senha =$_POST['senha'];




        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = 'Email inválido';
        }else{

        
            $aluno = Aluno::getPorEmail($email);
            $adm = Adm::getPorEmail($email);



            if($adm instanceof Adm && (password_verify($senha, $adm->senha))){
                Login::loginADM($adm);
            }else{
                $erro = 'Email ou Senha Inválidos';

            }



            if($aluno instanceof Cliente && (password_verify($senha, $aluno->senha))){
                Login::login($aluno);
            }else{
                $erro = 'Email ou Senha Inválidos';
            }


    

        }
    
    
    }else{

        $erro='Preencha-os campos';

    }

}





?>

<body>
    <header class="header_user">
        <div class="conatiner_logo">
            <a href="../User/Index.php"><img src="" alt=""></a>
        </div>
    </header>
    <div class="header_menu_mobile">
        <div class="conatiner_logo_mobile">
            <a href="../User/Index.php"><img src="" alt=""></a>
        </div>
   </div>
    <main class="main_user">
        <div class="conatiner_login">
            <form method='post' action="">
                <div class="title_form">Login</div>
                <div class="item_flex">
                    <label for="">Email</label>
                    <input name='email' type="text">
                </div>
                <div class="item_flex">
                    <label for="">Senha</label>
                    <input name='senha' type="password">
                </div>
                <div class="esqueceu_senha"><a href="esqueci_senha.php">Esqueceu a senha?</a></div>
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="container_btn_login">
                    <button name='logar'>Login</button>
                </div>
                <span class="text_cadastro">Não possui Cadastro? <a href="cadastrar_user.php">Cadastra-se</a></span>

            </form>
        </div>
    
    </main>

    
</body>
</html>