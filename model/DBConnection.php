<?php

class DBConnection {

    /**
     * Metodo que conecta con la base de datos y devuelve el handler para realizar acciones en esta
     * @return PDO|void
     */
    private function connect(){
        try {
            $user   = "root";
            $pwd    = "1234";
            $host   = "localhost";
            $dbname = "battlenet";
            return new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pwd);
        }catch (PDOException $e){
            print "Error: ". $e->getMessage() . "<br/>";
            die();
        }
    }
}