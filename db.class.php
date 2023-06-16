<?php

class DB {
    private $host = 'localhost';
    private $username = 'admin';
    private $password = 'admin';
    private $database = 'panier';
    public $db;


    // paramètres de la fonction //
    public function __construct($host = null, $username = null, $password = null, $database = null) {
        if ($host !== null) {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        // connexion a la base et gérer les messages d'erreur
    
        try {
    $this->db = new PDO('mysql:host='. $this->host.';dbname='. $this->database, $this->username, $this->password, 
    array
    (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    
        } catch(PDOException $e) {
            die('<h1>impossible de ce connecter a la bdd </h1>');
        }
    }

    public function query($sql ,$data = array()) {
        $req=$this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ); }

    }



