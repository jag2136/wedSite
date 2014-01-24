<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $img1 = "http://maps.googleapis.com/maps/api/staticmap?center=44-01+11th+Street,Queens,NY&zoom=12&size=335x180&scale=2&maptype=roadmap&markers=color:red%7Clabel:M%7C44-01+11th+Street,Queens,NY&sensor=false&visual_refresh=false";
    $img2 = "http://maps.googleapis.com/maps/api/staticmap?center=44-01+11th+Street,Queens,NY&zoom=14&size=220x180&scale=2&maptype=roadmap&markers=color:red%7Clabel:M%7C44-01+11th+Street,Queens,NY&sensor=false&visual_refresh=false";

    $contentHtml =<<<HTML
    
        <p class='isolatedHuge'>We visited a bunch of places in a short amount of time, enough to get solidly uncertain</p>
        <div class='smCircle centered'>&nbsp;</div>
        <p class='isolatedHuge'>After reflection... picking was easy</p>
        <div class='smCircle centered'>&nbsp;</div>
        <p class='isolatedHuge'>It was the most flexible, allowing us to be as silly as we want</p>
    
        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
        
        <div class='sectionTitle'>THE PLACE</div>
        <div class='sectionSpacer'>&nbsp;</div>
        
        <!--<div class='row'>
            <div class='col-md-12 dinnerShot'>
                <div class='largeTitle'>
                    The Metropolitan Building
                </div>
            </div>
        </div>-->
        
    </div>
        <div class='dinnerBorder'>
        </div>
        <div class='dinnerBanner slowScroll'>
            <div class='pattern'>
                <div class='container vertPad'>
                    <div class='containsFloats mBottom5 mTop10'>
                        <h2 class='fRight textShadow'>The Metropolitan Building</h2>
                    </div>
                    <div class='containsFloats'>
                        <h3 class='fRight'>New York City</h3>
                    </div>
                </div>
            </div>
        </div>
    <div class='container'>
        
        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>   
       
        <section>
            <div class="panel panel-default">
                <!--<div class="panel-heading">
                    <div class='containsFloats'>
                        <div class='roundedLabel bigLabel diffColors fRight'>
                            The Metropolitan Building
                        </div>
                    </div>
                </div>-->

                <div class="panel-body">
                    <div class='containsFloats'>
                        <div class='roundedLabel bigLabel diffColors fLeft'>
                            The Metropolitan Building
                        </div>
                    </div>             
                    <div class='sectionSpacer'>&nbsp;</div> 
                    <div class='row'>
                        <div class='col-md-2'>&nbsp;</div>
                        <div class='col-md-4'>
                            <div class='bulletList'>
                                <div class='vSmCircle fLeft'>&nbsp;</div>
                                <p>Long Island City, Queens, NYC</p>
                                
                                <div class='vSmCircle fLeft'>&nbsp;</div>
                                <p>Converted Factory</p>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class='bulletList fRight'>                                
                                <div class='vSmCircle fLeft'>&nbsp;</div>
                                <p>Quirky and Antique (our words)</p>
                                
                                <div class='vSmCircle fLeft'>&nbsp;</div>
                                <p>Always Hosting Strange Photoshoots</p>
                            </div>
                        </div>
                        <div class='col-md-2'>&nbsp;</div>
                    </div>     
                </div>          
            </div>
           
            <div class='sectionSpacer'>&nbsp;</div>
            
            <div class='panel panel-default'>
                <div class='panel-body'>
                    <div class='containsFloats'>
                        <div class='roundedLabel diffColors fLeft'>Timeline</div>
                    </div>
                    <div class='vLrgSpacer'>&nbsp;</div>
                    <div class="progress">
                        <div class="progress-bar factory" style="width: 35%">
                            <div class='fLeft'>&nbsp;1909</div>
                            <span>Factory</span>
                            <span class="sr-only">35% Complete (success)</span>
                        </div>
                        <div class="progress-bar vacant" style="width: 25%">
                            <div class='fLeft'>&nbsp;?</div>
                            <span>Vacant</span>
                            <span class="sr-only">20% Complete (warning)</span>
                        </div>
                        <div class="progress-bar awesome" style="width: 35%">
                            <div class='fLeft'>&nbsp;1980</div>
                            <span>Awesome</span>
                            <div class='fRight'>2014&nbsp;</div>
                            <span class="sr-only">10% Complete (danger)</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--<div class='col-md-2'>
            <img class='roundedEdges img-responsive' src='img/venue/birdCage.jpg'>
        </div>
        <div class='col-md-2'>
            <img class='roundedEdges img-responsive' src='img/venue/kymDoor.jpg'>            
        </div>-->
        
        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>   
        <div class='sectionSpacer'>&nbsp;</div>   
        
		<span class='sectionTitle'>THE MAPS</span>
		<div class='sectionSpacer'>&nbsp;</div>
		
        <div class='containsFloats'>
            <img class='roundedEdges fLeft mBottom10' src='$img1'>
            <img class='roundedEdges fRight mBottom10' src='$img2'>
        </div>
        <div class='lrgSpacer'>&nbsp;</div>
        <div class="panel panel-default buildingAddress containsFloats">
            <div class='panel-body'>
                <div class='fLeft'>
                    <p>44-01 11th St</p>
                    <p>Long Island City</p>
                    <p>Queens, NY 11101</p>
                </div>
                <div class='fRight'>
                    <div class='roundedLabel'>Address</div>
                </div>
            </div>
        </div>
        

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
HTML;

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

