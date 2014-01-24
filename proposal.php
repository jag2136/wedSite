<?php
require "utils/basics.php";

$fileParts              = explode("/", $_SERVER["PHP_SELF"]);
$GLOBALS["PAGE_NAME"]	= $fileParts[count($fileParts) - 1];
$GLOBALS["page"]        = new Page($GLOBALS["PAGE_NAME"]);

function Driver()
{
	$GLOBALS["page"]->PageTop();

    $coolDivider = "<hr class='style-seven divider width50 centered'></hr>";

    $hisFile  = Page::$contentDir."/his.txt";
    $herFile  = Page::$contentDir."/hers.txt";
    $hisStory = "";
    $herStory = "";

    if(file_exists($hisFile))
    {
        $hisStory = file_get_contents($hisFile);
    }
    if(file_exists($herFile))
    {
        $herStory = file_get_contents($herFile);
    }

    $hisStory   = preg_replace("/\n/", "<br>", $hisStory);
    $herStory   = preg_replace("/\n/", "<br>", $herStory);
    $hisWc      = str_word_count($hisStory);
    $herWc      = str_word_count($herStory);

    $contentHtml =<<<HTML
        <p class='isolatedHuge'>We agreed to each write 150-word-or-less versions of our engagement story</p>
        <div class='smCircle centered'>&nbsp;</div>
        <p class='isolatedHuge'>Results are below</p>
        
        <div class='sectionSpacer'>&nbsp;</div>
        <span class='sectionTitle'>THE STORY</span>
        <div class='sectionSpacer'>&nbsp;</div>
        
        <div class='row'>
            <div class='col-md-6'>
                <div class='title'>Her Edition</div>
                <div class='lrgSpacer'>&nbsp;</div>
                <div class='storyCol'>
                    $herStory
                    <div class='sectionSpacer'>&nbsp;</div>
                    $coolDivider
                    <div class='wordCount'>
                        <span class='boldText'>Word Count</span>
                        <span>&nbsp;$herWc</span>
                    </div>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='title'>His Version</div>
                <div class='lrgSpacer'>&nbsp;</div>
                <div class='storyCol'>
                    $hisStory
                    <div class='sectionSpacer'>&nbsp;</div>
                    $coolDivider
                    <div class='wordCount'>
                        <span class='boldText'>Word Count</span>
                        <span>&nbsp;$hisWc</span>
                    </div>
                </div>
            </div>
        </div>

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
HTML;

/*    <div class='bannerImg lowerBanner'>
        <div class='pattern'>&nbsp;
        </div>
    </div>
HTML;*/

    echo $contentHtml;

	$GLOBALS["page"]->PageBtm();
}

Driver();
?>

