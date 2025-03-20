<?php


require '../../App/config.inc.php';
include "../../Includes/Head/head.php";
require '../../App/Session/Login.php';


$erro = '';
$Sucess = '';

Login::requireLogout();


$email= $_GET['email'];


if(isset($_POST['salvar'])){


    if(!empty($_POST['senhaNova']) && !empty($_POST['senhaNovaRepetida'])){


        $senhaNova = $_POST['senhaNova'];
        $senhaNovaRepetida = $_POST['senhaNovaRepetida'];


        if($senhaNova === $senhaNovaRepetida){


            $aluno = Aluno::getPorEmail($email);
            $adm = Adm::getPorEmail($email);


            if($aluno instanceof Aluno){
                $aluno->senha = password_hash($senhaNova, PASSWORD_DEFAULT);
                $result = $aluno->atualizarSenha();

                if($result){
                     $Sucess='Senha atualizada';
                    header('location: login.php');
                    die();
                }
                
            }else if($adm instanceof Adm){
                $adm->senha = password_hash($senhaNova, PASSWORD_DEFAULT);
                $result = $adm->atualizarSenha();
                
                if($result){
                    $Sucess='Senha atualizada';
                   header('location: login.php');
                   die();
               }
            }

        }else{
            $erro='Senhas não são iguais';
        }


    }else{
        $erro = 'Prencha os campos';
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
                <div class="title_form">Cadastro Senha</div>
                <div class="item_flex">
                    <label for="">Nova senha</label>
                    <input name='senhaNova' type="password">
                </div>
                <div class="item_flex">
                    <label for="">Repita a senha</label>
                    <input name='senhaNovaRepetida' type="password">
                </div>
                <div class="text_descricao_form">Digite a nova senha.</div>
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="container_btn_login">
                    <button name='salvar' >Login</button>
                </div>

            </form>
        </div>
    
    </main>

    
</body>
</html>