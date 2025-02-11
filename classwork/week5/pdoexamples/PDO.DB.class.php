<?php

class DB {
    private $dbh;
    function __construct() {
        try {

            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}",$_SERVER['DB_USER'],$_SERVER['DB_PASSWORD']);

            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch (PDOExecption $e) {
            echo $e->getMessage();
            die("Bad Database");
        }
    }//cnstruct

    function getPerson($id) {
        $data = [];
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM people WHERE PersonID = :id");
            $stmt->execute(['id'=>$id]); // bind and execute at the same time
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }

        }
        catch (PDOExecption $e) {
            echo $e->getMessage();
        }
        return $data;
    }//getPerson

    function getPersonAlt($id) {
        $data = [];
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM people WHERE PersonID = :id");
            $stmt->bindPAram(":id", $id, PDO::PARAM_INT); // bind and execute at the same time
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }

        }
        catch (PDOExecption $e) {
            echo $e->getMessage();
        }
        return $data;
    }//getPersonAlt

    function getPersonAlt3($id) {
        $data = [];
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM people WHERE PersonID = :id");
            $stmt->execute(["id"=>$id]);
            $data = $stmt->fetchAll();

        }
        catch (PDOExecption $e) {
            echo $e->getMessage();
        }
        return $data;
    }//getPerson
}//DB