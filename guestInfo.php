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
                            <div class='whiteTitle fLeft'>The Metropolitan Building</div>
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
                        <div class='whiteText'>
                            <p>Everything we've been led to believe is that street parking is very plentiful and free around the building.</p>
                            <p>For example, here's a direct quote we appropriated from another Long Island City wedding venue's very helpful FAQ:</p>
                            <div class='mLeft20'>
                                <p>
                                    <span class='boldText'>What's the parking situation?</span><br>
                                    Street parking is available for your guests. There are no parking meters or street regulations.
                                </p>
                                <p>
                                    <span class='boldText'>Is there a valet?</span><br>
                                    You can hire a valet parking service if you wish. Since parking is easily accessible, valet services are rarely used
                                </p>
                            </div>
                            <div class='lrgSpacer'>&nbsp;</div>
                            <p>Source: <a href='http://www.weddingwire.com/biz/the-foundry-long-island-city/faq/88ae16823e2327b0.html' target='_blank'>Competitor Wedding Venue's Info via WeddingWire</a></p>
                        </div>
                    </div>
                </div>
                <div class='contentSquare fLeft'>
                    <div class='title'>Accomodations</div>
                    <div class='hiddenContent hideThis'>
                        <div class='containsFloats'>
                            <div class='whiteTitle fLeft'>Long Island City Hotels</div>
                        </div>
                        <div class='vLrgSpacer'>&nbsp;</div>
                        <div class='whiteText'>
                            <p>While Manhattan is full of (expensive) hotels, there are a few in LIC in walking distance of the Metropolitan Building.</p>
                            <p>We reserved a block at the <a href='http://www.zhotelny.com/' target='_blank'>Z Hotel</a>, but that is filling up fast, and we are told they don't have available rooms to expand our block.</p>
                            <p>Other walkable Long Island City options:</p>
                            <ul class='mLeft20'>
                                <li><a target='_blank' href='http://www.comfortinn.com/hotel-long_island_city-new_york-NY265'>Comfort Inn Long Island City</a></li>
                                <li><a target='_blank' href='http://www.ravelhotel.com/'>Ravel Hotel</a></li>
                                <li><a target='_blank' href='http://www.wyndham.com/hotels/new-york/long-island-city/wyndham-garden-long-island-city-manhattan-view/hotel-overview'>Wyndham Garden Long Island City</a></li>
                                <li><a target='_blank' href='http://thelocalny.com/'>The Local NY</a> (this is a hostel and may be very bohemian)</li>
                            </ul>
                            <p>General <a href='https://www.google.com/search?q=long+island+city+nyc&oq=long+island+city+nyc&aqs=chrome..69i57j0l5.2719j0j7&sourceid=chrome&es_sm=0&ie=UTF-8#fll=40.75057740469151,-73.9454010317993&fspn=0.009948329208782525,0.019483566284179688&fz=15&oll=40.74602572574664,-73.93831999999998&ospn=0.03979604048078045,0.07793426513671875&q=long%20island%20city%20hotels&st=115968771510351694523&tbs=lf_hc:-1,lf_msr:-1,lf:1' target='_blank'>Google search</a> of Long Island City hotels in the vicinity.</p>
                        </div>
                    </div>
                </div>
                <div class='contentSquare fLeft'>
                    <div class='title'>Attire</div>
                    <div class='hiddenContent hideThis'>
                        <div class='whiteTitle'>Cocktail Attire!</div>

                        <div class='whiteText mTop5'>
                            <p>Some meaningful examples include:</p>

                            <div class='containsFloats mBottom10'>
                                <div class='whiteTitle wire fLeft'>Women</div>
                            </div>
                            <ul class='mLeft20'>
                                <li>Short dresses</li>
                                <li>Long dresses</li>
                                <li>Lady suits</li>
                            </ul>

                            <div class='containsFloats mBottom10'>
                                <div class='whiteTitle wire fLeft'>Men</div>
                            </div>
                            <ul class='mLeft20'>
                                <li>Suits</li>
                                <li>Blazer and slacks</li>
                                <li>Ties</li>
                                <li>Suspenders?</li>
                            </ul>

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

