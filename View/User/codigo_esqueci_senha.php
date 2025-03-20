<?php
require '../../App/config.inc.php';
include "../../Includes/Head/head.php";
require '../../App/Session/Login.php';


Login::requireLogout();


$erro = '';
$Sucess = '';

if (isset($_SESSION['ce'])){
    $parametros_busca = $_SESSION['ce'];

    $codigo =  $parametros_busca[0];
    $email = $parametros_busca[1];
          
    if (isset($_POST['enviar'])){

        $codigo1=$_POST['1'];
        $codigo2=$_POST['2'];
        $codigo3=$_POST['3'];
        $codigo4=$_POST['4'];
        $codigo5=$_POST['5'];

        $codigoDigi = ''.$codigo1.''.$codigo2.''.$codigo3.''.$codigo4.''.$codigo5.'';

        if($codigoDigi === $codigo){
            header('location: nova_senha.php?email='.$email.'');
            die();
        }else{
            
            $erro ='Código inválido';

        }
    }


}else{
    header('location: login.php');
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
                <div class="title_form">Código Recuperação</div>
                <div class="conatiner_codigo_input">
                    <input minlength="1" maxlength="1" pattern="[0-9]" name='1' type="text"  oninput="this.value = this.value.replace(/[^1-9]/g, '')"   required>
                    <input minlength="1" maxlength="1" pattern="[0-9]" name='2' type="text"  oninput="this.value = this.value.replace(/[^1-9]/g, '')"   required>
                    <input minlength="1" maxlength="1" pattern="[0-9]" name='3' type="text"  oninput="this.value = this.value.replace(/[^1-9]/g, '')"   required>
                    <input minlength="1" maxlength="1" pattern="[0-9]" name='4' type="text"  oninput="this.value = this.value.replace(/[^1-9]/g, '')"   required>
                    <input minlength="1" maxlength="1" pattern="[0-9]" name='5' type="text"  oninput="this.value = this.value.replace(/[^1-9]/g, '')"   required>
                </div>
                <div class="text_descricao_form">Digite o código enviado no e-mail.</div>
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="container_btn_login">
                    <button name='enviar'>Validar</button>
                </div>
                <span class="text_cadastro">Já possui cadastro? <a href="login.php">Faça login</a></span>

            </form>
        </div>
    
    </main>

    
</body>
</html>