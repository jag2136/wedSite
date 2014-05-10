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
