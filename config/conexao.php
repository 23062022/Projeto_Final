<?php

    class conexao{
        static $host = '127.0.0.1';
        static $user = 'root';
        static $pass = 'vertrigo';//no meu pc acabei colocando senha, mas me deu uma baita dor de cabeça
        static $database = 'db_projeto_final_3e';
        static $port = '3307'; // tive que mudar a porta para que o xampp funcionasse
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

