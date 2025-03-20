<?php

require '../../App/config.inc.php';


include "../../Includes/Head/head.php";
include "navbar_adm.php";


require '../../App/Session/Login.php';
Login::requireLogin('adm');





$erro = '';
$Sucess = '';


if(isset($_POST['cadastrar'])){

    if(!empty($_POST['email']) && !empty($_POST['senha'])  && !empty($_POST['nome'])){

        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erro = 'Email inválido';
        }else{

            $newAdm = new Adm();
        
            $newAdm->nome = $nome;
            $newAdm->email = $email;
            $newAdm->senha = $senha;



            $result = $newAdm->cadastrarAdm();
        

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


        

    <main class="main_user">
        <section class="area_palestra_form">
            <form method="post" action="">
                <div class="title_form">Cadastrar Adm</div>
                <div class="item_flex_user">
                    <label for="">Nome</label>
                    <input name="nome" type="text">
                </div>
                <div class="item_flex_user">
                    <label for="">Email</label>
                    <input name="email" type="text">
                </div>
                <div class="item_flex_user">
                    <label for="">Senha</label>
                    <input name="senha" type="password">
                </div>
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="conatiner_btn_form_incricao">
                    <button name='cadastrar' >Cadastrar</button>
                </div>
            </form>
        </section>

        <script>
            function validarEmail(email) {
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }
        </script>

    </main>
    <footer class="footer_user">

        <div class="container_redes">
            <i class="fa-brands fa-instagram"></i>
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
        </div>

    </footer>
    
</body>
</html>