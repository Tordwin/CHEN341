<?php

class DB {
    private $conn;

    function __construct() {
        $this->conn = new mysqli($_SERVER['DB_SERVER'], $_SERVER['DB_USER'], $_SERVER['DB_PASSWORD'], $_SERVER['DB']);
        if ($this->conn->connect_error) {
            echo "DB connection failed: ".mysqli_conn_error();
            die();
        }
    }//construct

    function getAllPeople() {
        $data = [];
        if ($stmt = $this->conn->prepare("SELECT * FROM people")) {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($id, $last, $first, $nick);
            if ($stmt->num_rows > 0) {
                while ($stmt->fetch()) {
                    $data[] = [
                        'id' => $id,
                        'first' => $first,
                        'last' => $last,
                        'nick' => $nick
                    ];
                }//while fetch
            }//if num_rows > 0
        } 
        return $data;
    }//getAllPeople

    function getAllPeopleAsTable() {
        $data = $this->getAllPeople();
        if (count($data) > 0) {    
            $bigString = "<table border='1'>\n
                <tr><th>ID</th><th>First</th><th>Last</th><th>Nick</th></tr>\n";
            foreach ($data as $row) {
                $bigString .= "<tr>
                <td><a href='phones.php?{$row['id']}'>{$row['id']}</a></td>
                <td>{$row['first']}</td>
                <td>{$row['last']}</td>
                <td>{$row['nick']}</td>
                </tr>\n";
            }//foreach

            $bigString .= "</table>\n";

        } else {
            $bigString = "<h2>No People Exist</h2>";
        }

        return $bigString;
    }//getAllPeopleAsTable

    function insert($last, $first, $nick) {
        $query = 'INSERT INTO people (LastName, FirstName, NickName)
         VALUES (?, ?, ?)';

        $lastInsertId = -1;

        if ($stmt = $this->conn->prepare($query)) {
            
            $stmt->bind_param('sss', $last, $first, $nick);
            $stmt->execute();
            $stmt->store_result();
            $lastInsertId = $stmt->insert_id;

        }
    }//insert

    function delete($id) {

        $query = 'DELETE FROM people WHERE PersonID = ?';

        $numRows = 0;

        if ($stmt = $this->conn->prepare($query)) {
            
            $stmt->bind_param('i', intval($id));
            $stmt->execute();
            $stmt->store_result();
            $numRows = $stmt->affectedRows;

        }
    }//delete

    function update($fields){
        ///should do some validation as well as other methods
        $query = "UPDATE people SET ";
        $updateId = 0;
        $numRows = 0;
        $items = [];
        $types = "";

        foreach ($fields as $k=>$v) {
            switch($k) {
                case "nick":
                    $query .= "NickName = ?,";
                    $items[] = &$fields[$k];
                    $types .= "s";
                    break;
                case "last":
                    $query .= "LastName = ?,";
                    $items[] = &$fields[$k];
                    $types .= "s";
                    break;
                case "id":
                    $updateId = intval($fields[$k]);
                    break;
            }
        }//foreach
        $query = tnorim($query,",");
        $query .= " WHERE PersonID = ?";
        $types .= "i";
        $items[] = &$updateId;

        if ($stmt = $this->conn->prepare($query)) {
            $refArr = array_merge([$types], $items);

            $ref = new ReflectionClass('mysqli_stmt');
            $method = $ref->getMethod("bind_param");
            $method->invokeArgs($stmt, $refArr);

            $stmt->execute();
            $stmt->store_result();
            $numRows = $stmt->affected_rows;
        }
        return $numRows;
    }//update
}//DB