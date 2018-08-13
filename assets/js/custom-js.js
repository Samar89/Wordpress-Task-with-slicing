//Add Active Class To The First Carousel Item Div
$( "div.carousel-item" ).first().addClass( "active" );

// Start the JS of Egypt News Slider 
$('#Carousel').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<2;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
      }
});
// End the JS of Egypt News Slider 

// Make The Side Banner Fixed After Scrolling
var fixmeTop = $('.SideBanner').offset().top;       

$(window).scroll(function() {                 

    var currentScroll = $(window).scrollTop();

    if (currentScroll >= fixmeTop) {          
        $('.SideBanner').css({                      
            position: 'fixed',
            top: '0'
        });
    } else {                                   
        $('.SideBanner').css({                      
            position: 'absolute' , 
            top : 'auto'
        });
    }

});