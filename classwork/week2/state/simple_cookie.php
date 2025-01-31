<?php

    $expire = time()+10; //10 seconds from now
    $path = "/~ec7233/"; 
    $domain = "solace.ist.rit.edu";
    $secure = false;

    setcookie("test_cookie", "aargh!", $expire, $path, $domain, $secure);

    $counter = $_COOKIE['counter'];
    $counter++;
    setcookie('counter', $counter, $expire, $path, $domain, $secure);
    
    $getCounter = $_COOKIE['counter'];

    echo "<h2>counter = $getCounter</h2>";
    echo "<h2>\$_COOKIE variables</h2>";
    foreach ($_COOKIE as $k=>$v) {
        echo "$k=$v<br />";
    }  

?>