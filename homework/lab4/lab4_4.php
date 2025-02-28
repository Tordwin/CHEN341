<?php
    if (!isset($_GET['id'])) {
        header("Location: lab4_3.php");
        exit();
    }
    require_once('PDO.DB.class.php');
    $db = new DB();
    $id = $_GET['id'];
    $conn = $db->getConn();

    // PDO::FETCH_ASSOC
    try {
        $stmt = $conn->prepare("SELECT * FROM phonenumbers WHERE PersonID = :id");
        $stmt->execute(['id' => $id]);
        $phones = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1>Phone Number(s) for ID: $id</h1>";
        if (count($phones) > 0) {    
            $bigString = "<table border='1'>\n
                <tr><th>Person ID</th><th>Phone Type</th><th>Phone #</th><th>Area Code</th></tr>\n";
            foreach ($phones as $row) {
                $bigString .= "<tr>
                <td>{$row['PersonID']}</td>
                <td>{$row['PhoneType']}</td>
                <td>{$row['PhoneNum']}</td>
                <td>{$row['AreaCode']}</td>
                </tr>\n";
            }
            $bigString .= "</table>\n";
        } else {
            $bigString = "<h2>No People Exist</h2>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    echo $bigString;
    echo "<a href='lab4_3.php'>(Go back to lab4_3.php)</a><br><br>";


    //PDO::FETCH_CLASS
    class PhoneNumbers {
        public $PersonID;
        public $PhoneType;
        public $PhoneNum;
        public $AreaCode;
    }
    try {
        $cstmt = $conn->prepare("SELECT * FROM phonenumbers WHERE PersonID = $id");
        $cstmt->execute();
        $cstmt->setFetchMode(PDO::FETCH_CLASS, "PhoneNumbers");
        while ($cPhones = $cstmt->fetch()) {
            $phoneData[] = $cPhones;
        }

        echo "<h1>Phone Number(s) for ID: $id</h1>";
        if (count($phoneData) > 0) {    
            echo "<table border='1'>\n
                <tr><th>Person ID</th><th>Phone Type</th><th>Phone #</th><th>Area Code</th></tr>\n";
            foreach ($phoneData as $row) {
                echo "<tr>
                 <td>{$row->PersonID}</td>
                 <td>{$row->PhoneType}</td>
                 <td>{$row->PhoneNum}</td>
                 <td>{$row->AreaCode}</td>
                </tr>\n";
            }
            echo "</table>\n";
            echo "<a href='lab4_3.php'>(Go back to lab4_3.php)</a><br><br>";
        } else {
            echo "<h2>No People Exist</h2>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>