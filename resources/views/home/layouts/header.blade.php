<style>
    .active {
        color: rgb(141, 31, 220);
    }
</style>

<div id="top-bar" class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i>
                        <p class="info-text">Bandar Lampung, Indonesia</p>
                    </li>
                </ul>
            </div>
            <!--/ Top info end -->

            <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                        <a title="Facebook" href="https://facebbok.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                        </a>
                        <a title="Twitter" href="https://twitter.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-twitter"></i></span>
                        </a>
                        <a title="Instagram" href="https://instagram.com/themefisher.com">
                            <span class="social-icon"><i class="fab fa-instagram"></i></span>
                        </a>
                        <a title="Linkdin" href="https://github.com/themefisher.com">
                            <span class="social-icon"><i class=" fa fa-whatsapp"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
            <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</div>
<!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
    <div class="bg-white">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                        <a class="d-block" href="index.html">
                            <img loading="lazy" src="/{{ settings()->get('foto') }}" alt="Constra">
                        </a>
                    </div><!-- logo end -->

                    <div class="col-lg-9 header-right">
                        <ul class="top-info-box">
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Kontak</p>
                                        <p class="info-box-subtitle">08xxxxxx</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Email </p>
                                        <p class="info-box-subtitle">projectyai.com</p>
                                    </div>
                                </div>
                            </li>
                            <li class="last">
                                <div class="info-box last">
                                    <div class="info-box-content">
                                        <p class="info-box-title">Sertifikat</p>
                                        <p class="info-box-subtitle">0000xxx</p>
                                    </div>
                                </div>
                            </li>
                            <li class="header-get-a-quote">
                                <a class="btn btn-primary" href="/pendaftaran">Daftar Sekarang</a>
                            </li>
                        </ul><!-- Ul end -->
                    </div><!-- header right end -->
                </div><!-- logo area end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </div>



    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg shadow-none">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <img class="navbar-toggler-icon" src="/LOGO/menu.png">

                        </button>

                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="nav navbar-nav mr-auto">


                                <li class="nav-item"> <a class="nav-link  {{ Request::is('menu') ? 'active' : '' }}"
                                        href="/">Menu</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link  {{ Request::is('blog') ? 'active' : '' }}"
                                        href="/blog" id="search">Artikel</a>
                                </li>

                                <li class="nav-item"> <a class="nav-link  {{ Request::is('jasa') ? 'active' : '' }}"
                                        href="/jasa">Jasa</a>
                                </li>

                                <li class="nav-item"> <a
                                        class="nav-link  {{ Request::is('portofolio') ? 'active' : '' }}"
                                        href="/portofolio">Portofolio</a>
                                </li>


                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kontak
                                        <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li> <a href="/pemesanan" class="dropdown-item">Kirim Pesan</a>
                                        </li>
                                        <li><a href="/alamat" class="dropdown-item">Alamat</a></li>
                                    </ul>
                                </li>






                            </ul>
                        </div>
                    </nav>
                </div>
                <!--/ Col end -->
            </div>
            <!--/ Row end -->

            <div class="nav-search">
                <span id="search" class="search-icon"><i class="fa fa-search"></i></span>
            </div><!-- Search end -->

            <div class="search-block" style="display: none;">
                <form action="{{ route('blog.search') }}" method="GET">
                    <label for="q" class="w-100 mb-0">
                        <input type="text" name="query" id="q" placeholder="Pencarian...">

                    </label>
                    <span class="search-close">&times;</span>
                    <button type="submit">Cari</button> <!-- Tombol submit untuk memulai pencarian -->
                </form>
            </div><!-- Site search end -->



        </div>
        <!--/ Container end -->

    </div>
    <!--/ Navigation end -->
</header>
<!--/ Header end -->
