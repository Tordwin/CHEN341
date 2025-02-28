<?php
    if (!isset($_GET['id'])) {
        header("Location: lab4_1.php");
        exit();
    }
    require_once('DB.class.php');
    $db = new DB();
    $id = $_GET['id'];
    $conn = $db->getConn();
    $data = [];

    try {
        if ($stmt = $conn->prepare("SELECT * FROM phonenumbers WHERE PersonID = $id")) {
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($id, $type, $num, $area);
            if ($stmt->num_rows > 0) {
                while ($stmt->fetch()) {
                    $data[] = [
                        'id' => $id,
                        'type' => $type,
                        'num' => $num,
                        'area' => $area
                    ];
                }//while fetch
            }//if num_rows > 0
        }
        if (count($data) > 0) {    
            $bigString = "<table border='1'>\n
                <tr><th>Person ID</th><th>Phone Type</th><th>Phone #</th><th>Area Code</th></tr>\n";
            foreach ($data as $row) {
                $bigString .= "<tr>
                <td>{$row['id']}</td>
                <td>{$row['type']}</td>
                <td>{$row['num']}</td>
                <td>{$row['area']}</td>
                </tr>\n";
            }//foreach
            $bigString .= "</table>\n";
        } else {
            $bigString = "<h2>No Phone Numbers Exist</h2>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    echo "<h1>Phone Number(s) for ID: $id</h1>";
    echo $bigString;
    echo "<a href='lab4_1.php'>(Go back to lab4_1.php)</a><br><br>";
?>