
var rsvpReqUrl      = "req/rsvpReq.php";
var duration        = 500;

var passcodeSubmit  = function() {
    var respElem    = $("#rsvpAjaxResp");
    var passcode    = $("#passcodeEntry").val();

    // Hide response container in case form was already submitted with bad passcode
    respElem.hide();

    $.ajax({
        type:       "POST",
        url:        rsvpReqUrl,
        data:       {passcode: passcode},
        success:    function(response) {
            respElem.empty().append(response);

            if( response.indexOf("passSubmitError") == -1 )
            {
                // Success, fade out passcode form and fade in rsvp form
                $("#passcodeForm").fadeOut(duration, function() {
                    reqFormJs();
                    respElem.fadeIn(duration);
                });
            }
            else
            {
                // Failure, display error text immediately
                respElem.show();
            }
        }
    });
};


var reqFormJs       = function() {
    // Store common DOM selectors to avoid re-selecting multiple times
    var lastNameEntry   = $("#lastNameEntry");
    var firstNameEntry  = $("#firstNameEntry");

    // Parse JSON guest data in guestData array
    var allGuests   = [];
    var lastNames   = [];

    // On choosing a guest from dropdown, handle generating their groups' rsvp form
    var handleGuestGroup = function(selectedName) {
        guestData.forEach(function(group) {
            var curGroup = group;

            group.forEach(function(guest) {
                var curGuestName = guest.f + "." + guest.l;
                if( curGuestName === selectedName )
                {
                    var dynamicForm = $("#dynamicGuestForm");
                    var staticForm  = $("#staticForm");
                    staticForm.hide();
                    dynamicForm.hide();
                    dynamicForm.empty();

                    var mealNameSuffix      = '_mealChoice';
                    curGroup.forEach(function(guest) {
                        var dispGuestName   = guest.f + ' ' + guest.l;
                        var idGuestName     = guest.f + '_' + guest.l;
                        var yesId           = idGuestName + '_y';
                        var noId            = idGuestName + '_n';

                        var mealName        = idGuestName + mealNameSuffix;
                        var meal1Id         = idGuestName + '_meal1';
                        var meal2Id         = idGuestName + '_meal2';
                        var meal3Id         = idGuestName + '_meal3';

                        var guestForm   = "<div class='radioRow row'>";
                        guestForm       += "<div class='col-sm-2 formDesc'>" + dispGuestName + "</div>";

                        guestForm       += "<div class='col-sm-3'><div class='radioSet reqd'>";
                        guestForm       += "<input type='radio' name='" + idGuestName + "' id='" + yesId + "' value='Yes' rel='y'>";
                        guestForm       += "<label for='" + yesId + "'>Attending</label>";
                        guestForm       += "<input type='radio' name='" + idGuestName + "' id='" + noId + "' value='No' rel='n'>";
                        guestForm       += "<label for='" + noId + "'>Can't make it</label>";
                        guestForm       += "<div class='errText'></div>";
                        guestForm       += "</div></div>";

                        guestForm       += "<div class='col-sm-6'>";
                        guestForm       += "<div class='radioSet hideThis' data-rel='" + mealName + "'>";
                        guestForm       += "<span class='formDesc mRight10'>Meal: </span>";
                        guestForm       += "<input type='radio' name='" + mealName + "' id='" + meal1Id + "' value='Filet'>";
                        guestForm       += "<label for='" + meal1Id + "'>Chile-Rubbed Filet</label>";
                        guestForm       += "<input type='radio' name='" + mealName + "' id='" + meal2Id + "' value='Chicken'>";
                        guestForm       += "<label for='" + meal2Id + "'>Braised Chicken</label>";
                        guestForm       += "<input type='radio' name='" + mealName + "' id='" + meal3Id + "' value='Ravioli'>";
                        guestForm       += "<label for='" + meal3Id + "'>Ricotta Ravioli</label>";
                        guestForm       += "<div class='errText'></div>";
                        guestForm       += "</div></div>";

                        guestForm       += "</div>";

                        dynamicForm.append(guestForm);
                    });

                    // jquery UI these guys
                    $(".radioSet").each(function() {
                        $(this).buttonset();
                    });

                    // Attach event handlers
                    dynamicForm.on("click", "input[rel='y']", function() {
                        var mealName    = $(this).attr('name') + mealNameSuffix;

                        var mealChoices = $("div[data-rel='" + mealName + "']");
                        mealChoices.addClass('reqd');
                        mealChoices.fadeIn(duration);
                    });
                    dynamicForm.on("click", "input[rel='n']", function() {
                        var mealName = $(this).attr('name') + mealNameSuffix;

                        var mealChoices = $("div[data-rel='" + mealName + "']");
                        mealChoices.removeClass('reqd');
                        mealChoices.fadeOut(duration);
                    })

                    staticForm.fadeIn(duration);
                    dynamicForm.fadeIn(duration);

                    // Don't want to search through any more guests' names
                    return;
                }
            });
        });
    };

    // Validate inputs and display errors
    var Validate = function(form) {
        var ok = true;

        // Clear errors from previous validations
        form.find("div.errText").empty();

        // Validate that required input fields are set
        form.find("input.reqd").each(function() {
            var curInput = $(this);

            if( curInput.attr('type') !== 'radio' && curInput.val() === "" )
            {
                curInput.parent().find("div.errText").append("Please fill out required field");
                ok = false;
            }
        });

        // Validate that required radio button selections are made
        form.find("div.radioSet.reqd").each(function() {
            var selectionMade   = false;
            var radioSet        = $(this);

            radioSet.find("input[type='radio']").each(function() {
                var radio = $(this);

                if( radio.is(":checked") )
                {
                    selectionMade = true;

                    // Break out of 'each' loop, a selection has been made
                    return false;
                }
            });

            if( !selectionMade )
            {
                radioSet.find("div.errText").append("Please make a selection");
                ok = false;
            }

        });

        return ok;
    };

    guestData.forEach(function(group) {
        group.forEach(function(guest) {

            if( guest.hasOwnProperty("l") &&
                guest.l !== "" &&
                guest.l !== "One" )
            {
                allGuests.push(guest);
                if( $.inArray(guest.l, lastNames) < 0 )
                {
                    lastNames.push(guest.l);
                }
            }
        });
    });

    ////////////////////////////////////////////////////
    // Event handlers

    // Fires/processes when enter is hit in the last name field
    lastNameEntry.on("keydown", function(e) {
        if( e.keyCode == 13 )
        {
            var lastNameParent = lastNameEntry.parent();
            lastNameParent.find($(".errText")).remove();

            firstNameEntry.empty().append("<option value='none'>&nbsp;</option>");
            var lastName = lastNameEntry.val();
            if( $.inArray(lastName, lastNames) < 0 )
            {
                // Didn't find last name in guest list
                lastNameParent.append("<div class='errText textCentered mTop10'>No guests found.</div>");
            }
            else
            {
                allGuests.forEach(function(guest) {
                   if( lastName === guest.l )
                   {
                       var fullName = guest.f + "." + guest.l;
                        firstNameEntry.append($("<option></option>")
                                                   .attr("value", fullName)
                                                   .text(guest.f));
                   }
                });
                $("#firstNameContainer").fadeIn(duration);
            }
        }
    });

    // Fires when user selects their first name from the dropdown
    firstNameEntry.on("change", function() {
        var selectedName = firstNameEntry.find("option:selected").attr("value");

        handleGuestGroup(selectedName);

    });

    // Form submission, call validation before fully submitting
    $("#rsvpSubmit").on("click", function(e) {
        e.preventDefault();

        var form = $("#guestForm");

        // Submit if form is good
        if( Validate(form) )
        {
            form.submit();
        }
    });
};

// Attach event handlers and other things that require page being ready
$(document).ready(function() {

    $("#passcodeEntry").focus();

    // Submit passcode either through pressing enter or clicking submit
    $("#passcodeSubmit").on("click", function() {
        passcodeSubmit();
    });
    $("#passcodeEntry").on("keydown", function(e) {
        if( e.keyCode == 13 )
        {
            passcodeSubmit();
        }
    });

});
