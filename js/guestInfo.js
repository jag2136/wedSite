$(document).ready(function() {
   
   var squareMargin     = 8;
   var contentSquares   = $(".contentSquare");
   var containerWidth   = contentSquares.first().parent().width();
   var squareWidth      = Math.floor(containerWidth / 2) - squareMargin;
   
   var shortDuration    = 100;
   var longDuration     = 250;
   
   contentSquares.first().parent().css('min-height', containerWidth);
   
   contentSquares.each(function() {
       $(this).css('width', squareWidth);
       $(this).css('min-height', squareWidth);
   }); 
   
   contentSquares.click(function() {
       var clickedSquare = $(this);
       
       clickedSquare.addClass('active');
       
       if( clickedSquare.hasClass("expanded") )
       {
           // Contracting already-expanded square
           clickedSquare.removeClass("expanded");
           
           // Fade out content
           clickedSquare.find(".hiddenContent").fadeOut(longDuration);
           
           // Contract clicked square
           clickedSquare.animate({
               width:   "-=" + squareWidth + "px",
               height:  "-=" + squareWidth + "px"
           },
           longDuration,
           function() {
               // Don't bring back other squares until clicked square is contracted
               contentSquares.not(".active").each(function() {
                  $(this).fadeIn(longDuration);
               });               
           });           
       }
       else
       {
           // Expanding square
           clickedSquare.addClass("expanded");
           
           // Fade out unclicked squares
           contentSquares.not(".active").each(function() {
              $(this).fadeOut(shortDuration);
           });
           
           // Don't start expanding square until others are gone
           setTimeout(function() {
               clickedSquare.animate({
                   width:   "+=" + squareWidth + "px",
                   height:  "+=" + squareWidth + "px"
               }, longDuration);
               
               clickedSquare.find(".hiddenContent").fadeIn(longDuration);
           }, shortDuration);
       }
       
       clickedSquare.removeClass('active');
   });
   
   $("div.hiddenContent").click(function(e) {
       e.stopPropagation();
   });
   
   
   $("#mbDirections").click(function(e) {
       e.preventDefault();
   
       window.open("http://www.metropolitanbuilding.com/directions.html", "_blank");
   });
});
