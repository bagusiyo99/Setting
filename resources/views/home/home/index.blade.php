{{-- mx-auto d-block : Gambar Ketengah --}}
{{-- float-left: Gambar kekiri --}}
{{-- float-rightk : Gambar ke kanan --}}
{{-- img-fluid :gambar otomatis menyesuaikan --}}

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators ">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
            aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($banner as $key => $item)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="/{{ $item->gambar }}" width="100%" height="700px" alt="">
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev text-success" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next text-success" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>




<section class="fitur" data-aos="fade-down" data-aos-easing="linear" data-aos-offset="200">
    <div class="fe-box">
        <a>
            <img src="img/icon/1.jpg" alt="">
            <h6> Kurikulum </h6>
        </a>
    </div>

    <div class="fe-box">
        <a>
            <img src="img/icon/2.jpg" alt="">
            <h6> Prestasi </h6>
        </a>
    </div>

    <div class="fe-box">
        <a>
            <img src="img/icon/3.jpg" alt="">
            <h6> Akreditasi </h6>
        </a>
    </div>

    <div class="fe-box">
        <a>
            <img src="img/icon/4.jpg" alt="">
            <h6> Daftar</h6>
        </a>
    </div>

    <div class="fe-box">
        <a>
            <img src="img/icon/5.jpg" alt="">
            <h6> Alumni </h6>
        </a>
    </div>

    <div class="fe-box">
        <a>
            <img src="img/icon/6.jpg" alt="">
            <h6> Bantuan </h6>
        </a>
    </div>

</section>


<div class="main mb-5 ">
    <h3 class="heading">SAMBUTAN</h3>
</div>


<section class="info ">
    @foreach ($setting as $item)
        <div class="main-info mt-5">
            <img src="/{{ $item->gambar }}" data-aos="fade-right" data-aos-offset="500" data-aos-easing="ease-in-sine">
            <div class="tulis" data-aos="fade-left" data-aos-offset="500" data-aos-easing="ease-in-sine">
                <h3>Assalamualaikum warahmatullahi wabarakatuh</h3>
                {{-- <h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1> --}}
                <p> {!! $item->deskripsi !!}</p>
    @endforeach


</section>



<section id="ts-features" class="ts-features ">
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-lg-6">
                <div class="ts-intro" data-aos="fade-right" data-aos-offset="500" data-aos-easing="ease-in-sine">
                    <h2 class="into-title">About Us</h2>
                    <h3 class="into-sub-title">We deliver landmark projects</h3>
                    <p>We are rethoric question ran over her cheek When she reached the first hills of the Italic
                        Mountains,
                        she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet
                        Village
                        and the subline of her own road, the Line Lane.</p>
                </div><!-- Intro box end -->


            </div><!-- Col end -->
            <div class="col-lg-6 mt-4 mt-lg-0" data-aos="fade-left" data-aos-offset="500"
                data-aos-easing="ease-in-sine">
                @foreach ($setting as $item)
                    <h3 class="into-sub-title">Visi dan Misi</h3>
                    <p>Berikut ini visi dan misi sekolah kami</p>
                    <div class="accordion accordion-group" id="our-values-accordion">
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Visi
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#our-values-accordion">
                                <div class="card-body">
                                    {{-- {{ 1settings()->get('app_visi') }} --}} {!! $item->visi !!}
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header p-0 bg-transparent" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Misi
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#our-values-accordion">
                                <div class="card-body">
                                    {{-- {{ settings()->get('desc') }} --}} {!! $item->misi !!}
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--/ Accordion end -->
                @endforeach
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section><!-- Feature are end -->


