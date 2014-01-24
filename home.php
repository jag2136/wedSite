<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $c1 =<<<HTML
It's a wedding set to occur on September 27th, 2014 (see huge date above), and this is the website preview and info center.
HTML;

    $c2 =<<<HTML
It's easier for us to give directions to our wedding venue via the internet than physical mail (which costs like $0.50 a pop these days).  Also, we get to dictate the color scheme.
HTML;

    $c3 =<<<HTML
It's September 27th, 2014
HTML;

    $img1 = "img/home/jg1_sm.jpg";
    $img2 = "img/home/ks1_sm.jpg";
    
    $coolUnusedDivider = "<hr class='style-seven divider'></hr>";

    $contentHtml =<<<HTML
        <div class='lrgSpacer'>&nbsp;</div>
        <div class='row'>
            <div class='col-md-4'>
                <div class='title'>What Is This</div>
                <div class='content'>$c1</div>
            </div>
            <div class='col-md-4'>
                <div class='title'>Why Is It On the Internet</div>
                <div class='content'>$c2</div>
            </div>
            <div class='col-md-4'>
                <div class='title'>But What Is The Date</div>
                <div class='content'>$c3</div>
            </div>
        </div>

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>

		<span class='sectionTitle'>THE PEOPLE</span>
		<div class='sectionSpacer'>&nbsp;</div>
		<div class='row'>
			<!--<div class='col-md-1'>&nbsp;</div>-->
            <div class='col-md-6'>
                <img class='roundedEdges' src='$img1'>
                <div class='lrgSpacer'>&nbsp;</div>
                <div class='roundedLabel fLeft'>Jason</div>
                <div class='smHSpacer fLeft'>&nbsp;</div>
                <div class='noWire fLeft'>This guy knows what's up</div>
            </div>
            <div class='col-md-6'>
                <img class='roundedEdges' src='$img2'>
                <div class='lrgSpacer'>&nbsp;</div>
                <div class='roundedLabel fLeft'>Kimberly</div>
                <div class='smHSpacer fLeft'>&nbsp;</div>
                <div class='noWire fLeft'>Unbelievably high efficiency</div>
            </div>
            <!--<div class='col-md-1'>&nbsp;</div>-->
        </div>

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
HTML;

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

