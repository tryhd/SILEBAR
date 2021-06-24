<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Website Kecamatan Cilebar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Your page description here" />
    <meta name="author" content="" />

    <!-- css -->
    <link href="{{asset('Remember/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('Remember/css/bootstrap-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('Remember/css/prettyPhoto.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{asset('Remember/css/style.css')}}" rel="stylesheet">

    <!-- Theme skin -->
    <link id="t-colors" href="{{asset('Remember/color/default.css')}}" rel="stylesheet" />

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('Remember/ico/logo.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('Remember/ico/logo.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('Remember/ico/logo.png')}}" />
    <link rel="apple-touch-icon-precomposed" href="{{asset('Remember/ico/logo.png')}}" />
    <link rel="shortcut icon" href="{{asset('Remember/ico/logo.png')}}" />

    <!-- =======================================================
    Theme Name: Remember
    Theme URL: https://bootstrapmade.com/remember-free-multipurpose-bootstrap-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>

    <div id="wrapper">
        <!-- start header -->
        <header>
            <div class="top">
                {{-- <div class="container">
                    <div class="row">
                        <div class="span6">
                            <ul class="topmenu">
                                <li><a href="{{Route('kegiatan.index')}}">Home</a></li>
                <!-- <li><a href="#">Terms</a> &#47;</li>
                <li><a href="#">Privacy policy</a></li> -->
                </ul>
            </div>
            <div class="span6">

                <ul class="social-network">
                    <li><a href="#" data-placement="bottom" title="Facebook"><i
                                class="icon-circled icon-bglight icon-facebook"></i></a></li>
                    <li><a href="#" data-placement="bottom" title="Twitter"><i
                                class="icon-circled icon-bglight icon-twitter"></i></a></li>
                    <li><a href="#" data-placement="bottom" title="Linkedin"><i
                                class="icon-circled icon-linkedin icon-bglight"></i></a></li>
                    <li><a href="#" data-placement="bottom" title="Pinterest"><i
                                class="icon-circled icon-pinterest  icon-bglight"></i></a></li>
                    <li><a href="#" data-placement="bottom" title="Google +"><i
                                class="icon-circled icon-google-plus icon-bglight"></i></a></li>
                </ul>

            </div>
    </div>
    </div> --}}
    </div>
    <div class="container">


        <div class="row nomargin">
            <div class="span4">
                <div class="logo">

                    <h1><a href="{{ route('website') }}"><i><img src="{{asset('Remember/ico/logo.png')}}" alt=""
                                    height="30" width="20"> </i> Kecamatan Cilebar</a></h1>
                </div>
            </div>
            <div class="span8">
                <div class="navbar navbar-static-top">
                    <div class="navigation">
                        <nav>
                            <ul class="nav topnav">
                                <li class="dropdown active"><a href="{{ route('website') }}">Home</a></li>
                                <li>
                                    <a href="{{ route('web-kegiatan') }}">Kegiatan</a>
                                </li>
                                <li>
                                    <a href="{{ route('web-pelayanan') }}">Pelayanan</a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}" target="blank">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" target="blank">Register</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end navigation -->
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- end header -->

    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                        <h2>Beranda</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                        <li class="active"><a href="{{ route('website') }}">Home</a> <i class="icon-angle-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="content">
        <div class="container">
            <div class="row">

                <div class="span4">

                    <aside class="left-sidebar">

                        {{-- <div class="widget">
                            <form>
                                <div class="input-append">
                                    <input class="span2" id="appendedInputButton" type="text" placeholder="Type here">
                                    <button class="btn btn-color" type="submit">Search</button>
                                </div>
                            </form>
                        </div> --}}

                        {{-- <div class="widget">

                                <h5 class="widgetheading">Kelurahan</h5>
                                @foreach($kelurahan as $row)
                                <ul class="cat">
                                    <li><i class="icon-angle-right"></i> <a href="#">{{$row->nama_kelurahan}}</a></li>
                        </ul>
                        @endforeach
                </div> --}}
                {{-- <div class="widget">

                    <h5 class="widgetheading">More Info Cilebar</h5>
                    <p>
                        Lorem ipsum dolor sit amet, quo everti torquatos rationibus an, graeci splendide mel
                        cu. Sed ad vidisse eruditi maluisset, et duo mazim placerat adipiscing.
                    </p>

                </div> --}}
                </aside>
            </div>
            <div class="span8">
                <article class="single">
                    <div class="row">

                        <div class="span8">
                            <div class="post-image">
                                <div class="post-heading">
                                    <h3>Selamat Datang Di Website Kecamatan Cilebar</h3>
                                </div>
                                <center>
                                    <img src="{{ asset('Remember/ico/logo.png') }}" height="300" width="300">
                                </center>
                            </div>
                            <div class="meta-post">
                            </div>
                            <p align="justify" font-size=14px>
                                Kecamatan Cilebar berdiri pada tahun2005 berdasarkan Peraturan Daerah No.2 Tahun 2005
                                pemekaran dari tiga kecamatan induk yaitu Kecamatan Pedes, Kecamatan Tempuran dan
                                Kecamatan Rawamerta. Kecamatan Cilebar terdiri memiliki sepuluh desa diantaranya yaitu
                                Desa Kertamukti, Desa, Desa Rawasari, Desa Pusakajaya Selatan, Desa Pusakajaya Utara,
                                Desa Cikande, Desa Kosambibatu, Desa Tanjungsari, Desa Mekarpohaci, Desa Ciptamargi, dan
                                Desa Sukaratu.
                                Kantor Kecamatan Cilebar mempunyai tugas melaksanakan sebagian kewenangan pemerintah
                                kabupaten di wilayah kerjanya, yang mencakup bidang pemerintahan, ekonomi, pembangunan,
                                kesejahteraan rakyat dan pembinaan kehidupan masyarakat serta urusan pelayanan umum
                                lainnya yang diserahkan Bupati. Fungsi dari kantor kecamatan diantaranya yaitu
                                pengorgranisasian penyelenggaraan pemerintah di wilayah kecamatan, pengorganisasian
                                kegiatan pembinaan dan pengembangan perekonomian rakyat dan melaksanakan pemungutan
                                pendapatan daerah sesuai dengan kewenangan yang dilimpahkan, penyelenggaraan pelayanan
                                social kemasyarakatan dan pemberdayaan masyarakat, pembinaan kelurahan, pelaksanaan
                                dukungan administrasi di bidang pendidikan sekolah dasar, pembinaan ketentraman dan
                                ketertiban wilayah kecamatan, pelaksanaan koordinasi, operasional unit pelaksana teknis
                                dinas/badan, dan pelaksanaan fasilitasi kegiatan pembangunan dan pengembangan
                                partisipasi rakyat.
                                Kegiatan pembuatan Kartu Tanda Penduduk (KTP) dibagi menjadi empat jenis yaitu pemula,
                                pendatang, perubahan data, dan hilang. Dari empat jenis pembuatan KTP tersebut terdapat
                                masing-masing persyaratan yang harus dilakukan sesuai dengan kebutuhan jenisnya. Selain
                                itu kantor kecamatan juga melakukan kegiatan untuk masyarakat yang di dalamnya terdapat
                                kerjasama antara pihak atau pegawai kantor kecamatan dengan masyarakat, kegiatan
                                tersebut berdasarkan dari suara atau apresiasi dari warga yang disampaikan kepada camat
                                kemudian diproses hingga dilakukan peresmian acara kegiatan tersebut.
                            </p>
                        </div>
                    </div>
                </article>
                <!-- author info -->


            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="widget">
                        <div class="footer_logo">
                            <h3><a href="{{ route('website') }}"><i><img src="{{asset('Remember/ico/logo.png')}}" alt=""
                                            height="30" width="20"> </i>Kecamatan Cilebar</a></h3>
                        </div>
                        <address>
                            <strong>Kantor Kecamatan Cilebar</strong><br>
                            Jl. Cilebar No.1993, Kertamukti, Cilebar, Kabupaten Karawang<br>
                            Jawa Barat 41353, Indonesia
                        </address>
                        <p>
                            <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
                            <i class="icon-envelope-alt"></i> email@cilebar.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div class="copyright">
                            <p><span>&copy; Remember Inc. All right reserved</span></p>
                        </div>

                    </div>

                    <div class="span6">
                        <div class="credits">
                            <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Remember
                -->
                            Created by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>

    <!-- javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('Remember/js/jquery.js')}}"></script>
    <script src="{{asset('Remember/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('Remember/js/bootstrap.js')}}"></script>
    <script src="{{asset('Remember/js/modernizr.custom.js')}}"></script>
    <script src="{{asset('Remember/js/toucheffects.js')}}"></script>
    <script src="{{asset('Remember/js/google-code-prettify/prettify.js')}}"></script>
    <script src="{{asset('Remember/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('Remember/js/portfolio/jquery.quicksand.js')}}"></script>
    <script src="{{asset('Remember/js/portfolio/setting.js')}}"></script>
    <script src="{{asset('Remember/js/animate.js')}}"></script>

    <!-- Template Custom JavaScript File -->
    <script src="{{asset('Remember/js/custom.js')}}"></script>

</body>

</html>
