<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $contentHtml =<<<HTML
    
        <p class='isolatedHuge'>Below is our shameless entry into the world of wedding commerce, you have probably heard of these stores:</p>
   
        <div class='sectionSpacer'>&nbsp;</div>
        
        <div class='logoContainer WS centered' id='WSlink'></div>
        <div class='logoContainer B centered' id='Blink'></div>

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
HTML;

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

