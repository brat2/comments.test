<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="DynamicLayers">

    <title>Charitify || NGO/Charity/Fundraising Template</title>

    <link rel="shortcut icon" type="image/x-icon" href="blog/img/favicon.png">

    <!-- Font Awesome Icons CSS -->
    <link rel="stylesheet" href="blog/css/font-awesome.min.css">
    <!-- Themify Icons CSS -->
    <link rel="stylesheet" href="blog/css/themify-icons.css">
    <!-- Elegant Font Icons CSS -->
    <link rel="stylesheet" href="blog/css/elegant-font-icons.css">
    <!-- Elegant Line Icons CSS -->
    <link rel="stylesheet" href="blog/css/elegant-line-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="blog/css/bootstrap.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="blog/css/venobox/venobox.css">
    <!-- OWL-Carousel CSS -->
    <link rel="stylesheet" href="blog/css/owl.carousel.css">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="blog/css/slicknav.min.css">
    <!-- Css Animation CSS -->
    <link rel="stylesheet" href="blog/css/css-animation.min.css">
    <!-- Nivo Slider CSS -->
    <link rel="stylesheet" href="blog/css/nivo-slider.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="blog/css/main.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="blog/css/responsive.css">

    <script src="blog/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="site-preloader-wrap">
        <div class="spinner"></div>
    </div><!-- Preloader -->

    <header id="header" class="header-section">
        <div class="bottom-header">
            <div class="container">
                <div class="bottom-content-wrap row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8 text-right">

                        <ul id="mainmenu" class="nav navbar-nav nav-menu">
                            @auth
                            <li>{{Auth::user()->login}}</li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Выйти') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                            @else
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                            @endif
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- /Header Section -->

    <div class="header-height"></div>

    <!-- /Page Header -->

    <section class="blog-section bg-grey padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 sm-padding">
                    <div class="blog-items single-post row">
                        <h2>3 сентября</h2>

                        <p>Национальная армия Республики Молдова представляет собой один из наиболее важных институтов оплота системы национальной безопасности государства. Ежегодно 3 сентября в Молдове отмечают День Национальной армии.

                            Дата для праздника была выбрана в связи с тем, что в этот день в 1991 году президент Молдавии подписал указ «Об образовании Вооружённых сил». А полностью процесс создания военных структур Вооруженных сил страны был завершен к 1997 году. В состав Вооруженных сил Республики Молдова входят Сухопутные войска, Военно-воздушные силы и Дунайские силы.
                        </p>

                        <div class="comments-wrapper">
                            @if(count($data) > 0)
                            <label for="filter">Отфильтровать: </label>
                            <input type="text" name="filter" id="filter" list="select">
                            <datalist id="select">
                            </datalist>
                            <ul id="comments-list" class="comments-list">

                                @foreach($data as $comment)
                                <li>
                                    <div class="comment-box">
                                        <div class="comment-head">
                                            <h6 class="comment-name by-author">{{$comment['user']['login']}}</h6>
                                        </div>
                                        <div class="comment-content">
                                            {!!nl2br($comment['message'])!!}
                                        </div>
                                    </div>


                                </li>
                                @endforeach
                            </ul>
                            <div class="text-center pb-5"><button id="more" type="button" class="btn btn-primary btn-sm"> Показать ещё</button></div>
                            @else
                            <h4>Будьте первым, оставьте комментарий</h4>
                            @endif
                            <div class="comment-form">
                                @auth
                                <form action="{{route('addComment')}}" method="post" id="ajax_form" class="form-horizontal">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Ваш комментарий" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <button id="submit" class="default-btn" type="submit">Отправить</button>
                                        </div>
                                    </div>
                                    <div id="form-messages" class="alert" role="alert"></div>
                                </form>
                                @else
                                <p>Авторизуйтесь, чтобы оставить комментарий</p>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div><!-- Blog Posts -->
                <div class="col-lg-3 sm-padding">

                </div>
            </div>
        </div>
    </section><!-- /Blog Section -->



    <!-- jQuery Lib -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="blog/js/vendor/bootstrap.min.js"></script>
    <!-- Tether JS -->
    <script src="blog/js/vendor/tether.min.js"></script>
    <!-- Imagesloaded JS -->
    <script src="blog/js/vendor/imagesloaded.pkgd.min.js"></script>
    <!-- OWL-Carousel JS -->
    <script src="blog/js/vendor/owl.carousel.min.js"></script>
    <!-- isotope JS -->
    <script src="blog/js/vendor/jquery.isotope.v3.0.2.js"></script>
    <!-- Smooth Scroll JS -->
    <script src="blog/js/vendor/smooth-scroll.min.js"></script>
    <!-- venobox JS -->
    <script src="blog/js/vendor/venobox.min.js"></script>
    <!-- ajaxchimp JS -->
    <script src="blog/js/vendor/jquery.ajaxchimp.min.js"></script>
    <!-- Counterup JS -->
    <script src="blog/js/vendor/jquery.counterup.min.js"></script>
    <!-- waypoints js -->
    <script src="blog/js/vendor/jquery.waypoints.v2.0.3.min.js"></script>
    <!-- Slick Nav JS -->
    <script src="blog/js/vendor/jquery.slicknav.min.js"></script>
    <!-- Nivo Slider JS -->
    <script src="blog/js/vendor/jquery.nivo.slider.pack.js"></script>
    <!-- Letter Animation JS -->
    <script src="blog/js/vendor/letteranimation.min.js"></script>
    <!-- Wow JS -->
    <script src="blog/js/vendor/wow.min.js"></script>
    <!-- Contact JS -->
    <script src="blog/js/contact.js"></script>
    <!-- Main JS -->
    <script src="blog/js/main.js"></script>

</body>

</html>