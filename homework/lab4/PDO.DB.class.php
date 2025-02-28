<?php

class DB {
    private $dbh;
    function __construct() {
        try {

            $this->dbh = new PDO("mysql:host={$_SERVER['DB_SERVER']};dbname={$_SERVER['DB']}",$_SERVER['DB_USER'], $_SERVER['DB_PASSWORD']);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Bad Database");
        }
    }//construct

    public function getConn() {
        return $this->dbh;
    }//getConn

    function getPerson($id) {
        $data = [];
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM people WHERE PersonID = :id");
            $stmt->execute(['id'=>$id]); // bind and execute at the same time
            while ($row = $stmt->fetch()) {
                $data[] = $row;
            }

        } catch (PDOException $e) {
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

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $data;
    }//getPersonAlt

    function getPersonAlt2($id) {
        $data = [];
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM people WHERE PersonID = :id");
            $stmt->execute(["id"=>$id]);
            $data = $stmt->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $data;
    }//getPersonAlt2

    function insert($last,$first,$nick) {
        try {
            $stmt = $this->dbh->prepare("INSERT INTO people (LastName, FirstName, NickName) VALUES (:last, :first, :nickName)");
            $stmt->execute(['last'=>$last, 
                            'first'=>$first, 
                            'nickName'=>$nick
            ]);//bind and execute at the same time

            return $this->dbh->lastInsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }//insert

    function getAllObjects() {
        try {
            $stmt = $this->dbh->prepare("SELECT * FROM people");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Person");
            while ($person = $stmt->fetch()) {
                $data[] = $person;
            }
            if (count($data) > 0) {    
                $bigString = "<table border='1'>\n
                    <tr><th>ID</th><th>First</th><th>Last</th><th>Nick</th></tr>\n";
                foreach ($data as $row) {
                    $bigString .= "<tr>
                    <td><a href='lab4_4.php?id=".$row['PersonID']."'>".$row['PersonID']."</a></td>
                    <td>{$row['LastName']}</td>
                    <td>{$row['FirstName']}</td>
                    <td>{$row['NickName']}</td>
                    </tr>\n";
                }//foreach
    
                $bigString .= "</table>\n";
    
            } else {
                $bigString = "<h2>No People Exist</h2>";
            }
    
            return $bigString;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }//getAllObjects
}//DB