<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);


function BuildEmail($data)
{
    $html               = "";

    $peopleAttending    = array();
    $peopleMissing      = array();
    $nonPersonElem      = array("songEntry"    => "",
                                "emailEntry"   => "",
                                "comments"     => "");

    // Isolate only people in the data array (I know, terrible code)
    foreach( $nonPersonElem as $key => $val )
    {
        if( !empty($data[$key]) )
        {
            $nonPersonElem[$key] = $data[$key];
            unset($data[$key]);
        }
    }

    foreach( $data as $key => $val )
    {
        if( strtoupper($val) == "YES" )
        {
            array_push($peopleAttending, $key);
        }
        elseif( strtoupper($val) == "NO" )
        {
            array_push($peopleMissing, $key);
        }
    }

    if( count($peopleAttending) == 0 )
    {
        $html =<<<EOF
        <p>Hi there,</p>
        <p>Thanks for letting us know you can't make it, we really appreciate you taking the time to fill out our overly-long form.  Hope to see you soon!</p>
        <p>Thanks again,<br>Jason and Kym</p>
EOF;
    }
    else
    {
        $html =<<<EOF
        <h2>RSVP Success</h2>
        <p>Thanks for filling out our form- for your confirmation, a summary of those attending/meal choices is below:</p>
        <br>
        <table>
            <tr><td><strong>Guest</strong></td>
            <td style='width:20px'>&nbsp;</td>
            <td><strong>Meal Choice</strong></td></tr>
EOF;

        foreach( $peopleAttending as $person )
        {
            $mealChoice = $data[$person . "_mealChoice"];

            $displayPerson = str_replace("_", " ", $person);
            $html .= "<tr><t>$displayPerson</td><td>&nbsp;</td><td>$mealChoice</td></tr>\n";
        }
        foreach( $peopleMissing as $person)
        {
            $displayPerson = str_replace("_", " ", $person);
            $html .= "<tr><td>$displayPerson</td><td>&nbsp;</td><td>(Not attending)</td></tr>\n";
        }

        $html .=<<<EOF
        </table>
        <br>
        <p>We're really excited to see you, can't wait!</p>
        <p>Thanks again,<br> Jason and Kym</p>
EOF;
    }

    return $html;

}

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $guestEmailKey  = "emailEntry";
    $contentHtml    = "";

    if( $_POST &&
        !empty($_POST[$guestEmailKey]) )
    {
        // Form submitted, treat and fire out the mails
        foreach( $_POST as $key => $val )
        {
            $_POST[$key] = htmlspecialchars(trim($val));
        }

        $guestEmail = $_POST[$guestEmailKey];

        // Build and send mails
        $to      = 'kymandjason1@gmail.com, jag2136@gmail.com, kym.smith@gmail.com';
        $message = 'RSVP details:<br><pre>' . print_r($_POST, true) . '</pre>';
        $subject = 'OHMY | TEST | Wedding RSVP';

        $headers = 'From: me@kym-smith.com' . "\r\n";
        $headers .= 'Reply-To: kymandjason1@gmail.com' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Send internal RSVP confirmation to us
        mail($to, $subject, $message, $headers);

        ////////////////////////////////////////////////////////////////
        // External RSVP confirmation mail to guest
        $headers .= 'Bcc: kymandjason1@gmail.com' . "\r\n";

        $to      = 'jag2136@gmail.com';
        $subject = 'Kym & Jason Wedding - RSVP Success';
        $message = 'RSVP details:<br><pre>' . print_r($_POST, true) . "</pre>";
        $message = BuildEmail($_POST);

        // Send external RSVP confirmation to guest that RSVP-ed
        mail($to, $subject, $message, $headers);

        // Display success content
        $contentHtml =<<<HTML
            <div class="rsvpContainer">
                <p class="isolatedHuge">Successful RSVP submission! A confirmation email has been sent to the email address you provided, $guestEmail.</p>
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

