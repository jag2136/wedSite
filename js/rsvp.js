
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
            console.log(response);

            respElem.empty().append(response);

            if( response.indexOf("errText") == -1 )
            {
                // Success, fade out passcode form and fade in rsvp form
                $("#passcodeForm").fadeOut(duration, function() {
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


// Attach event handlers and other things that require page being ready
$(document).ready(function() {

    $("#passcodeEntry").focus();

    // Submit passcode either through pressing enter or clicking submit
    $("#passcodeSubmit").on("click", function() {
        passcodeSubmit();
    });
    $("#passcodeEntry").on("keydown", function(e) {
        if(e.keyCode == 13)
        {
            passcodeSubmit();
        }
    });

});
