<?php
$fileParts  = explode("/", $_SERVER["PHP_SELF"]);
$homeFile   = "/".$fileParts[1]."/home.php";

// Taken from http://stackoverflow.com/questions/768431/how-to-make-a-redirect-in-php
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect($homeFile, false);

?>

