<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
    <label for="firstName">First Name: </label>
    <input type="text" name="firstName" placeholder="John"><br><br>

    <label for="lastName">Last Name: </label>
    <input type="text" name="lastName" placeholder="Doe"><br><br>

    <label for="date">Date: </label>
    <input type="text" name="date" placeholder="Month Day Year"><br><br>

    <label for="comments">Comments: </label><br>
    <textarea id="comments" name="comments" placeholder="This page is..."></textarea><br><br>

    <label for="mood">Mood: </label><br>
    <input id="mood" type="radio" name="mood" value="happy"> <label for="happy">Happy</label><br>
    <input id="mood" type="radio" name="mood" value="mad"> <label for="mad">Mad</label><br>
    <input id="mood" type="radio" name="mood" value="indifferent"> <label for="indifferent">Indifferent</label><br><br>

    <input type="reset" value="Reset Form">
    <input type="submit" name="submit" value="Submit">
</form

<?php
    function sanitizeString($var) {
        $var = trim($var);
        $var = stripslashes($var);
        $var= htmlentities($var);
        $var = strip_tags($var);
        return $var;
    }

    function sanitizeRadio($var, $valid) {
        if (isset($var) && in_array($var, $valid)) {
            return htmlspecialchars($var);
        } else {
            return "";
        }
    }

    function validate($firstName, $lastName, $date, $comments, $mood) {
        $moods = ['happy', 'mad', 'indifferent'];
        $bool = true;
        if (empty($firstName)) {
            echo "<p>First Name is required.</p>";
            $bool = false;
        }
        if (empty($lastName)) {
            echo "<p>Last Name is required.</p>";
            $bool = false;
        }
        if (empty($date)) {
            echo "<p>Date is required.</p>";
            $bool = false;
        }
        if (empty($comments)) {
            echo "<p>A comment is required.</p>";
            $bool = false;
        }
        if (!in_array($mood, $moods)) {
            echo "<p>Mood is required.</p>";
            $bool = false;
        }
        return $bool;
    }

    $message = "";

    if (isset($_POST['submit'])) {
        $firstName = sanitizeString($_POST['firstName']);
        $lastName = sanitizeString($_POST['lastName']);
        $date = sanitizeString($_POST['date']);
        $comments = sanitizeString($_POST['comments']);
        $mood = sanitizeRadio($_POST['mood'] ?? '', ['happy', 'mad', 'indifferent']);
        if (validate($firstName, $lastName, $date, $comments, $mood) == true) {
            $uniqueMessage = "";
            switch ($mood) {
                case 'happy':
                    $uniqueMessage = "I'm happy you're happy!";
                    break;
                case 'mad':
                    $uniqueMessage = "I'm sorry you're mad.";
                    break;
                case 'indifferent':
                    $uniqueMessage = "I hope you confide with your indifference.";
                    break;
            }
            $message .= "<p>Today is $date</p>";
            $message .= "<p>Hello, $firstName $lastName. $uniqueMessage</p>";
            $message .=  "<p>Your comments: $comments</p>";

            echo $message;
        }

    }
?>  