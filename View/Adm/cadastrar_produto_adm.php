<?php

require '../../App/config.inc.php';

include "navbar_adm.php";

include "../../Includes/Head/head.php";
require '../../App/Session/Login.php';


Login::requireLogin('adm');

$erro = '';
$Sucess = '';


if(isset($_POST['cadastrar'])){

    if(!empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['preco']) && !empty($_POST['valorNutricional'] ) && !empty($_POST['categoria'] )){


        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $preco = $_POST['preco'];
        $valorNutricional = $_POST['valorNutricional'];



        $produto = new Produto();
    

        $produto->nome = $nome;
        $produto->descricao = $descricao;
        $produto->preco = $preco;
        $produto->categoria = $categoria;
        $produto->nutricional = >$valorNutricional;
    

        $result = $produto->cadastrarProduto();
    

        if($result){
            $Sucess= 'Cadastro Realizado com sucesso.';
        }else{
            $erro = 'Não foi possivel realizar cadastro.';
    
        }
    
    
    
    }else{

        $erro='Preencha-os campos';

    }

}


?>

<body>
    <main class="main_user">
        <div class="conatiner_login">
            <form method='post' action="">
                <div class="title_form">Cadastro Produto</div>
                <div class="item_flex">
                    <label for="">Nome</label>
                    <input name='nome' type="text">
                </div>
                <div class="item_flex">
                    <label for="">Categoria</label>
                    <select name="categoria" id="">
                        <option value="bebida">Bebidas</option>
                        <option value="doce">Doces</option>
                        <option value="lanche">Lanches</option>
                    </select>
                </div>
                <div class="item_flex">
                    <label for="">Descrição</label>
                    <textarea name="descricao" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="item_flex">
                    <label for="">Preco</label>
                    <input name='preco' type="floar">
                </div>
                <div class="item_flex">
                    <label for="">Valores Nutricionais</label>
                    <textarea name="valorNutricional" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="conatiner_alert">
                    <div class="alertErro"><?php echo $erro; ?></div>
                    <div class="alertSucesso"><?php echo $Sucess; ?></div>
                </div>
                <div class="container_btn_login">
                    <button name='cadastrar' >Salva</button>
                </div>

            </form>
        </div>
    
    </main>

    
</body>
</html>