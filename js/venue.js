// Need window.load because cannot get Height of dynamic height elements
// until full page is drawn and loaded
//      EG: $(element).outerHeight() returns 0 if page not fully loaded
//          and height not set directly via css
$(window).load(function() {
    
    // Taken from internet:
    // http://net.tutsplus.com/tutorials/html-css-techniques/simple-parallax-scrolling-technique/
    $(".slowScroll").each(function(){
        var $bgobj              = $(this);
        var scrollSpeedInverse  = 4
     
        $(window).scroll(function() {
            var yPos = -($(window).scrollTop() / scrollSpeedInverse);
             
            // Put together our final background position
            var coords = '50% '+ yPos + 'px';
 
            // Move the background
            $bgobj.css({ backgroundPosition: coords });
        });
    });
});
