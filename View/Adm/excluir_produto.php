<?php

require '../../App/config.inc.php';


$produto = new Produto();


$id_produto = $_GET['id_produto'];


$result = $produto->excluirProduto($id_produto);


if($result){
    echo '<script>
            alert("Produto excluído com sucesso!");
            window.history.back(); 
          </script>';
} else {
    echo '<script>
            alert("Erro ao excluir!");
            window.history.back();
          </script>';
}
