<?php
    //var_dump($_POST);
    $decoded = json_decode($_POST['json']);
    var_dump($decoded);

    $hobbies = "";
    foreach($decoded-> hobby as $v) {
        if ($v->isHobby) {
            $hobbies .= $v->hobbyName . ", ";
        }
    }

    $hobby = trim($hobbies,',');

    //create response object
    $json = [];
    $json['sent'] = [
        "name" => $decoded->firstname,
        "email" => $decoded->email,
        "hobbies" => $hobbies
    ];

    $json['errorNum'] = 2;
    $json['error'] = [];
    $json['error'][1] = "Wrong name";
    $json['error'][2] = "Wrong email";

    $encoded = json_encode($json);
    echo $encoded;

?>