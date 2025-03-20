<?php

require '../../App/config.inc.php';


$aluno = new Aluno();


$id_aluno = $_GET['id_aluno'];


$result = $aluno->excluirAluno($id_aluno);


if($result){
    echo '<script>
            alert("Aluno excluído com sucesso!");
            window.history.back(); 
          </script>';
} else {
    echo '<script>
            alert("Erro ao excluir!");
            window.history.back();
          </script>';
}
