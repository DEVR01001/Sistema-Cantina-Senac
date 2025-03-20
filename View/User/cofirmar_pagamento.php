<?php

require '../../App/config.inc.php';


include "../../Includes/Head/head.php";
include "navbar_logado.php";

require '../../App/Session/Login.php';
Login::requireLogin('adm');


$id_pedido = $_GET['id_pedido'];


$pedido = Pedido::buscarPedidoId($id_pedido);

$codigo = $pedido->codigo;



if(isset($_POST['pagamento'])){
    

    $statusAtualizado = $_POST['status'];


    $pedido = new Pedido();

    $pedido->id_pedido =$id_pedido;
    $pedido->status = $statusAtualizado;

    $result = $pedido->atualizarStatusPedido();


    if($result){
        echo' <script> alert("Pagamento Efetuado") </script>;';
        header('location: meus_pedidos.php');
    }else{
        echo' <script> alert("Erro ao realizar pagamento") </script>;';
        header('location: sacola.php');
    }

}



?>


    
    <main class="main_user">
        <section class="area_palestra_form">
            <form method="post" action="">
                <div class="title_form">Confirmar Pagamento</div>
                
                <div class="item_flex_user">
                    <label for="">Código de pagamento</label>
                    <input readonly name="codigo" type="text" value='<?php echo $codigo ?>'>
                    <form method='post' action="">
                        <input style="display:none;"  name='status' type="text" value='P'>
                        <button name='pagamento'>Verificar</button>
                    </form>
                </div>
            </form>
        </section>

    </main>
    
</body>
</html>