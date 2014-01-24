<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $contentHtml =<<<HTML
        <p class='isolatedHuge'>We will set up the content of this page someday</p>
        <div class='smCircle centered'>&nbsp;</div>
        <p class='isolatedHuge'>Check back because it will be here</p>

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
HTML;

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

