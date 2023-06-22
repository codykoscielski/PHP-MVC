<?php

    /*
     * PDO Database class
     * Connect to the database
     * create prepared statements
     * bind values
     * return rows and results
     */

    #[AllowDynamicProperties] class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        //The database handler when creating a prepared statement
        private $dbh;
        //The statement
        private $stmt;
        private $error;

        function __construct(){
            //Set DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //Create new PDO
            try {
                $this->dsn = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
    }