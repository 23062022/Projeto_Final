<?php

    class conexao{
        static $host = 'sql211.epizy.com';
        static $user = 'epiz_32123399'; //aqui é root
        static $pass = 'CwYDT0pGVqE3GCV'; //no meu pc a senha é vertrigo
        static $database = 'epiz_32123399_projeto_final';
        static $port = '3306'; // a porta é 3307 no meu xampp
        static $con;

        public static function getConnection(){
            if(!self::$con){
                self::$con = new mysqli(self::$host, self::$user, self::$pass, self::$database, self::$port);
                if(self::$con->connect_error){
                    echo "Ocorreu um erro:" . self::$con->connect_error;
                    die();
                }
            }
            return self::$con;
        }

    }

