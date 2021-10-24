$('.owl-carousel-slide').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    animateOut: 'fadeOut',
    nav: false,
    dots: false,
    margin: 20,
    responsive:{
        0:{
            items:2
        },
        500:{
            items:3
        },
        767:{
            items:4
        },
        991:{
            items:5
        }
    }
})

$('.owl-carousel-testimonial').owlCarousel({
    loop: true,
    autoplay: false,
    autoplayTimeout: 3000,
    animateOut: 'fadeOut',
    nav: true,
    dots: true,
    margin: 20,
    items:1
})