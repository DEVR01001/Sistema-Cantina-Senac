<?php




include "../../Includes/Head/head.php";
include "navbar_logado.php";
require '../../App/config.inc.php';

require '../../App/Session/Login.php';


Login::requireLogin('aluno');



$id_aluno = $_SESSION['aluno']['id_aluno'];



$dados = new Pedidos();

$dadosItem = $dados->buscarPedidoId($id_aluno);




// $TotalDeEventos =  Evento::QuantidadeEvento();
// $TotalDePalestras =  Palestra::QuantidadePalestra();





?>


    <main class="main_user">
        <section class="Header_area_user">
            <div class="title_header_area_user">
                Pedidos
            </div>
        </section>
        <section class="body_area_user">
            <div class="conatiner_flex_wrap__card">
            <?php
                if (!empty($dadosItem)) {
                    foreach($dadosItem as $Pedido){
                        echo '
                            <a href="area_user_palestras.php?id_produto='.$Pedido['id_pedido'].'" class="card_item">
                                <div class="conatiner_img_card">
                                    <img src="" alt="">
                                    <div class="shape_overlod"></div>
                                </div>
                                <div class="text_nome_item"> Total: ' .$Pedido['total'].'</div>
                                <div class="descricao_nome_item">'.$Pedido['nomeProduto'].'</div>       
                                <a href="cofirmar_pagamento.php?id_pedido='.$Pedido['id_pedido'].'"class="descricao_nome_item">Pagamento<a/>

                            </a>';   
                    }
                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }
                
            ?>  
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