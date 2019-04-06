<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Smart Agriculture</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('frontend/img/core-img/favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/style.rtl.css') }}">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="uzaNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{ url('/') }}"><img src="{{ asset('frontend/img/core-img/logo.jpg') }}" alt="" width="100px" ></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li class="current-item"><a href="{{ url('/') }}">الدروس</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 style="text-align: right;">عرض الدروس</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> الرئيسية</a></li>

                                <li class="breadcrumb-item active" aria-current="page">الدروس</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="{{ asset('frontend/img/core-img/curve-5.png') }}" alt="">
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <div class="uza-blog-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center"> تفاصيل المساق  </h3>
                </div>
                <div class="col-md-12">
                    <p class="pull-right">
                        <strong> تاريخ العرض :   </strong> {{ $data[0]['showdate'] }}
                    </p>
                </div>
                <div class="col-md-12">
                    <p class="pull-right">
                        <strong> اسم المساق :  </strong> {{ $data[0]['course_relation']['name'] }}
                    </p>
                </div>
                <div class="col-md-12">
                    <p class="pull-right">
                        <strong> تفاصيل المساق  :  </strong> {{ $data[0]['course_relation']['desc'] }}
                    </p>
                </div>
                <div class="col-md-12">
                    <p class="pull-right">
                        <strong> سعر المساق  :  </strong> {{ $data[0]['course_relation']['price'] }} جنية مصري
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->
    <!-- ***** Blog Area Start ***** -->
    <div class="uza-blog-area section-padding-80">
        <div class="container">
            <div class="row">
                @foreach ($data[0]['course_relation']['lessons_relation'] as $l)
                    <!-- Single Blog Post -->
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-post bg-img mb-80" style="background-image: url('{{ ShowImage($l['image']) }}')">
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="#" class="post-title" style="text-align: right;">{{ $l['title'] }}</a>
                                <p>{{ $l['content'] }}</p>
                                <a href="{{ url('/lesson/'.$l['id']) }}" class="read-more-btn">المزيد <i class="arrow_carrot-2left"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ***** Blog Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">تواصل معنا</h4>

                        <!-- Footer Content -->
                        <div class="footer-content mb-15">
                            <h3>(+65) 1234 5678</h3>
                            <p> المنيا <br>  البريد الالكتروني </p>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">روابط سريعة</h4>

                        <!-- Nav -->
                        <nav>
                            <ul class="our-link">
                                <li><a href="#">من نحن</a></li>
                                <li><a href="#">تواصل معنا</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>


                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">من نحن</h4>
                        <p>مشروع اسمارت للتعليم الذكي</p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text mb-30">
                            <p>&copy; حقوق الطبع 2019  <a href="#">مشروع اسمارت للتنمية البشرية</a>.</p>
                        </div>

                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                </div>

            </div>

 <div class="row" style="margin-bottom: 30px;">

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
حقوق الطبع و النشر &copy;<script>document.write(new Date().getFullYear());</script> جميع الحقوق محفوظة <i class="fa fa-heart-o" aria-hidden="true"></i>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>

        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!-- All js -->
    <script src="{{ asset('frontend/js/uza.bundle.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('frontend/js/default-assets/active.js') }}"></script>

</body>

</html>
