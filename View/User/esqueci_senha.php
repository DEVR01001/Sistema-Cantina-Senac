<?php
require '../../App/config.inc.php';
include "../../Includes/Head/head.php";
require '../../App/Session/Login.php';


Login::requireLogout();



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../App/PHPMailer-master/src/Exception.php';
require '../../App/PHPMailer-master/src/PHPMailer.php';
require '../../App/PHPMailer-master/src/SMTP.php';

function CodigoEmail($email,$nome){
                
    $codigoRe = '';
    $i = 0;
    while ($i < 5){
            $num = rand(1,9);
            $codigoRe .=  $num;
            $i+=1;
    }

    $mail = new PHPMailer(true);
    
    $token = array($codigoRe,$email);


    $result = $_SESSION['ce'] = $token;


    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->SMTPAuth = true;
    $mail->Username = 'rafa.rodriques12@gmail.com'; 
    $mail->Password = 'ehtc rvvq kzot lars'; 

    $mail->setFrom('inspiraTalksoficial@gmail.com', 'Sistema Cantina');
    $mail->addAddress($email, $nome); 

    $mail->Subject = 'Recuperação de Senha';
    $mail->CharSet = 'UTF-8';
    $mail->msgHTML("<p><br>Cole o codigo para recuperar a sua senha:</br></p> Código: $codigoRe. <br>
    http://localhost/InspiraTalks/View/User/codigo_esqueci_senha.php?ce=");


    if (!$mail->send()) {
        return false;
    } else {

        return $result;
    }

}


$erro = '';
$Sucess = '';

if(isset($_POST['salvar'])){

    if(!empty($_POST['email'])){
        $email = $_POST['email'];


        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = 'Email inválido';
        }else{



            $inscrito = Aluno::getPorEmail($email);

            $adm = Adm::getPorEmail($email);


            if(!$inscrito){
                $erro='Email não encontrado';
            }else{
                $nomeInscrito = $inscrito->nome;
                $emailInscrito = CodigoEmail($email,$nomeInscrito);
                
                if($emailInscrito){
                    header('location: codigo_esqueci_senha.php?ce='.$emailInscrito.'');
                    die();
                }else{
                    $erro='Não foi possivel enviar o email';
                }

            }


            if(!$adm){
                $erro='Email não encontrado';
            }else{
                $nomeAdm = $adm->nome;
                $emailAdm = CodigoEmail($email,$nomeAdm);

                if($emailAdm){
                    header('location: codigo_esqueci_senha.php?ce='.$emailAdm.'');
                }else{
                    $erro='Não foi possivel enviar o email';
                }

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
                <div class="title_form">Recuperação de Senha</div>
                <div class="item_flex">
                    <label for="">Email</label>
                    <input name='email' type="text">
                </div>
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="container_btn_login">
                    <button name='salvar'>Enviar</button>
                </div>
                <span class="text_cadastro">Já possui cadastro? <a href="login.php">Faça login</a></span>

            </form>
        </div>
    
    </main>

    
</body>
</html>