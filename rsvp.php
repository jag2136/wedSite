<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

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

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

