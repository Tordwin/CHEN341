<?php

    session_name('edwin');
    session_start();

    //check to see if you have visited before
    if (!empty($_SESSION['name'])) {
        //add a session varaible, increment the count and redirect
        $_SESSION['school'] = "RIT";
        $_SESSION['count']++;
        header("Location: session02.php");
        exit; //or die or return
    }

?>

<html>
    <head>
        <title>Session 01</title>
    </head>
    <body>
        <?php
            if (isset($_SESSION['count'])) {
                //if exists/isset
                echo "<h1>Hi, you've been here {$_SESSION['count']} times</h1>";
                $_SESSION['count']++;
            } else {
                echo "<h1>Welcome! You have not been here before</h1>";
                $_SESSION['count'] = 0;
            }

            $_SESSION['name'] = "Edwin Chen";
            echo "<h2><a href='session01.php'>Come Back!</a></h2>";
        ?>
    </body>
</html>