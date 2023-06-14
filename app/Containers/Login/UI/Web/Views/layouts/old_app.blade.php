<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>My Layout</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/vendor/bootstrap/offcanvas.css">
    <!-- CSS Global Icons -->
    <link rel="stylesheet" href="/assets/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/vendor/icon-line/css/simple-line-icons.css">
    <link rel="stylesheet" href="/assets/vendor/icon-etlinefont/style.css">
    <link rel="stylesheet" href="/assets/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="/assets/vendor/icon-hs/style.css">
    <link rel="stylesheet" href="/assets/vendor/dzsparallaxer/dzsparallaxer.css">
    <link rel="stylesheet" href="/assets/vendor/dzsparallaxer/dzsscroller/scroller.css">
    <link rel="stylesheet" href="/assets/vendor/dzsparallaxer/advancedscroller/plugin.css">
    <link rel="stylesheet" href="/assets/vendor/animate.css">
    <link rel="stylesheet" href="/assets/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="/assets/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="/assets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/assets/vendor/fancybox/jquery.fancybox.css">

    <!-- CSS Unify -->
    <link rel="stylesheet" href="/assets/css/unify-core.css">
    <link rel="stylesheet" href="/assets/css/unify-components.css">
    <link rel="stylesheet" href="/assets/css/unify-globals.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>
<body class="u-body--header-side-static-left">
<main>
    <!-- Sidebar Navigation -->
    <div id="js-header" class="u-header u-header--side" data-header-position="left" data-header-breakpoint="lg">
        <div class="u-header__sections-container g-bg-blue-white g-brd-right--lg g-brd-gray-light-v5 g-py-0 g-py-10--lg g-px-0  --lg">
            <div class="u-header__section u-header__section--light">
                <nav class="navbar navbar-expand-lg">
                    <div class="js-mega-menu container">
                        <!-- Responsive Toggle Button -->
                        <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                            <span class="hamburger hamburger--slider">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </span>
                        </button>
                        <!-- End Responsive Toggle Button -->
                        <!-- Logo -->
                        <a href="/" class="navbar-brand">
                            <img src="https://kpi.ua/files/kpi-logo.png" alt="Image Description">
                        </a>
                        <div style="color: #fff; font-size: 18px; text-align: center;" class="g-mb-0--lg">
                            КПІ ім. Ігоря Сікорського
                            Департамент якості освітнього процесу
                        </div>
                        <!-- End Logo -->
                        @auth
                            {{--<a href="/logout" class="btn btn-md u-btn-primary g-mr-10 g-mb-15">Вихід</a>--}}
                        @else
                        <a href="/login" class="btn btn-md u-btn-primary g-mr-10 g-mb-15">Вхід</a>
                        @endauth
                        {{--<div class="text-center g-hidden-lg-down">

                            <p class="mb-0">2018 &copy; All Rights Reserved.</p>

                        </div>--}}

                    </div>
                </nav>

            </div>
            <aside class="g-brd-around g-px-20 g-py-10">

                <hr class="g-brd-gray-light-v4 g-my-10">

                <!-- Profile Settings List -->
                <ul class="list-unstyled mb-0">
                    <li class="g-pb-3">
                        <a class="d-block active align-middle u-link-v5 g-color-text g-color-primary--hover g-bg-blue-light-v5--hover g-color-primary--parent-active g-bg-blue-light-v5--active rounded g-pa-3" href="/department">
                            <span class="u-icon-v1 g-color-white-dark-v5 mr-2">
                                <i class="icon-finance-253 u-line-icon-pro"></i>

                            </span>
                            Кафедри
                        </a>
                    </li>
                </ul>
                <!-- End Profile Settings List -->
            </aside>
        </div>
        @auth
            <div @class('navbar-bottom')>
                <ul class="list-unstyled">
                    <li class="d-flex justify-content-start g-pa-20">
                        <div class="g-mt-2">
                            <img class="g-width-50 g-height-50 rounded-circle" src="/assets/img-temp/100x100/img7.jpg" alt="Image Description">
                        </div>
                        <div class="align-self-center g-px-10">
                            <h5 class="h6 g-font-weight-600 g-color-black g-mb-3">
                                <span class="g-mr-5 color-white">{{ auth()->user()->name }}</span>
                            </h5>
                            <p class="m-0"></p>
                        </div>
                        <div class="align-self-center ml-auto">
                            <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i @class('icon-settings')></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/">Action</a>
                                <a class="dropdown-item" href="#!">Another action</a>
                                <a class="dropdown-item" href="#!">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Вихід</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        @endauth
    </div>
    <!-- End Sidebar Navigation -->

@yield('content')
    <!-- Copyright Footer -->

</main>

<!-- JS Global Compulsory -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
<script src="/assets/vendor/popper.min.js"></script>
<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

<script src="/assets/vendor/bootstrap/offcanvas.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
<script src="/assets/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
<script src="/assets/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
<script src="/assets/vendor/masonry/dist/masonry.pkgd.min.js"></script>
<script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="/assets/vendor/gmaps/gmaps.min.js"></script>

<!-- JS Unify -->
<script src="/assets/js/hs.core.js"></script>

<script src="/assets/js/components/hs.header-side.js"></script>
<script src="/assets/js/helpers/hs.hamburgers.js"></script>

<script src="/assets/js/components/hs.dropdown.js"></script>
<script src="/assets/js/components/hs.scrollbar.js"></script>
<script src="/assets/js/components/hs.popup.js"></script>
<script src="/assets/js/components/hs.carousel.js"></script>
<script src="/assets/js/components/hs.header-fullscreen.js"></script>
<script src="/assets/js/components/gmap/hs.map.js"></script>

<script src="/assets/js/components/hs.go-to.js"></script>

<!-- JS Custom -->
<script src="/assets/js/custom.js"></script>

<!-- JS Plugins Init. -->
<script>
    // initialization of google map
    function initMap() {
        $.HSCore.components.HSGMap.init('.js-g-map');
    }

    $(document).on('ready', function () {
        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of HSDropdown component
        $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
            afterOpen: function(){
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of masonry
        $('.masonry-grid').imagesLoaded().then(function () {
            $('.masonry-grid').masonry({
                columnWidth: '.masonry-grid-sizer',
                itemSelector: '.masonry-grid-item',
                percentPosition: true
            });
        });

        // initialization of popups
        $.HSCore.components.HSPopup.init('.js-fancybox');
    });

    $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeaderSide.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');
        $.HSCore.components.HSHeaderFullscreen.init($('#js-header-nav'));

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            direction: 'vertical',
            breakpoint: 991
        });
    });
</script>
</body>
</html>
