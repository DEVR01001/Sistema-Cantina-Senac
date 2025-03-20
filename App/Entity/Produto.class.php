<?php


require_once(__DIR__ . '/../DB/Database.php');



class Produto{

    public int $id_produto;
    public string $nome;
    public float $preco;
    public string $descricao;
    public string $categoria;
    public string $nutricional;
    public ?int $quantidade;



    
    
    public function cadastrarProduto(){
        $db = new Database('produto');
        

        $result = $db->insert([
            'nome' => $this->nome,
            'preco' => $this->preco,
            'descricao' => $this->descricao,
            'nutricional' => $this->nutricional, 
            'categoria' => $this->categoria, 

        ]);


        return True;

    }


    public static function buscarProduto($where=null,$order=null,$limit=null){
        return (new Database('produto'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }


    

    public static function buscarProdutoId($id){
        return (new Database('produto'))->select('id_produto = "'. $id .'"')->fetchObject(self::class);
    }




    public static function buscarCategoria($where){
        return (new Database('produto'))->select('categoria = "'. $where .'"')->fetchAll(PDO::FETCH_ASSOC);
    }


    public function editarProduto(){
        return (new Database('produto'))->update('id_produto ='. $this->id_produto,[

                'nome' => $this->nome,
                'preco' => $this->preco,
                'descricao' => $this->descricao,
                'nutricional' => $this->nutricional, 
                'categoria' => $this->categoria, 

        ]);

        
    }


    public function excluirProduto($id){
        return (new Database('produto'))->delete('id_produto = '.$id);

    }











}