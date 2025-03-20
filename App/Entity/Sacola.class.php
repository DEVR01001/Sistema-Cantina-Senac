<?php


require_once(__DIR__ . '/../DB/Database.php');



class Sacola{

    public int $id_sacola;
    public int $id_produto;
    public int $id_aluno;
 



    
    public function cadastrarSacola(){
        $db = new Database('aluno');
        

        $result = $db->insert([
            'id_produto' => $this->id_produto,
            'id_aluno' => $this->id_aluno,

        ]);


        return $result;

    }





}