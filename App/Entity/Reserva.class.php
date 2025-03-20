<?php


require_once(__DIR__ . '/../DB/Database.php');



class Reserva{

    public int $id_pedido;
    public string $horario;
   
 



    
    public function cadastrarReserva(){
        $db = new Database('reserva');
        

        $result = $db->insert([
            'id_pedido' => $this->id_pedido,
            'id_aluno' => $this->id_aluno,

        ]);


        return $result;

    }

    
    public static function buscarReserva($where=null,$order=null,$limit=null){
        return (new Database('reserva'))->select('')->fetchAll(PDO::FETCH_ASSOC);
    }







}