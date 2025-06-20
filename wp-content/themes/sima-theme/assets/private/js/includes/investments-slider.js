$(document).ready(function() {
    let investmentSlider = $('.investment__slider .slider');

    if (investmentSlider.length > 0 && investmentSlider.children().length > 4) {
        investmentSlider.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: false,
            prevArrow: "<div class='prev_arrow'><i class='fas fa-arrow-circle-left'></i></div>",
            nextArrow: "<div class='next_arrow'><i class='fas fa-arrow-circle-right'></i></div>",
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
});