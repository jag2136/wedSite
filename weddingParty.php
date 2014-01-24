<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

	$wedParty	= array("Meghan",
						"Vik",
						"Marisa",
						"Chris",
						"Carly",
						"Drake",
						"Danica");

	$imgDir					= "img/weddingParty/";
	$wedPartyLinks			= array();
	foreach($wedParty as $name) {
		$wedPartyLinks[]	= $imgDir.$name.".jpg";
	}

    $coolUnusedDivider = "<hr class='style-seven divider'></hr>";

    $contentHtml =<<<HTML
	        <div class='lrgSpacer'>&nbsp;</div>
	        
	        <div class='row'>
		        <div class='col-md-6'>
		        	<div class='title'>Selection Process</div>
		        	<div class='content'>
		        		<p>We didn't just pick "the people we liked" or whatever.  We brought science into the equation.</p>
		        		<p>Other than judging quantitative categories like dexterity, eyebrows, and soul, we measured the intangibles.  We required our selections to sign loyalty contracts and that was it!</p>
		        	</div>
		        </div>
		        <div class='col-md-6'>
		        	<div class='title'>Responsibilities</div>
		        	<div class='content'>
		        		<p>You would think this would mostly be about fun and just enjoying the day, but it turns out these guys need to carry the load:</p>
		        		<ul>
		        			<li>Moral Support</li>
		        			<li>Drywall</li>
		        			<li>Vendor Logistics</li>
		        			<li>Beer Patrol</li>
		      			</ul>
		        	</div>
		        </div>
	        </div>
	        
	        <div class='sectionSpacer'>&nbsp;</div>
	       	<span class='sectionTitle'>MEMBERS</span>
	        <div class='sectionSpacer'>&nbsp;</div>
	        
	        <div class='containsFloats'>
	        	<div class='fLeft profile'>
	        		<img src='img/weddingParty/meghanSS.jpg'>
	        		<div class='hiddenContent'>
	        			<div class='containsFloats'>
	        				<div class='fLeft roundedLabel'>Meghan</div>
	        				<div class='fRight roundedLabel diffColors'>Co-Maid of Honor</div>
	        			</div>
		        		<section>
		        			<p>Meghan and the bride met freshman year at Tulane and have nursed a long-distance friendship since.  Meghan spent 3 of the past 5 years in Buenos Aires and uses Facebook in Spanish.
		        			</p>
		        			<div class='statList'>
		        				<div class='containsFloats mBottom5'>
		        					<div class='fLeft roundedWire'>Eye Color</div>
		        					<div class='fRight'>Sparkling Olive</div>
		        				</div>
		        				<div class='containsFloats'>
		        					<div class='fLeft roundedWire'>Eyebrows</div>
		        					<div class='fRight'>Feminine and lovely</div>
		        				</div>		        				
		        			</div>
		        		</section>
	        		</div>
	        	</div>
	        	<div class='fLeft profile'>
	        		<img src='img/weddingParty/vikSS.jpg'>
	        		<div class='hiddenContent'>
	        			<div class='containsFloats'>
		        			<div class='fLeft roundedLabel'>Vik</div>
	        				<div class='fRight roundedLabel diffColors'>Captain of the Guard</div>
	        			</div>
		        		<section>
		        			<p>Friends since college, Vik and the groom have shared 2 NYC apartments and a dislike of the ultra-overrated Delirium Tremens beer.  Vik is the best golfer of the wedding party.
		        			</p>
		        			<div class='statList'>
		        				<div class='containsFloats mBottom5'>
		        					<div class='fLeft roundedWire'>Golf Handicap</div>
		        					<div class='fRight'>0.2582</div>
		        				</div>
		        				<div class='containsFloats'>
		        					<div class='fLeft roundedWire'>Hair</div>
		        					<div class='fRight'>Tall and full</div>
		        				</div>		        				
		        			</div>
		        		</section>
	        		</div>
	        	</div>
	        	<div class='fLeft profile'>
	        		<img src='img/weddingParty/marisaSS.jpg'>
	        		<div class='hiddenContent'>
	        			<div class='containsFloats'>
	        				<div class='fLeft roundedLabel'>Marisa</div>
	        				<div class='fRight roundedLabel diffColors'>Co-Maid of Honor</div>
	        			</div>
		        		<section>
		        			<p>Stomping around a department store summer job, Marisa & bride became friends 10 years ago and have spent many fun Friday afternoons in NYC and weekends in Boston.
		        			</p>
		        			<div class='statList'>
		        				<div class='containsFloats mBottom5'>
		        					<div class='fLeft roundedWire'>Number of US States visited</div>
		        					<div class='fRight'>45</div>
		        				</div>
		        				<div class='containsFloats'>
		        					<div class='fLeft roundedWire'>Disposition</div>
		        					<div class='fRight'>Cheery and wonderful</div>
		        				</div>		        				
		        			</div>
		        		</section>
		        	</div>
	        	</div>
	        	<div class='fLeft profile'>
	        		<img src='img/weddingParty/chrisSS.jpg'>
	        		<div class='hiddenContent'>
	        			<div class='containsFloats'>
	        				<div class='fLeft roundedLabel'>Chris</div>
	        				<div class='fRight roundedLabel diffColors'>Lead Consigliere</div>
		        		</div>
		        		<section>
		        			<p>Chris is a notary in >1 states and represents North Jersey exceptionally well.  He finds time to speak fluent French in between business school and being really upbeat.
		        			</p>
		        			<div class='statList'>
		        				<div class='containsFloats mBottom5'>
		        					<div class='fLeft roundedWire'>Personal Trainer</div>
		        					<div class='fRight'>None currently</div>
		        				</div>
		        				<div class='containsFloats'>
		        					<div class='fLeft roundedWire'>Sears a steak multiple times a week?</div>
		        					<div class='fRight'>Yes</div>
		        				</div>		        				
		        			</div>
		        		</section>
	        		</div>
				</div>
	        	<div class='fLeft profile'>
	        		<img src='img/weddingParty/carlySS.jpg'>
	        		<div class='hiddenContent'>
	        			<div class='containsFloats'>
	        				<div class='fLeft roundedLabel'>Carly</div>
	        				<div class='fRight roundedLabel diffColors'>Chairman of the Board</div>
	        			</div>
		        		<section>
		        			<p>Carly is Jason's younger sister and identical twin of Danica. Nobody thinks they are identical but they are identical. She's well on her way to doctorhood.
		        			</p>
		        			<div class='statList'>
		        				<div class='containsFloats mBottom5'>
		        					<div class='fLeft roundedWire'>Least Favorite Brand of Toothpaste</div>
		        					<div class='fRight'>Arm & Hammer</div>
		        				</div>
		        				<div class='containsFloats'>
		        					<div class='fLeft roundedWire'>Hands</div>
		        					<div class='fRight'>Precise</div>
		        				</div>		        				
		        			</div>
		        		</section>
		        	</div>
	        	</div>
	        	<div class='fLeft profile'>
	        		<img src='img/weddingParty/drakeSS.jpg'>
	        		<div class='hiddenContent'>
	        		<div class='containsFloats'>
	        			<div class='fLeft roundedLabel'>Drake</div>
	        			<div class='fRight roundedLabel diffColors'>Stuntman</div>
	        		</div>
		        	<section>
		        			<p>Drake is the bride's younger brother and recent, proud graduate of USC.  He is the jazziest jazz man of the wedding party and plays the trombone expertly.  He also reads.
		        			</p>
		        			<div class='statList'>
		        				<div class='containsFloats mBottom5'>
		        					<div class='fLeft roundedWire'>First Career Aspiration</div>
		        					<div class='fRight'>Ice Cream Truck</div>
		        				</div>
		        				<div class='containsFloats'>
		        					<div class='fLeft roundedWire'>Current Height</div>
		        					<div class='fRight'>6' plus hair</div>
		        				</div>		        				
		        			</div>
		        		</section>
		        	</div>
	        	</div>
	        	<div class='fLeft profile'>
	        		<img src='img/weddingParty/danicaSS.jpg'>
	        		<div class='hiddenContent'>
	        			<div class='containsFloats'>
	        			<div class='fLeft roundedLabel'>Danica</div>
	        			<div class='fRight roundedLabel diffColors'>Head Designer</div>
	        		</div>
		        	<section>
		        			<p>Danica is Jason's 2nd younger sister (in age, not importance) and non-identical twin of Carly.  She is an avid kickballer, mechanical engineer, and thrower of amazing looking cooking parties. 
		        			</p>
		        			<div class='statList'>
		        				<div class='containsFloats mBottom5'>
		        					<div class='fLeft roundedWire'>Halloween Costume at age of 5</div>
		        					<div class='fRight'>Disney Princess</div>
		        				</div>
		        				<div class='containsFloats'>
		        					<div class='fLeft roundedWire'>Mile Split Time</div>
		        					<div class='fRight'>3:55</div>
		        				</div>		        				
		        			</div>
		        		</section>
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

