<?php


include "../../Includes/Head/head.php";
include "navbar_logado.php";
require '../../App/config.inc.php';

require '../../App/Session/Login.php';


Login::requireLogin('aluno');




$dados = new Produto();

$categoria = 'doce';

$dadosItem = $dados->buscarCategoria($categoria);






?>


    <main class="main_user">
        <section class="Header_area_user">
            <div class="title_header_area_user">
                Doces
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
                                <a class="horario_nome_item" href="sacola.php?id_produto='.$produto['id_produto'].'">Carrinho</a>                 
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