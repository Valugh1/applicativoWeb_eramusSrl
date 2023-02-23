<?php

namespace database_crud;

//include("config.php");

use mysqli;



class crud
{
    //parametri connessione al db
    private static $host = "127.0.0.1";
    private static $user = "root";
    private static $password = "";
    private static $db = "progetto_negozio";

    private static function getConn(): mysqli
    {
        return new mysqli(self::$host, self::$user, self::$password, self::$db);
    }

    public static function create($user, $pass, $fname, $lname): bool
    {
        $username = self::getConn()->real_escape_string($user);
        $hashed_password = self::getConn()->real_escape_string(md5($pass));
        $nome = self::getConn()->real_escape_string($fname);
        $cognome = self::getConn()->real_escape_string($lname);
        $sqlQuery = "INSERT INTO utenti (username, password, nome, cognome) VALUES ('$username', '$hashed_password', '$nome', '$cognome')";

        if (self::getConn()->query($sqlQuery) == true) {
            return true;
        } else {
            return false;
        }




        //var_dump($insert_utenti->bind_param('ssss', $username, $hashed_password, $nome, $cognome));

        //var_dump($insert_utenti->execute());
        /*if ($insert_utenti == true) {

            $insert_utenti->bind_param("ssss", $username, $hashed_password, $nome, $cognome);
        } else {
            die("Errore nella query SQL: " . self::getConn()->error);
        }

        if ($insert_utenti->execute() == true) {
            header("location: ../index.php");
        } else {
            //die("Errore registrazione utente $sqlQuery: " . self::getConn()->error);
            echo "<pre>";
            var_dump(self::getConn());
        }*/
    }

    public static function read($search)
    {
        $sqlQuery = "SELECT * FROM `utenti` WHERE id like '%$search%' OR username like '%$search%' OR nome like '%$search%' OR cognome like '%$search%'";
        if (self::getConn()->query($sqlQuery) == true) {
            return self::getConn()->query($sqlQuery);
        } else {
            return false;
        }
    }

    public static function update()
    {
    }

    public static function delete()
    {
    }
}
