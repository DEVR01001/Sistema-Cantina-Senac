<?php




class Database{

public $conection;
public string $local ='localhost';
public string $db = 'SistemaCantina';
public string $user ='root';
public string $password = '';
public $table;



public function __construct($table = null){
    $this->table = $table;
    $this->conecta();

}



public function conecta(){
    try{
        $this->conection = new PDO("mysql:host=".$this->local.";dbname=$this->db",
        $this->user,$this->password); 
        $this->conection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return true;
    }catch (PDOException $err){
        die("Connection Failed" . $err->getMessage());
        return false;
    }
}




public function execute($query,$binds = []){
    try{
        $stmt = $this->conection->prepare($query);
        $stmt->execute($binds);
        return $stmt;
    }catch (PDOException $err) {
    
        die("Connection Failed " . $err->getMessage());

    }

}


public function insert($values){

    $fields = array_keys($values);
    $binds = array_pad([],count($fields),'?');

    $query = 'INSERT INTO ' . $this->table .'  (' .implode(',',$fields). ') VALUES (' .implode(',',$binds).')';

    $this->execute($query,array_values($values));

    return $this->conection->lastInsertId();
    
}


public function select($where=null, $order=null, $limit=null, $fields = '*'){



    $where = strlen($where) ? 'WHERE '.$where : '';
    $order = strlen($order) ? 'ORDER '.$order : '';
    $limit = strlen($limit) ? 'LIMIT '.$limit : '';

    $query = 'SELECT '.$fields.' FROM '. $this->table.' '.$where.' '.$order.' '.$limit;


    return $this->execute($query);
    
}







public function delete($where){
    $query = ' DELETE FROM '.$this->table.' WHERE '.$where;

    $result = $this->execute($query);

    return true;

}



public function update($where, $values){
    
    $fields = array_keys($values);

    $query = ' UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

    $this->execute($query,array_values($values));
    
    return  true;

}


}