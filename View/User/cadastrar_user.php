<?php

require '../../App/config.inc.php';
include "../../Includes/Head/head.php";
require '../../App/Session/Login.php';


Login::requireLogout();

$erro = '';
$Sucess = '';


if(isset($_POST['cadastrar'])){

    if(!empty($_POST['nome']) && !empty($_POST['sobrenome']) && !empty($_POST['email']) && !empty($_POST['senha'] && !empty($_POST['matricula'])  && !empty($_POST['telefone']))){


        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $matricula = $_POST['matricula'];
        $telefone = $_POST['telefone'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = 'Email inválido';
        }else{

            $newInscrito = new Aluno();
        

            $newInscrito->nome = $nome;
            $newInscrito->sobrenome = $sobrenome;
            $newInscrito->email = $email;
            $newInscrito->senha = $senha;
            $newInscrito->matricula = $matriucla;
            $newInscrito->telefone = $telefone;
            $newInscrito->senha = $senha;


            $result = $newInscrito->cadastraraluno();
        

            if($result){
                $Sucess= 'Cadastro Realizado com sucesso.';
            }else{
                $erro = 'Não foi possivel realizar cadastro.';
        
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
            <a href="../User/Index.php"><img src="../../Public/Img/InspiraTalks__2_-removebg-preview.png" alt=""></a>
        </div>
    </header>
    <div class="header_menu_mobile">
        <div class="conatiner_logo_mobile">
            <a href="../User/Index.php"><img src="../../Public/Img/InspiraTalks__2_-removebg-preview.png" alt=""></a>
        </div>
   </div>
    <main class="main_user">
        <div class="conatiner_login">
            <form method='post' action="">
                <div class="title_form">Cadastro</div>
                <div class="item_flex">
                    <label for="">Nome</label>
                    <input name='nome' type="text">
                </div>
                <div class="item_flex">
                    <label for="">Sobrenome</label>
                    <input name='sobrenome' type="text">
                </div>
                <div class="item_flex">
                    <label for="">Email</label>
                    <input  name='email' type="text">
                </div>
                <div class="item_flex">
                    <label for="">Senha</label>
                    <input name='senha' type="password">
                </div>
                <div class="item_flex">
                    <label for="">Matricula</label>
                    <input name='matricula' type="number">
                </div>
                <div class="item_flex">
                    <label for="">Telefone</label>
                    <input name='telefone' type="number">
                </div>
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="container_btn_login">
                    <button name='cadastrar' >Cadastra-se</button>
                </div>
                <span class="text_cadastro">Já possui Cadastro? <a href="login.php">Faça login</a></span>

            </form>
        </div>
    
    </main>

    
</body>
</html>