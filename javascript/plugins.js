
//WOW animation active after scrolling the current view 
var wow = new WOW({
                boxClass: 'wow', // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset: 0, // distance to the element when triggering the animation (default is 0)
                mobile: true, // trigger animations on mobile devices (default is true)
                live: true, // act on asynchronously loaded content (default is true)
                callback: function(box) {
                    // the callback is fired every time an animation is started
                    // the argument that is passed in is the DOM node being animated
                },
                scrollContainer: null // optional scroll container selector, otherwise use window
            });
            wow.init();


//carousel partners logo

$('#bs4-multi-slide-carousel').carousel({
                interval: 5000
            })

// Number counting 
$(".numCount").counterUp({
    delay: 10,
    time: 1000
});

//arrow collapse for read more
$(document).ready(function() {
    $('.collapse-arrow').on('shown.bs.collapse', function() {
        $(this).parent().find('.fa-angle-down')
            .removeClass('fa-angle-down')
            .addClass('fa-angle-up');
    }).on('hidden.bs.collapse', function() {
        $(this).parent().find(".fa-angle-up")
            .removeClass("fa-angle-up")
            .addClass("fa-angle-down");
    });
});

function flipStruktur() {
    $('.skabe-struk-flip').toggleClass('flipped');
}

function flipOverskud() {
    $('.overskud-flip').toggleClass('flipped');
}

function flipUdvikling() {
    $('.udvikling-flip').toggleClass('flipped');
}