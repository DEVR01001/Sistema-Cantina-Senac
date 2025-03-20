<?php


require_once(__DIR__ . '/../DB/Database.php');



class Pedido{

    public int $id_pedido;
    public string $status;
    public float $precoTotal;
    public int $codigo;
    public int $id_produto;
    public int $id_aluno;



    
    
    public function cadastrarPedido(){
        $db = new Database('pedido');
        

        $result = $db->insert([
            'status' => $this->status,
            'precoTotal' => $this->precoTotal,
            'id_produto' => $this->id_produto,
            'codigo' => $this->codigo,
            'id_aluno' => $this->id_aluno, 

        ]);


        return $result;

    }


    public static function buscarPedidoId($id){
        return (new Database('pedido'))->select('id_pedido = "'. $id .'"')->fetchObject(self::class);
    }

    public static function buscarPedido($where=null,$order=null,$limit=null){
        return (new Database('pedido'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }


    public function atualizarStatusPedido(){
        return (new Database('pedido'))->update('id_produto ='. $this->id_produto,[

                'status' => $this->status,
        ]);

        
    }
















}