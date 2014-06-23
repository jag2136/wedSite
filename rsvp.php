<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $guestEmail     = "emailEntry";
    $contentHtml    = "";

    if( $_POST &&
        !empty($_POST[$guestEmail]) )
    {
        // Form submitted, treat and fire out the mails
        foreach( $_POST as $key => $val )
        {
            $_POST[$key] = htmlspecialchars(trim($val));
        }

        // Build and send mails
        $to      = 'kymandjason1@gmail.com, jag2136@gmail.com, kym.smith@gmail.com';
        $subject = 'OHMY | TEST | Wedding RSVP';
        $message = 'RSVP details:<br><pre>' . print_r($_POST, true) . "</pre>";
        $headers = 'From: me@kym-smith.com' . "\r\n" .
            'Reply-To: kymandjason1@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        // Send internal RSVP confirmation to us
        mail($to, $subject, $message, $headers);

        $to      = 'jag2136@gmail.com';
        $subject = 'Kym and Jason - RSVP Success';
        $message = 'RSVP details:<br><pre>' . print_r($_POST, true) . "</pre>";

        // Send external RSVP confirmation to guest that RSVP-ed
        mail($to, $subject, $message, $headers);

        // Display success content
        $contentHtml =<<<HTML
            <div class="rsvpContainer">
                SUCCESS OH BOY
            </div>
HTML;
    }
    else
    {
        // Display form

        $contentHtml =<<<HTML
            <div class='rsvpContainer'>
                <div class='smCircle centered'>&nbsp;</div>
                <p class='isolatedHuge'>Welcome to the robotic RSVP system</p>
                <div class='sectionSpacer'>&nbsp;</div>

                <div id='passcodeForm'>
                    <input class='dBlock centered' id='passcodeEntry' type='text' placeholder='passcode'>
                    <div class='sectionSpacer'>&nbsp;</div>
                    <input class='dBlock centered' id='passcodeSubmit' type='submit' value='Submit'>
                </div>

                <div class='sectionSpacer'>&nbsp;</div>
                <div class='sectionSpacer'>&nbsp;</div>

                <div id='rsvpAjaxResp'>
                </div>
            </div>
HTML;
    }

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

