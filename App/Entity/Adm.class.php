<?php


require_once(__DIR__ . '/../DB/Database.php');



class Adm{

    public int $id_adm;
    public string $nome;
    public string $email;
    public string $senha;



    
    public function cadastrarAdm(){
        $db = new Database('adm');
        

        $result = $db->insert([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha, 

        ]);


        return True;

    }



    public static function getPorEmail($where=null, $order =null, $limit = null){

        return (new Database('adm'))->select('email = "'. $where .'"')->fetchObject(self::class);


    }


    public function atualizarSenha(){
        return (new Database('adm'))->update('id_adm ='. $this->id_adm,[
                                'senha'=> $this->senha,

        ]);

        
    }


    public static function buscarAdm($where=null,$order=null,$limit=null){
        return (new Database('adm'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }



 


    public function excluirAdm($id){
        return (new Database('adm'))->delete('id_adm = '.$id);

    }




     
    public function editarAdm(){
        return (new Database('adm'))->update('id_adm ='. $this->id_adm,[

                    'email' => $this->email,
                    'senha' => $this->senha,


        ]);

        
    }











}



