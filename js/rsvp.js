
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

            if( response.indexOf("errText") == -1 )
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

    // Fires when someone selects their first name from the dropdown
    firstNameEntry.on("change", function() {
        var selectedName = firstNameEntry.find("option:selected").attr("value");

        var handleGuestGroup = function() {
            guestData.forEach(function(group) {
                var curGroup = group;

                group.forEach(function(guest) {
                    var curGuestName = guest.f + "." + guest.l;
                    if( curGuestName === selectedName )
                    {
                        curGroup.forEach(function(guest) {
                           console.log(guest.f + " WOO " + guest.l);


                        });

                        // Don't want to process any more guests as guest was found
                        return;
                    }
                });
            });
        };

        handleGuestGroup();

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
