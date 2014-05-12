<?php

    if( empty($_POST['passcode']) )
    {
        echo "<div class='errText textCentered passSubmitError'>Please enter a passcode.</div>";
    }
    else if( md5(strtoupper($_POST['passcode'])) != "e1ba4419a1838762546146d3629055bb" )
    {
        echo "<div class='errText textCentered passSubmitError'>Bad passcode.</div>";
    }
    else
    {
        require_once "rsvpForm.php";
    }


?>

