// Global animation duration, separate funcs need to know it so timing of callbacks line up
var duration = 500;

// Attaches click handlers to profile divs for expand/contract functionality
var profileClick = function(profileHeight) {
    
    // Ensure click handler isn't bound multiple times
    $('div.profile').unbind('click').click(function() {
        var innerDiv    = $(this).find('.hiddenContent');
        
        var curSide     = 0;
        var pixelChange = 0;
        var changeStr   = '';
        var newSide     = 0;
        
        // Animate opacity and hidden/displayed elements
        if( $(this).hasClass('expanded') )
        {
            // Contracting
            newSide       = profileHeight;
            pixelChange   = -profileHeight;
                        
            $(this).removeClass('expanded');
            
            // Handle inner contents
            innerDiv.animate({
                opacity: 0
            },
            duration,
            function() {
                // Don't hide fully until opacity animation complete
                innerDiv.hide();
            });
        }
        else
        {
            // Expanding
            newSide       = 2 * profileHeight;
            pixelChange   = profileHeight;
            
            $(this).addClass('expanded');
            
            // Handle inner contents
            innerDiv.show();            
            innerDiv.animate({
                opacity: 1
            },
            duration);
        }

        // Set up jQuery animation size change string    
        changeStr   = '+=' + pixelChange + 'px';

        // Animate size change
        $(this).animate({
            width:              changeStr,
            height:             changeStr
        },
        duration,
        function() {
            // Ensure dimensions are correct after animation completes
            $(this).css('width', newSide + 'px');
            $(this).css('height', newSide + 'px');
        });
        
    });    
};

// Called on window load or resize events
var loadResize = function(isInitLoad) {
    
    var profileHeight = 0;
    
    // If this is a window resize, need to remove height/width css that may have been
    // set via expand/contract click handlers if profiles were clicked
    if( !isInitLoad )
    {
        $("div.profile").each(function() {
            $(this).css('width', '').css('height', '');
            $(this).find("img")
                   .css('width', '').css('height', '');
        });
    }
    
    // Can now grab 'organically' set profile heights
    profileHeight   = parseInt($('div.profile').first().height(), 10);

    $("div.profile img").each(function() { 
            
        // Set image dimensions so size doesn't change on div expansion
        $(this).css('width',  profileHeight);
        $(this).css('height', profileHeight);       
    });

    // Attach click handlers with updated profile heights for correct expand/contract size
    profileClick(profileHeight);
};

// Need window.load because cannot get Height/width of dynamic height elements
// until full page is drawn and loaded
// 		EG: $(element).height() returns 0 if page not fully loaded
//		    and height not set directly via css
$(window).load(function() {      
    loadResize(true);
});

$(window).resize(function() {
    // On window resizing first need to contract expanded elements
    var expandedElem    = $("div.profile.expanded");
    var waitDuration    = 0;
    
    // If expanded elements exist, trigger click handler on them and then only do the
    // element resize after the contraction animation completes (.005s extra to ensure it is done)
    if( expandedElem.length > 0 )
    {
        expandedElem.trigger("click");
        waitDuration    = duration + 5;
    }
    
    setTimeout(function() { loadResize(false); }, waitDuration);
});
