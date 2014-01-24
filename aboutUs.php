<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $smLabelClass   = "class='aboutLabel smRoundedWire mBottom7 fLeft'";
    $smLabelOpaque  = "class='aboutLabel smLabel mBottom7 mRight30 fLeft'";
    $smLabelClassR  = "class='aboutLabel smRoundedWire mBottom7 fRight'";

    $imgClass       = "class='roundedEdges mBottom10 mRight10 fLeft'";
    $contentHtml    =<<<HTML
    
        <div class='row'>
            <div class='col-md-6'>
                <div class='title'>How Did We Meet</div>
                <div class='specialContent'>
                    <p>We met each other at work!  Nothing compares to the built-in romance of financial software.</p>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='title'>Current Location</div>
                <div class='specialContent'>
                    <p>We live in the financial district in New York, which only mostly deserves its quiet reputation.  Yes, we do share a studio.  No, that is not considered a fire hazard by our landlord or the city.</p>
                </div>
            </div>
        </div>
        
        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionTitle'>THE RICH DETAILS</div>
   
        <div class='sectionSpacer'>&nbsp;</div>
        <div class='lrgSpacer'>&nbsp;</div>
        
        <div class='row'>
            <div class='col-md-2 links'>
                <ul class='nav nav-pills nav-stacked'>
                    <li class='active'><a href='#'>Dimensions</a></li>
                    <li><a href='#'>Emotional</a></li>
                    <li><a href='#'>Sports Trophies</a></li>
                    <li><a href='#'>Likes & Dislikes</a></li>
                    <li><a href='#'>Academics</a></li>
                </ul>
            </div>
            <div class='col-md-5 aboutPanel Kym'>
                <div class='content'>
                    <div class='Dimensions'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/croftBoxSm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelClass>5' 5"</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Hair is dark brown with high lustre</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Ambidextrous (not really)</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                                <div $smLabelClass>Can wear pretty tall heels</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='Emotional hideThis'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/holidayCard1Sm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelClass>Huge fan of Center Stage</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Huge fan of Devil Wears Prada</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>No mercy on young brother in basketball</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                                <div $smLabelClass>Tries to get strangers' babies to smile</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Pours heart out with a guitar</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='Sports hideThis'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/kymAssuredSm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelOpaque>1st RU</div>
                                <div $smLabelClassR>Miss Connecticut USA 2010</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>2nd RU</div>
                                <div $smLabelClassR>Miss Connecticut USA 2011</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>2nd RU</div>
                                <div $smLabelClassR>Miss Connecticut USA 2009</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                                <div $smLabelClass>Smith family driveway basketball champ</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Dangerous with a volleyball</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='Likes hideThis'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/kymFrontDoorSm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelOpaque>Likes</div>
                                <div $smLabelClassR>Scrapbook wars</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>Likes</div>
                                <div $smLabelClassR>Baking wars</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>Dislikes</div>
                                <div $smLabelClassR>Conflict</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                                <div $smLabelOpaque>Likes</div>
                                <div $smLabelClassR>Musical styling</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='Academics hideThis'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/kymLHgrillSm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelClass>Fled Hurricane Katrina from Tulane</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Knows Yale is modeled after Hogwarts</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Last female Comp. Sci. grad from Tulane</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                                <div $smLabelClass>Her CPU is a neuronet processor</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='containsFloats lowerRightAbs'>
                        <div class='roundedLabel fRight'>Kimberly Smith</div>
                    </div>
                </div>
            </div>
<!--
croftBoxSm.jpg
flowerSm.jpg
holidayCard1Sm.jpg
kymAssuredSm.jpg
kymFrontDoorSm.jpg
kymLHgrillSm.jpg
-->

            <div class='col-md-5 aboutPanel Jason'>
                <div class='content'>
                    <div class='Dimensions'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/j1_small.jpg'>
                            <div class='fLeft'>
                                <div $smLabelClass>6' 0"</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Unusually long eyelashes</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Can't wear tall heels</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                                <div $smLabelClass>Has had beard for years now</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                                <div $smLabelClass>Hasn't been tan in years now</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='Emotional hideThis'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/boatDimensionsSm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelClass>Will sometimes watch action movies</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Often loudly debates the trivial</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Stoic</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                                <div $smLabelClass>Pets neighbors' dogs on elevator</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='Sports hideThis'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/beachMoveSm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelClass>Best foot injury from running</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Almost beats family in friendly tennis</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Winner in office nerf darts series</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Has occasionally surprised at ping-pong</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='Likes hideThis'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/seriouslySm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelOpaque>Likes</div>
                                <div $smLabelClassR>Wedding website being done</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>Likes</div>
                                <div $smLabelClassR>Friends</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>Likes</div>
                                <div $smLabelClassR>Success</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>Dislikes</div>
                                <div $smLabelClassR>Current rental price trends</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>Dislikes</div>
                                <div $smLabelClassR>Scotland Yard</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelOpaque>Both</div>
                                <div $smLabelClassR>Furrowing brow</div>
                                <div class='clrFloat'>&nbsp;</div>                                    
                            </div>
                        </div>
                    </div>
                    <div class='Academics hideThis'>
                        <div class='containsFloats'>
                            <img $imgClass src='img/aboutUs/snowWhiteSm.jpg'>
                            <div class='fLeft'>
                                <div $smLabelClass>Engineer in college, then never again</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Bartending class investment paid off</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Still learning all the ways of the heart</div>
                                <div class='clrFloat'>&nbsp;</div>
                                <div $smLabelClass>Doesn't remember Middle school GPA</div>
                                <div class='clrFloat'>&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <div class='containsFloats lowerRightAbs'>
                        <div class='roundedLabel fRight'>Jason Gordon</div>
                    </div>
                </div>
            </div>    
        </div>
        <!--<div class='row mTop10'>
            <div class='col-md-2'>&nbsp;</div>
            <div class='col-md-5'>
                <div class='containsFloats'>
                    <div class='roundedLabel fRight'>Kimberly Smith</div>
                </div>
            </div>
            <div class='col-md-5'>
                <div class='containsFloats'>
                    <div class='roundedLabel fRight'>Jason Gordon</div>
                </div>
            </div>            
        </div>-->

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
HTML;

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