<section id="project-area" class="project-area solid-bg mt-5 ">
    <div class="container">
        {{-- <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">Work of Excellence</h2>
                <h3 class="section-sub-title">Recent Projects</h3>
            </div>
        </div> --}}
        <!--/ Title row end -->

        <div class="row">
            <div class="col-12">
                <div class="shuffle-btn-group">
                    <label class="active" for="all">
                        <input type="radio" name="shuffle-filter" id="all" value="all"
                            checked="checked">Show All
                    </label>
                    <label for="commercial">
                        <input type="radio" name="shuffle-filter" id="commercial" value="commercial">JURUSAN
                    </label>
                    <label for="education">
                        <input type="radio" name="shuffle-filter" id="education" value="education">MINAT BAKAT
                    </label>
                    <label for="government">
                        <input type="radio" name="shuffle-filter" id="government" value="government">GURU
                    </label>
                    <label for="infrastructure">
                        <input type="radio" name="shuffle-filter" id="infrastructure"
                            value="infrastructure">FASILITAS
                    </label>
                    <label for="residential">
                        <input type="radio" name="shuffle-filter" id="residential" value="residential">SEJARAH
                    </label>
                    <label for="healthcare">
                        <input type="radio" name="shuffle-filter" id="healthcare" value="healthcare">LAINNYA
                    </label>
                </div><!-- project filter end -->


                <div class="row shuffle-wrapper">
                    <div class="col-1 shuffle-sizer"></div>

                    <div class="col-lg-4 col-md-6 shuffle-item"
                        data-groups="[&quot;government&quot;,&quot;healthcare&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="images/projects/project1.jpg" aria-label="project-img">
                                <img class="img-fluid" src="images/projects/project1.jpg" alt="project-img">
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">Capital Teltway Building</a>
                                    </h3>
                                    <p class="project-cat">Commercial, Interiors</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 1 end -->

                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;healthcare&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="images/projects/project2.jpg" aria-label="project-img">
                                <img class="img-fluid" src="images/projects/project2.jpg" alt="project-img">
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">Ghum Touch Hospital</a>
                                    </h3>
                                    <p class="project-cat">Healthcare</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 2 end -->

                    <div class="col-lg-4 col-md-6 shuffle-item"
                        data-groups="[&quot;infrastructure&quot;,&quot;commercial&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="images/projects/project3.jpg" aria-label="project-img">
                                <img class="img-fluid" src="images/projects/project3.jpg" alt="project-img">
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">TNT East Facility</a>
                                    </h3>
                                    <p class="project-cat">Government</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 3 end -->

                    <div class="col-lg-4 col-md-6 shuffle-item"
                        data-groups="[&quot;education&quot;,&quot;infrastructure&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="images/projects/project4.jpg" aria-label="project-img">
                                <img class="img-fluid" src="images/projects/project4.jpg" alt="project-img">
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">Narriot Headquarters</a>
                                    </h3>
                                    <p class="project-cat">Infrastructure</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 4 end -->

                    <div class="col-lg-4 col-md-6 shuffle-item"
                        data-groups="[&quot;infrastructure&quot;,&quot;education&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="images/projects/project5.jpg" aria-label="project-img">
                                <img class="img-fluid" src="images/projects/project5.jpg" alt="project-img">
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">Kalas Metrorail</a>
                                    </h3>
                                    <p class="project-cat">Infrastructure</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 5 end -->

                    <div class="col-lg-4 col-md-6 shuffle-item" data-groups="[&quot;residential&quot;]">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="images/projects/project6.jpg" aria-label="project-img">
                                <img class="img-fluid" src="images/projects/project6.jpg" alt="project-img">
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="projects-single.html">Ancraft Avenue House</a>
                                    </h3>
                                    <p class="project-cat">Residential</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 6 end -->
                </div><!-- shuffle end -->
            </div>

            <div class="col-12">
                <div class="general-btn text-center">
                    <a class="btn btn-primary" href="projects.html">View All Projects</a>
                </div>
            </div>

        </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Project area end -->


<div class="main">
    <h3 class="heading">Informasi</h3>
</div>
<main class="container">

    <div class="p-5 p-md-4 mb-5 text-white rounded bg-success" data-aos="fade-down" data-aos-easing="linear"
        data-aos-duration="1500">
        <div>
            <h1 class="display-5 fst-italic">Ayok Daftarkan putra atau putri terbaik anda di pesantren ini dan dapatkan
                diskon pendaftaran pertama</h1>
            <p class="lead my-3">Dapatkan Update Informasi Terbaru hanya di website ini </p>
        </div>
    </div>

    <div class="row mb-2" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="4500">
        @foreach ($blog as $item)
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static masee">
                        <strong class="d-inline-block mb-2 text-success">Informasi Terbaru</strong>
                        <h5 class="mb-2"> {!! Str::limit($item->judul, 40) !!}</h5>
                        <p class="card-text mb-3">{!! Str::limit($item->deskripsi, 130) !!}</p>
                        <a clas="info mt-5 mb-3" href="/blog/{{ $item->id }}">Lanjutkan Membaca</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="/{{ $item->gambar }}">

                    </div>
                </div>

            </div>
        @endforeach

    </div>
</main>
