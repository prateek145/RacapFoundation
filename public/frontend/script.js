

$('.proj').owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true,
                loop: true,
                autoplay: true
            },
            600: {
                items: 2,
                nav: true,
                loop: true,
                autoplay: true
            },
            1000: {
                items: 2,
                nav: true,
                loop: true,
                autoplay: true

            }
        }
    })





$('.iconz').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        pagination:false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                loop: true,
                pagination:false,
                autoplay: true
            },
            600: {
                items: 3,
                nav: false,
                loop: true,
                pagination:false,
                autoplay: true
            },
            1000: {
                items: 6,
                nav: false,
                loop: true,
                pagination:false,
                autoplay: true

            }
        }
    })








$('.customers').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        pagination:false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                loop: true,
                pagination:false,
                autoplay: true
            },
            600: {
                items: 3,
                nav: false,
                loop: true,
                pagination:false,
                autoplay: true
            },
            1000: {
                items: 4,
                nav: false,
                loop: true,
                pagination:false,
                autoplay: true

            }
        }
    })




new DataTable('#example');