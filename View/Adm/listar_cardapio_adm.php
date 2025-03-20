<?php


require '../../App/config.inc.php';
include "../../Includes/Head/head.php";
include "navbar_adm.php";

require '../../App/Session/Login.php';
Login::requireLogin('adm');



$dados = new Produto();
$dadosItem = $dados->buscarProduto();




?>



<main>
    <div class="container_listar">
        <div class="container_title">
            <div class="conatiner_text_listar_adm">
                
                <h1>Produtos</h1>
            </div>
            <div class="conatiner_cadastrar_item_adm">
                <a href="cadastrar_produto_adm.php">+ Produto</a>
            </div>
            <div class="conatiner_cadastrar_item_adm2">
                <a href="gerar_adm_evento.php">Gerar Relatório</a>
            </div>
        </div>
        <table>
            <tr>
                <th id='esconde_item2'>
                    N° Produto
                </th>
                <th>
                    Nome Produto
                </th>
                <th class="active_tr">
                   Categoria
                </th>
                <th>
                   Preço
                </th>
                <th class="active_tr">
                   ações
                </th>

            </tr>
            <tr>
                <?php
                    foreach($dadosItem as $produto){
                        echo '
                            <tr>
                                <td id="esconde_item2" class="adm-1">'.$produto['id_produto'].'</td>
                                <td>
                                    <div class="text_nome">
                                        '.$produto['nome'].'
                                    </div>
                                </td>
                                <td class="active_tr">'.$produto['categoria'].'</td>
                                <td>'.$produto['preco'].'</td>
                                <td> 
                                    <div class="conatiner_icon">
                                        <i class="fa-solid fa-bars iconteste">
                                            <div class="drop_down">
                                                <a href="editar_produto.php?id_produto='.$produto['id_produto'].'"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="excluir_evento_adm.php?id_produto='.$produto['id_produto'].'"><i class="fa-solid fa-trash"></i></a>
                                            </div>
                                        </i>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }
                    ?>

            </tr>
        </table>
    </div>
</main>

    