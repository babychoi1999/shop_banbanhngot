<!doctype html>
<html lang="en">

<head>
    <style>
    .slide-arrow {
        position: absolute;
        top: 50%;
        margin-top: -15px;
    }

    .prev-arrow {
        background: transparent;
        left: -40px;
        width: 0;
        height: 0;
        border-left: 0 solid transparent;
        border-right: 15px solid #113463;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;

    }

    .prev-arrow:hover {
        transform: scale(1.3);
    }

    .next-arrow {
        background: transparent;
        right: -40px;
        width: 0;
        height: 0;
        border-right: 0 solid transparent;
        border-left: 15px solid #113463;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
    }

    .next-arrow:hover {
        transform: scale(1.3);
    }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel </title>
    <base href="{{asset('')}}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="front/assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="front/assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="front/assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="front/assets/dest/css/style.css">
    <link rel="stylesheet" href="front/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="front/assets/dest/css/huong-style.css">
    {{-- Cart-css --}}
    <link rel="stylesheet" href="Cart/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="Cart/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="Cart/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="Cart/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="Cart/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="Cart/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="Cart/css/style.css" type="text/css">
</head>

<body>
    @include('layout.header')
    <div class="rev-slider">
        @yield('content');
    </div> <!-- .container -->
    @include('layout.footer')
    <!-- include js files -->
    <script src="front/assets/dest/js/jquery.js"></script>
    <script src="front/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="front/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="front/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
    <script src="front/assets/dest/vendors/animo/Animo.js"></script>
    <script src="front/assets/dest/vendors/dug/dug.js"></script>
    <script src="front/assets/dest/js/scripts.min.js"></script>
    <script src="front/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="front/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script src="front/assets/dest/js/waypoints.min.js"></script>
    <script src="front/assets/dest/js/wow.min.js"></script>
    {{-- Cart-js --}}
    <script src="Cart/js/jquery-ui.min.js"></script>
    <script src="Cart/js/jquery.countdown.min.js"></script>
    <script src="Cart/js/jquery.nice-select.min.js"></script>
    <script src="Cart/js/jquery.zoom.min.js"></script>
    <script src="Cart/js/jquery.dd.min.js"></script>
    <script src="Cart/js/jquery.slicknav.js"></script>
    <script src="Cart/js/owl.carousel.min.js"></script>
    <script src="Cart/js/main.js"></script>
    <!--customjs-->
    <script src="front/assets/dest/js/custom2.js"></script>
    <script>
    $(document).ready(function($) {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 150) {
                $(".header-bottom").addClass('fixNav')
            } else {
                $(".header-bottom").removeClass('fixNav')
            }
        })
    })

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $('.slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });

    $('.slider-km').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesPerRow: 4,
        rows: 2,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });
    $('.similar').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesPerRow: 3,
        rows: 2,
        prevArrow: '<button class="slide-arrow prev-arrow"></button>',
        nextArrow: '<button class="slide-arrow next-arrow"></button>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });

    </script>
    {{-- <script>
function getRemoveCartList(id) {
    jQuery.ajax({
        url: "removecartlist/" + id,
        type: 'GET',
    }).done(function(response) {
        RenderListCart(response);
    });
}

function RenderListCart(response) {
    $('#list-cart').empty();
    $('#list-cart').html(response);
}

</script>
 --}}
</body>

</html>
