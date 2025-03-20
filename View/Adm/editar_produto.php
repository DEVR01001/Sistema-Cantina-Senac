
<?php

require '../../App/config.inc.php';
include "../../Includes/Head/head.php";
include "navbar_adm.php";
require '../../App/Session/Login.php';


Login::requireLogin('aluno');



$erro = '';
$Sucess = '';

$id_produto = $_GET['produto'];


$dados = Produto::buscarProdutoId($id_aluno);


$nome = $dados->nome;
$preco = $dados->preco;
$descricao = $dados->descricao;
$nutricional = $dados->telefone;
$categoria = $dados->categoria;




if(isset($_POST['editar'])){


       
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erro = 'Email inválido';
    }else{

        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['desri$descricao'];
        $nutricional= $_POST['nutricional'];
        $categoria = $_POST['categoria'];


        $produto = new Produto();

        $produto->id_produto = $id_produto;
        $produto->nome = $nome;
        $produto->preco = $preco;
        $produto->descricao = $descricao;
        $produto->nutricional = $nutricional;
        $produto->categoria = $categoria;

        $result = $produto->editarProduto();


        if($result){
            $Sucess= 'Salvamento realizado com sucesso.';
        }else{
            $erro = 'Não foi possivel salvar.';

        }

    }
}


?>


<body>
    <main class="main_user">
        <div class="conatiner_login">
            <form method='post' action="">
                <div class="title_form">Editar Produto</div>
                <div class="item_flex">
                    <label for="">Nome</label>
                    <input name='nome' type="text" values='<?php echo $descricao; ?>'>
                </div>
                <div class="item_flex">
                    <label for="">Categoria</label>
                    <select name="categoria" id="" values='<?php echo $categoria; ?>'>
                        <option value="bebida">Bebidas</option>
                        <option value="doce">Doces</option>
                        <option value="lanche">Lanches</option>
                    </select>
                </div>
                <div class="item_flex">
                    <label for="">Descrição</label>
                    <textarea name="descricao" id="" cols="30" rows="10"><?php echo $descricao; ?></textarea>
                </div>
                <div class="item_flex">
                    <label for="">Preco</label>
                    <input name='preco' type="floar" values='<?php echo $preco; ?>'>
                </div>
                <div class="item_flex">
                    <label for="">Valores Nutricionais</label>
                    <textarea name="valorNutricional" id="" cols="30" rows="10"><?php echo $nutricional; ?></textarea>
                </div>
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="container_btn_login">
                    <button name='editar' >Salva</button>
                </div>

            </form>
        </div>
    
    </main>

    
</body>
</html>