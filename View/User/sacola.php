<?php




include "../../Includes/Head/head.php";
include "navbar_logado.php";
require '../../App/config.inc.php';

require '../../App/Session/Login.php';


Login::requireLogin('aluno');

$erro = '';

$id_produto = $_GET['id_produto']

$id_aluno = $_SESSION['aluno']['id_aluno'];



$dados = new Produto();

$dadosItem = $dados->buscarProdutoId($id_produto);

$codigo = '';

$i = 0;
while ($i < 10){
        $num = rand(1,9);
        $codigo .=  $num;
        $i+=1;
}

if(isset($_POST['comprar'])){

    if(empty($_POST['horario'])){

        $erro='Peencha o horario';


    }else{
        
        $pedido = new Pedido();


        $pedido->status = 'NP';
        $pedido->preco = $dadosItem->preco;
        $pedido->id_produto = $id_produto;
        $pedido->codigo = $codigo;
        $pedido->id_aluno = $id_aluno;


        $result = $pedido->cadastrarPedido();


        if($result){

            $reserva = new Reservar();


            $reserva->id_pedido = $result;
            $reserva->id_aluno = $id_aluno;
    
    
            $result =  $reserva->cadastrarReserva();
    
    
    

        }else{
            $erro='Não foi possivel fazer a reserva';
        }


        
        if($result){

            echo ' <script> alert("Pedidos Realizado com sucesso)" </script>';
            header('location: meus_pedidos.php')

        }else{
            echo ' <script> alert("Pedido não pode ser feito)" </script>';
            header('location: area_user_cardapio.php')

        }
    


    }




    

}






?>


    <main class="main_user">
        <section class="Header_area_user">
            <div class="title_header_area_user">
                Sacola
            </div>
        </section>
        <section class="body_area_user">
            <div class="conatiner_flex_wrap__card">
            <?php
                if (!empty($dadosItem)) {
                    foreach($dadosItem as $produto){
                        echo '
                            <a href="area_user_palestras.php?id_produto='.$produto['id_produto'].'" class="card_item">
                                <div class="conatiner_img_card">
                                    <img src="'.$produto['foto'].'" alt="">
                                    <div class="shape_overlod"></div>
                                </div>
                                <div class="text_nome_item">'.$produto['nome'].'</div>
                                <div class="descricao_nome_item">'.$produto['descricao'].'</div>
                                <div class="horario_nome_item">'.$produto['categoria'].' H</div>                  
                                <div class="horario_nome_item">'.$produto['preco'].'</div>                  
                            </a>';   
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }
                
            ?>  
            </div>
            <div class="title_header_area_user">
                    <div class="conatiner_login">
                    <form method='post' action="">
                        <div class="item_flex">
                            <label for="">Digite um horario de retirada: </label>
                            <input name='nome' type="time">
                        </div>
                        <div class="conatiner_alert">
                            <div class="alertErro"><?php echo $erro; ?></div>
                            <div class="alertSucesso"><?php echo $Sucess; ?></div>
                        </div>
                        <button name='comprar'>Comprar</button>
                    </form>
                </div>
            </div>
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