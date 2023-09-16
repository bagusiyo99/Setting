<div>
    <img src="/img/sd.jpg" width="100%" class="img-fluid" alt="...">
</div>


{{-- <div class="main">
    <h3 class="heading">{{ isset($title) ? $title : '' }}</h3>
</div>
<div class="atur ">
    @foreach ($jurusan as $item)
        <div class="card-jurusan" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="4500">
            <div class="card-image">
                <a href="#">
                    <img src="/{{ $item->gambar }}">
                </a>
            </div>
            <div class="card-description">
                <p> {!! Str::limit($item->judul, 25) !!} </p>
                <p>{!! Str::limit($item->deskripsi, 50) !!}</p>
                <a href="/show/{{ $item->id }}">Detail</a>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-center mt-5 mb-5">
    <!-- Add pagination links here if needed -->
    {{ $jurusan->links() }}
</div> --}}

<section id="main-container" class="main-container mt-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 order-1 order-lg-0">

                <div class="sidebar sidebar-left">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul class="list-unstyled">
                            @foreach ($recentJurusan as $recentJurusan)
                                <li class="d-flex align-items-center">
                                    <div class="posts-thumb">
                                        <a href="#"><img loading="lazy" alt="img"
                                                src="/{{ $recentJurusan->gambar }}"></a>
                                    </div>
                                    <div class="post-info">
                                        <h4 class="entry-title">
                                            <a
                                                href="{{ route('jurusan.detail', ['id' => $recentJurusan->id]) }}">{{ $recentJurusan->judul }}</a>
                                        </h4>
                                    </div>
                                </li><!-- Recent post item end -->
                            @endforeach



                        </ul>

                    </div><!-- Recent post end -->

                    <div class="widget">
                        <h3 class="widget-title">Kategori</h3>
                        <ul class="arrow nav nav-tabs">
                            <li><a href="#">Pendaftaran</a></li>
                            <li><a href="#">Guru</a></li>
                            <li><a href="#">Artikel</a></li>
                            <li><a href="#">Galeri</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </div><!-- Categories end -->

                    <div class="widget">
                        <h3 class="widget-title">Pencapaian </h3>
                        <ul class="arrow nav nav-tabs">
                            <li><a href="#">Feburay 2016</a></li>
                            <li><a href="#">January 2016</a></li>
                            <li><a href="#">December 2015</a></li>
                            <li><a href="#">November 2015</a></li>
                            <li><a href="#">October 2015</a></li>
                        </ul>
                    </div><!-- Archives end -->

                    {{-- <div class="widget widget-tags">
                        <h3 class="widget-title">Tags </h3>

                        <ul class="list-unstyled">
                            <li><a href="#">Construction</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Project</a></li>
                            <li><a href="#">Building</a></li>
                            <li><a href="#">Finance</a></li>
                            <li><a href="#">Safety</a></li>
                            <li><a href="#">Contracting</a></li>
                            <li><a href="#">Planning</a></li>
                        </ul>
                    </div><!-- Tags end --> --}}


                </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->

            <div class="col-lg-8 mb-5 mb-lg-0 order-0 order-lg-1">
                <div class="post">
                    @foreach ($jurusan as $item)
                        <div class="post-media post-image">
                            <img loading="lazy" src="/{{ $item->gambar }}" class="img-fluid" alt="post-image">
                        </div>

                        <div class="post-body">
                            <div class="entry-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i><a href="#"> Admin</a>
                                    </span>
                                    <span class="post-cat">
                                        <i class="far fa-folder-open"></i><a href="#"> News</a>
                                    </span>
                                    <span class="post-meta-date"><i class="far fa-calendar"></i>
                                        {{ $item->created_at->format('d-m-Y ') }}</span>
                                    {{-- <span class="post-comment"><i class="far fa-comment"></i> 03<a href="#"
                                            class="comments-link">Comments</a></span> --}}
                                </div>
                                <h2 class="entry-title">
                                    <a href="news-single.html">{!! Str::limit($item->judul, 25) !!}</a>
                                </h2>
                            </div><!-- header end -->

                            <div class="entry-content">
                                <p>{!! Str::limit($item->deskripsi, 50) !!}</p>
                            </div>

                            <div class="post-footer mb-4">
                                <a href="/jurusan/{{ $item->id }}" class="btn btn-primary">Continue Reading</a>
                            </div>

                        </div><!-- post-body end -->
                    @endforeach
                </div><!-- 1st post end -->


                <nav class="paging" aria-label="Page navigation example">
                    <ul class="pagination">
                        {{ $jurusan->links() }}
                    </ul>
                </nav>

            </div><!-- Content Col end -->

        </div><!-- Main row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->
