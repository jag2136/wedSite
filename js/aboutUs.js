$(document).ready(function() {
    
    // Get nav height for later setting image heights
    var navHeight = $(".nav.nav-pills.nav-stacked").first().innerHeight();
    
    // Keep panel images from growing taller than original panel height
    $(".aboutPanel img").css('max-height', navHeight-20);
   
   
    $(".links ul.nav-pills li a").click(function(e) {
        e.preventDefault();
        var liElem = $(this).parent();
        
        // Switch active element
        if( !liElem.hasClass("active") )
        {
            var grandParent = $(this).parent().parent();
            var activeElem  = grandParent.find("li.active");

            activeElem.removeClass("active");
            $(this).parent().addClass("active");
            
            var oldSection  = activeElem.find("a").text().split(" ")[0];
            var newSection  = $(this).text().split(" ")[0];
            
            $(".aboutPanel ." + oldSection).each(function() {
                $(this).fadeOut(150);
            });
            
            setTimeout(function() {
                $(".aboutPanel ." + newSection).each(function() {
                    $(this).fadeIn(150);
                });                
            }, 150);

            /*var gggParent   = grandParent.parent().parent();            
            
            // Use shared parent ancestor to find old and new sections to hide and show
            var newSecDOM   = gggParent.find("." + newSection);
            gggParent.find("." + oldSection).fadeOut(150, function() {
                newSecDOM.fadeIn(150)
            });*/
           
           
        }
        
    });
});
