var $jq = jQuery.noConflict();
$jq(document).ready(function(){
    $jq('.slide-product').slick({
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa-solid fa-arrow-right fa-rotate-180'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa-solid fa-arrow-right'></i></button>",
    });
});

$jq(document).ready(function(){
    $jq('.slide-trademark').slick({
        slidesToShow: 5,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        arrows: false,
    });
});

var $jq = jQuery.noConflict();
$jq(document).ready(function(){
    $jq('.slide-san-pham').slick({
        slidesToShow: 4,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa-solid fa-arrow-right fa-rotate-180'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa-solid fa-arrow-right'></i></button>",
    });
});