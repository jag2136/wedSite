<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $map1 = "http://maps.googleapis.com/maps/api/staticmap?center=44-01+11th+Street,Queens,NY&zoom=12&size=330x180&scale=2&maptype=roadmap&markers=color:red%7Clabel:M%7C44-01+11th+Street,Queens,NY&sensor=false&visual_refresh=false";


    $contentHtml =<<<HTML
        
        <div class='sectionSpacer'>&nbsp;</div>
        
        <div class='row'>
            <div class='col-md-2'>&nbsp;</div>
            <div class='col-md-8 containsFloats'>
                <div class='contentSquare fLeft'>
                    <div class='title'>Directions</div>
                    <div class='hiddenContent hideThis'>
                        <div class='containsFloats'>
                            <div class='whiteTitle fLeft'>THE METROPOLITAN BUILDING</div>
                        </div>
                        <img class='roundedEdges mTop15 mBottom5' src='$map1'>
                        <div class='whiteText'>44-01 11th St, Long Island City, Queens, NY 11101</div>
                        <div class='whiteText mTop10'>We may get around to writing our own concise directions someday, but for now, consult the Metropolitan Building site's unbelievably-wordy directions:</div>
                        <div class='containsFloats'>
                            <div class='whiteTitle wire fRight mTop10 mRight10' id='mbDirections'>Directions</div>
                        </div>
                    </div>
                </div>
                <div class='contentSquare fLeft'>
                    <div class='title'>Parking</div>
                    <div class='hiddenContent hideThis'>
                        <div class='containsFloats'>
                            <div class='whiteTitle fLeft'>It's just too early for parking info, details to come.  In all honesty, it's Long Island City, street parking is plentiful.</div>
                        </div>
                    </div>
                </div>                
                <div class='contentSquare fLeft'>
                    <div class='title'>Accomodations</div>
                    <div class='hiddenContent hideThis'>
                        <div class='containsFloats'>
                            <div class='whiteTitle fLeft'>Too early for local hotel accomodations too, check back for updates</div>
                        </div>
                    </div>
                </div>
                <div class='contentSquare fLeft'>
                    <div class='title'>Attire</div>
                    <div class='hiddenContent hideThis'>
                        <div class='containsFloats'>
                            <div class='whiteTitle fLeft'>Everyone knows what to wear to weddings, but we needed a 4th Guest Info section for visual symmetry.  Check back for updates, of course</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class='col-md-2'>&nbsp;</div>
        </div>

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
HTML;

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

