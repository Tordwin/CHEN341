<?php
    session_name('admin');
    session_start();
?>
<html>
    <head>
        <title>Session 2</title>
    </head>
    <body>
        <?php
        if (!empty($_SESSION['name'])) {
            echo "Hi, {$_SESSION['name']} from
                {$_SESSION['school']}. <br />
                See, I remembered your name!<br />";
            unset($_SESSION['name']);

            if (isset($_COOKIE[session_name()])) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', 1, $params['path'], 
                    $params['domain'], $params['secure'], $params['httponly']);
            }
        } else {
            ?>
                <p>Sorry, I don't know you</p>
        <?php
        }
        ?>
        <a href='session01.php'>Page 1</a>
    </body>
</html>