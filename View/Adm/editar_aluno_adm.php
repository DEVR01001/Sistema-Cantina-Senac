<?php



require '../../App/config.inc.php';

include "navbar_adm.php";

include "../../Includes/Head/head.php";
require '../../App/Session/Login.php';


Login::requireLogin('adm');

$erro = '';
$Sucess = '';




$id_aluno = $_GET['id_aluno'];



$dados = Aluno::AlunoPorId($id_aluno);


$nome = $dados->nome;
$sobrenomeInscrito = $dados->sobrenome;
$email = $dados->email;
$senha = $dados->senha;
$telefone = $dados->telefone;
$matricula = $dados->matricula;




if(isset($_POST['editar'])){


       
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erro = 'Email inválido';
    }else{

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $telefone= $_POST['telefone'];
        $matricula = $_POST['matricula'];


        $aluno = new Aluno();

        $aluno->id_aluno = $id_aluno;
        $aluno->nome = $nome;
        $aluno->sobrenome = $sobrenome;
        $aluno->email = $email;
        $aluno->telefone = $telefone;
        $aluno->matricula = $matricula;
        $aluno->senha = $senhaInscrito;

        $result = $aluno->editarAluno();


        if($result){
            $Sucess= 'Salvamento realizado com sucesso.';
        }else{
            $erro = 'Não foi possivel salvar.';

        }

    }
}


?>

    <main class="main_user">
        <section class="Header_area_user">
            <div class="banner_item_event">
                <img src="../../Public/Img/istockphoto-1365415787-612x612.jpg" alt="">
                <div class="shape_overlod_banner"></div>
                <span class="title_name_event">Editar Perfil</span>
            </div>
        </section>
        <section class="area_palestra_form">
        <form method='post' action=""  enctype = "multipart/form-data">
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="item_flex_user">
                    <label for="">Nome</label>
                    <input name='nome' type="text" value='<?php echo $nome; ?>'>
                </div>
                <div class="item_flex_user">
                    <label for="">Sobrenome</label>
                    <input name='sobrenome' type="text" value='<?php echo $sobrenome; ?>'>
                </div>
                <div class="item_flex_user">
                    <label for="">Email</label>
                    <input name='email' type="text" value='<?php echo $email; ?>'>
                </div>
                <div class="item_flex_user">
                    <label for="">Telefone</label>
                    <input name='telefone' type="tel" value='<?php echo $telefone; ?>'>
                </div>
                <div class="item_flex_user">
                    <label for="">Matricula</label>
                    <input name='matricula' type="number" value='<?php echo $matricula; ?>'>
                </div>
                <div class="item_flex_user">
                    <label for="">Senha</label>
                    <input name='senha' type="password" value='<?php echo $senha; ?>'>
                </div>
                <div class="conatiner_btn_form_incricao">
                    <button name='editar' >Salvar</button>
                </div>
            </form>
        </section>
        

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