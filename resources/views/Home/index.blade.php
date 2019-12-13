<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Engineering Research Community</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('custom/images/ercom.png')}}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="{{asset('assets/vendors/animate/animate.css')}}" rel="stylesheet">
    <!-- Icon CSS-->
	<link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- Camera Slider -->
    <link rel="stylesheet" href="{{asset('assets/vendors/camera-slider/camera.css')}}">
    <!-- Owlcarousel CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/owl_carousel/owl.carousel.css')}}" media="all">

    <!--Theme Styles CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}" media="all" />

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <div class="searchForm">
                <form action="#" class="row m0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                        <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div><!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}" style="padding:0px;"><img src="{{asset('custom/images/ercom.png')}}" style="height: 90px;" alt=""></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="dropdown-toggle"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                        <li><a href="contact.html"><i class="fa fa-address-book-o"></i>&nbsp;Daftar</a></li>
                        <li><a href="contact.html"><i class="fa fa-sign-in"></i>&nbsp;Login</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </div><!-- /.container -->
    </nav>
	<!-- End Header_Area -->

    <!-- Slider area -->
    <section class="slider_area row m0">
        <div class="slider_inner">
            @foreach ($slides as $slide)
                <div data-thumb="{{ $slide->gambar}}" data-src="{{ $slide->gambar }}">
                    <div class="camera_caption">
                       <div class="container">
                            <h5 class="fadeInUp animated" style="color: white; font-weight: bold;">SELAMAT DATANG DI ENGINEERING RESEARCH COMMUNITY</h5>
                            <h3 class="fadeInUp animated" data-wow-delay="0.1s">FAKULTAS TEKNIK, UNIVERSITAS BENGKULU</h3>
                            <p class="fadeInUp animated" data-wow-delay="0.1s" style="text-transform: uppercase;">ERCOM atau Engineering Research Community merupakan sebuah komunitas penelitian bagi seluruh mahasiswa yang ada di Fakultas Teknik Universitas Bengkulu.</p>
                            <a class=" wow fadeInUp " data-wow-delay="1s" href="#">Selengkapnya</a>
                       </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- End Slider area -->

    <!-- Professional Builde -->
    <section class="professional_builder row">
        <div class="container">
           <div class="row builder_all">
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                    <h4>Engineering Research Community ?</h4>
                    <p>
                        UKM ERCOM FT KBM UNIB adalah Lembaga Keilmuan Kampus di tingkat Fakultas Teknik  yang bergerak di bidang pengembangan, penalaran, dan penelitian.
                    </p>
                </div>
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                    <h4>Tahun Berdiri Engineering Research Community ?</h4>
                    <p>
                        UKM ERCOM FT KBM UNIB berdiri pada 31 Agustus 2017 dan untuk jangka waktu yang tidak ditentukan.


                    </p>
                </div>
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <h4>Dimana Engineering Research Community ?</h4>
                    <p>
                        UKM ERCOM FT KBM UNIB bertempat di Fakultas teknik universitas bengkulu.
                    </p>
                </div>
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <h4>Visi Engineering Research Community ?</h4>
                    <p>
                        Terbentuknya UKM ERCOM FT KBM UNIB yang memiliki kader-kader yang kompeten dalam kepenelitian, profesional secara kelembagaan,  serta  memiliki  jejaring  dan  kontribusi  nyata  pada tataran global
                    </p>
                </div>
           </div>
        </div>
    </section>
    <!-- End Professional Builde -->

    <!-- About Us Area -->
    @include('home/partials/dirut')
    <!-- End About Us Area -->

    <!-- Our Team Area -->
    @include('home/partials/team')
    <!-- End Our Team Area -->

    <!-- What ew offer Area -->
    <section class="what_we_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>KEGIATAN ENGINEERING RESEARCH COMMUNITY FAKULTAS TEKNIK UNIVERSITAS BENGKULU</h2>
                <h4>Daftar kegiatan terbaru engineering research community</h4>
            </div>
                <div class="row construction_iner">
                    <?php 
                        $kegiatan = DB::table('tb_kegiatan')->get();
                        foreach ($kegiatan as $kegiatan) {
                    ?>
                            <div class="col-md-4 col-sm-6 construction">
                               <div class="cns-img">
                                    <img src="{{ $kegiatan->gambar_kegiatan }}" alt="">
                               </div>
                               <div class="cns-content">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <a href="#">{{ $kegiatan->judul_kegiatan }}</a>
                                    <p>{{ $kegiatan->isi }}</p>
                               </div>
                            </div>
                    <?php 
                        }
                    ?>
            </div>
        </div>
    </section>
    <!-- End What ew offer Area -->

    <!-- Our Features Area -->
    <section class="our_feature_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Kenapa Bergabung Engineering Research Community (ERCOM) FT UNIB ??</h2>
            </div>
            <div class="feature_row row">
                <div class="col-md-6 feature_img">
                    <img src="<?php  $data = DB::table('tb_slide')->where('id_slide',5)->get(); foreach ($data as $data) { echo $data->gambar; }?>" alt="">

                </div>
                <div class="col-md-6 feature_content">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-hand-grab-o" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Belajar Berorganisasi dan Bersosialisasi</a>
                            <p>Benar saja, ERCOM FT UNIB merupakan wadah yang cocok untuk berorganisasi dan bersosialisasi. Beragam agenda yang di tawarkan ERCOM FT UNIB pun menjadi salah satu fasilitas yang sangat mendukung niatan para anggota maupun pengurus dalam berorganisasi.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Belajar Penelitian dan Menulis</a>
                            <p>Jika kamu ingin belajar menulis sekaligus menjadi peneliti muda, ERCOM FT UNIB merupakan organisasi yang tepat untukmu. Skill menulismu akan berkembang melalui agenda pelatihan ataupun diskusi yang ditawarkan.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <i class="fa fa-align-center" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            <a href="#">Punya Bekal Menulis Skripsi</a>
                            <p>Mengikuti ERCOM FT UNIB memberikan bekal bagi kamu dalam menyusun skripsi. Melalui pelatihan kepenulisan akan memberikanmu bekal yang kuat untuk menyelesaikan skripsimu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Features Area -->
{{-- 
    <!-- Our Testimonial Area -->
    <section class="testimonial_area row" data-stellar-background-ratio="0.3">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Pembina UKM ERCOM Fakultas Teknik Universitas Bengkulu</h2>
                <h4>Sambutan Pembina UKM ERCOM Fakultas Teknik Universitas Bengkulu</h4>
            </div>
            <div class="testimonial_carosel">
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{asset('assets/images/testimonial-2.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Emran Khan</h4>
                            <h6>Web Developer</h6>
                        </div>
                    </div>
                    <p><i class="fa fa-quote-right" aria-hidden="true"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio<i class="fa fa-quote-left" aria-hidden="true"></i></p>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{asset('assets/images/testimonial-3.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Emran Khan</h4>
                            <h6>Web Developer</h6>
                        </div>
                    </div>
                    <p><i class="fa fa-quote-right" aria-hidden="true"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio<i class="fa fa-quote-left" aria-hidden="true"></i></p>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{asset('assets/images/testimonial-1.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Prodip ghosht</h4>
                            <h6>Brand Manager</h6>
                        </div>
                    </div>
                    <p><i class="fa fa-quote-right" aria-hidden="true"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio<i class="fa fa-quote-left" aria-hidden="true"></i></p>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{asset('assets/images/testimonial-2.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Jakaria Khan</h4>
                            <h6>Brand Manager</h6>
                        </div>
                    </div>
                    <p><i class="fa fa-quote-right" aria-hidden="true"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio<i class="fa fa-quote-left" aria-hidden="true"></i></p>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{asset('assets/images/testimonial-1.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Prodip ghosht</h4>
                            <h6>Brand Manager</h6>
                        </div>
                    </div>
                    <p><i class="fa fa-quote-right" aria-hidden="true"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio<i class="fa fa-quote-left" aria-hidden="true"></i></p>
                </div>
                <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{asset('assets/images/testimonial-2.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Jakaria Khan</h4>
                            <h6>Brand Manager</h6>
                        </div>
                    </div>
                    <p><i class="fa fa-quote-right" aria-hidden="true"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio<i class="fa fa-quote-left" aria-hidden="true"></i></p>
                </div>
            </div>
        </div>
    </section>
 --}}    <!-- End Our testimonial Area -->

    <!-- Our Latest Blog Area -->
    @include('home/partials/berita')
    <!-- End Our Latest Blog Area -->

    <!-- Our Partners Area -->
    @include('home/partials/pendaftaran')
    <!-- End Our Partners Area -->

    <!-- Footer Area -->
    @include('home/partials/footer')
    <!-- End Footer Area -->

    <!-- jQuery JS -->
    <script src="{{asset('assets/js/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Animate JS -->
    <script src="{{asset('assets/vendors/animate/wow.min.js')}}"></script>
    <!-- Camera Slider -->
    <script src="{{asset('assets/vendors/camera-slider/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('assets/vendors/camera-slider/camera.min.js')}}"></script>
    <!-- Isotope JS -->
    <script src="{{asset('assets/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendors/isotope/isotope.pkgd.min.js')}}"></script>
    <!-- Progress JS -->
    <script src="{{asset('assets/vendors/Counter-Up/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/vendors/Counter-Up/waypoints.min.js')}}"></script>
    <!-- Owlcarousel JS -->
    <script src="{{asset('assets/vendors/owl_carousel/owl.carousel.min.js')}}"></script>
    <!-- Stellar JS -->
    <script src="{{asset('assets/vendors/stellar/jquery.stellar.js')}}"></script>
    <!-- Theme JS -->
    <script src="{{asset('assets/js/theme.js')}}"></script>
</body>
</html>
