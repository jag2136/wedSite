$(document).ready(function() {

    // Menu text animation
    $("div.menu div.itemText").mouseenter(function() {
        // The not-animated filter prevents multiple animations from queuing up
        // http://css-tricks.com/full-jquery-animations/
        $(this).filter(':not(:animated)').animate({"margin-right"  : "20px",
                       "opacity"       : 0.6}, 350);
    }).mouseleave(function() {
        // Don't need it here, want revert-animation to happen always
        $(this).animate({"margin-right"  : "0px",
                         "opacity"       : 1.0}, 350);
    }).click(function (){
        // Link action - php ensures that rel is unset if linked file doesn't exist
        var link = $(this).attr('rel');
        if(typeof link !== "undefined" && link != "")
        {
            window.location = link;
        }
    });



});