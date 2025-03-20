<?php


require_once(__DIR__ . '/../DB/Database.php');



class Aluno{

    public int $id_aluno;
    public string $nome;
    public string $sobrenome;
    public string $email;
    public int $telefone;
    public string $senha;
    public int $matricula;



    
    
    public function cadastrarAluno(){
        $db = new Database('aluno');
        

        $result = $db->insert([
            'nome' => $this->nome,
            'sobrenome' => $this->sobrenome,
            'email' => $this->email,
            'matricula' => $this->matricula,
            'telefone' => $this->telefone,
            'senha' => $this->senha, 

        ]);


        return True;

    }


    public static function getPorEmail($where=null, $order =null, $limit = null){

        return (new Database('aluno'))->select('email = "'. $where .'"')->fetchObject(self::class);


    }

    public static function AlunoPorId($id){
        return (new Database('produto'))->select('id_aluno = "'. $id .'"')->fetchObject(self::class);
    }


    
    public function editarAluno(){
        return (new Database('aluno'))->update('id_aluno ='. $this->id_aluno,[

                'nome' => $this->nome,
                'sobrenome' => $this->sobrenome,
                'email' => $this->email,
                'matricula' => $this->matricula,
                'telefone' => $this->telefone,
                'senha' => $this->senha, 

        ]);

        
    }


    public static function buscarAluno($where=null,$order=null,$limit=null){
        return (new Database('aluno'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }



    
    public function excluirAluno($id){
        return (new Database('aluno'))->delete('id_aluno = '.$id);

    }





}