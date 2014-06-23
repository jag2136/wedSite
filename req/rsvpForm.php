<?php
    $jsonFile = "../data/guests.json";
    if( file_exists($jsonFile) )
    {
        $jsonData = file_get_contents($jsonFile);
        echo "<script type='text/javascript'>var guestData = $jsonData;</script>\n";
    }
    else
    {
        echo "<div class='errText'>Unable to find guest data.</div>\n";
    }

?>

<div class='row'>
    <div class='col-md-1'></div>
    <div class='col-md-5'>
        <div class='formDesc textCentered'>
            <p>Please type <span class='fontReg'>your</span> last name and hit enter.</p>
        </div>
        <div class='mTop10'>
            <input class='dBlock centered' id='lastNameEntry' type='text' placeholder='Last Name'>
        </div>
    </div>
    <div class='col-md-5'>
        <div class='hideThis' id='firstNameContainer'>
            <div class='formDesc textCentered'>
                <p>Please select only <span class='fontReg'>your</span> first name.</p>
            </div>
            <div class='mTop10'>
                <select class='dBlock centered' id='firstNameEntry'>
                    <option value="default">&nbsp;</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class='sectionSpacer'>&nbsp;</div>
<div class='sectionSpacer'>&nbsp;</div>
<hr class='style-seven divider width50 centered'>
<div class='sectionSpacer'>&nbsp;</div>

<form id='guestForm' method='post'>
    <div class='hideThis' id='dynamicGuestForm'>
        <!-- To be populated via ajax -->
    </div>

    <div class='sectionSpacer'>&nbsp;</div>


    <div class='hideThis' id='staticForm'>
        <hr class='style-seven divider width50 centered'>
        <div class='sectionSpacer'>&nbsp;</div>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='formDesc textCentered'>
                    <p>Please enter <span class='fontReg'>your</span> email so we can send confirmation.</p>
                </div>
                <div class='mTop10'>
                    <input class='dBlock centered w70 reqd' name='emailEntry' id='emailEntry' type='text' placeholder='Email Address'>
                    <div class='errText'></div>
                </div>

                <div class="sectionSpacer">&nbsp;</div>

                <div class='formDesc textCentered'>
                    <p>Song you'd like played? (We make no guarantees)</p>
                </div>
                <div class='mTop10'>
                    <input class='dBlock centered w70' name='songEntry' id='songEntry' type='text' placeholder='Your song (optional)'>
                    <div class='errText'></div>
                </div>
            </div>
            <div class='col-sm-1'></div>
            <div class='col-sm-5'>
                <div class='formDesc textCentered'>
                    <p>Anything else we should know?</p>
                </div>
                <div class='mTop10'>
                    <textarea class='dBlock centered' name='comments' id='comments' placeholder='Extra info (optional)'></textarea>
                </div>
            </div>
        </div>

        <div class='sectionSpacer'>&nbsp;</div>
        <div class='smCircle centered'>&nbsp;</div>
        <div class='sectionSpacer'>&nbsp;</div>
        <input class='dBlock centered' id='rsvpSubmit' type='submit' value='Submit RSVP'>
    </div>

</form>


<div class='sectionSpacer'>&nbsp;</div>
<div class='sectionSpacer'>&nbsp;</div>
