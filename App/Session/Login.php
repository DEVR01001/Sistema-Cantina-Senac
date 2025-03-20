<?php

class Login {

    
    private static function init() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

 
    public static function login($object) {
        self::init();

        $_SESSION['aluno'] = [
            'id_aluno' => $object->id_aluno,
            'email' => $object->email
        ];

        header('location:  ../../View/User/area_user_cardapio.php');
        exit;
    }



    public static function loginADM($object) {
        self::init();

        $_SESSION['adm'] = [
            'id_adm' => $object->id_adm,
            'email' => $object->email
        ];

        header('location:  ../../View/Adm/listar_pedidos_adm.php');
        exit;
    }



 


    public static function isLogged() {
        self::init();
        return isset($_SESSION['aluno']['id_aluno']);
    }

    public static function isLoggedAdm() {
        self::init();
        return isset($_SESSION['adm']['id_adm']);
    }


   


    public static function requireLogin($type) {
        self::init();
        
        switch ($type) {
            case 'inscrito':
                if (!self::isLogged()) {
                    header('location: ../../View/User/login.php');
                    exit;
                }
                break;

            case 'adm':
                if (!self::isLoggedAdm()) {
                    header('location: ../../View/User/login.php');
                    exit;
                }
                break;

        }
    }

    



    public static function requireLogout() {
        self::init();

        if (self::isLogged()) {
            header('location:  ../../View/User/area__user_cardapio.php');
            exit;
        }
        if (self::isLoggedAdm()) {
            header('location:  ../../View/Adm/listar_pedidos_adm.php');
            exit;
        }

    }




    public static function logout() {
        self::init();
        session_unset();
        session_destroy();
        header('location: ../../View/User/login.php');
        exit;
    }
}

?>
