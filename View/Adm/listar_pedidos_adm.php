<?php


require '../../App/config.inc.php';
include "../../Includes/Head/head.php";
include "navbar_adm.php";

require '../../App/Session/Login.php';
Login::requireLogin('adm');



$dados = new Pedido();
$dadosItem = $dados->buscarPedido();



?>



<main>
    <div class="container_listar">
        <div class="container_title">
            <div class="conatiner_text_listar_adm">
                
                <h1>Pedido</h1>
            </div>
            <div class="conatiner_cadastrar_item_adm">
            </div>
            <div class="conatiner_cadastrar_item_adm2">
                <a href="gerar_adm_evento.php">Gerar Relatório</a>
            </div>
        </div>>
        </div>
        <div class="container_pesquisa">
            <input  name='search' type="search" placeholder="Procurar evento..." id="pesquisar">
            <button  onclick="searchData()" ><i class="fa-solid fa-magnifying-glass"></i>Buscar</button>
        </div>
        <script>
            var search = document.getElementById('pesquisar');
        
            search.addEventListener("keydown", function(event) { 
                if (event.key === "Enter") {
                    searchData();
                }
            });
        
            function searchData() {
                window.location = 'llistar_cardapio_adm.php?search='+(search.value);
            }
        </script>
        <table>
            <tr>
                <th id='esconde_item2'>
                    N° Pedido
                </th>
                <th>
                    Status
                </th>
                <th class="active_tr">
                   Nome Aluno
                </th>
                <th>
                   Preco
                </th>
                <th class="active_tr">
                   ações
                </th>

            </tr>
            <tr>
                <?php
                    foreach($dadosItem as $pedido){
                        echo '
                            <tr>
                                <td id="esconde_item2" class="adm-1">'.$pedido['id_pedido'].'</td>
                                <td>
                                    <div class="text_nome">
                                        '.$pedido['status'].'
                                    </div>
                                </td>
                                <td class="active_tr">'.$pedido['nome_aluno'].'</td>
                                <td>'.$pedido['preco'].'</td>
                                <td> 
                                    <div class="conatiner_icon">
                                        <i class="fa-solid fa-bars iconteste">
                                            <div class="drop_down">
                                                <a href="editar_evento_adm.php?id_pedido='.$pedido['id_pedido'].'"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="excluir_evento_adm.php?id_pedido='.$pedido['id_pedido'].'"><i class="fa-solid fa-trash"></i></a>
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

    