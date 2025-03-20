<?php


require '../../App/config.inc.php';
include "../../Includes/Head/head.php";
include "navbar_adm.php";

require '../../App/Session/Login.php';
Login::requireLogin('adm');



$dados = new Adm();
$dadosItem = $dados->buscarAdm();



?>



<main>
    <div class="container_listar">
        <div class="container_title">
            <div class="conatiner_text_listar_adm">
                <h1>Adm</h1>
            </div>
            <div class="conatiner_cadastrar_item_adm">
                <a href="cadastrar_adm.php">+ Adm</a>
            </div>
            <div class="conatiner_cadastrar_item_adm2">
                <a href="gerar_adm_evento.php">Gerar Relatório</a>
            </div>
        </div>
        <table>
            <tr>
                <th id='esconde_item2'>
                    N° Adm
                </th>
                <th id='esconde_item2'>
                    Nome
                </th>
                <th>
                    Email
                </th>
                <th class="active_tr">
                   ações
                </th>

            </tr>
            <tr>
                <?php
                    foreach($dadosItem as $adm){
                        echo '
                            <tr>
                                <td id="esconde_item2" class="adm-1">'.$adm['id_adm'].'</td>
                                <td>
                                <td id="esconde_item2" class="adm-1">'.$adm['nome'].'</td>
                                <td>
                                    <div class="text_nome">
                                        '.$adm['email'].'
                                    </div>
                                </td>
                                <td> 
                                    <div class="conatiner_icon">
                                        <i class="fa-solid fa-bars iconteste">
                                            <div class="drop_down">
                                                <a href="editar_evento_adm.php?id_adm='.$adm['id_adm'].'"><i class="fa-solid fa-pencil"></i></a>
                                                <a href="excluir_evento_adm.php?id_adm='.$adm['id_adm'].'"><i class="fa-solid fa-trash"></i></a>
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

    