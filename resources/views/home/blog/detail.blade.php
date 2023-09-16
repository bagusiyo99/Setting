   <div>
       <img src="/img/sd.jpg" width="100%" class="img-fluid mb-5" alt="...">
   </div>

   {{-- <div class="main">
    <h3 class="heading">{{ $blog->judul }}</h3>
    <p>{{ $blog->created_at->format('d-F-Y ') }}</p>


    <div class="detail-tentang">
        <img src="/{{ $blog->gambar }}" width="500px" height="400px">
    </div>
</div>

<div class="huruf">
    <p>{!! $blog->deskripsi !!}</p>
</div> --}}


   <section id="main-container" class="main-container">
       <div class="container">
           <div class="row">

               <div class="col-lg-8 mb-5 mb-lg-0">

                   <div class="post-content post-single">
                       <div class="post-media post-image">
                           <img loading="lazy" src="/{{ $blog->gambar }}" class="img-fluid" alt="post-image">
                       </div>

                       <div class="post-body">
                           <div class="entry-header">
                               <div class="post-meta">
                                   <span class="post-author">
                                       <i class="far fa-user"></i><a href="#"> Admin</a>
                                   </span>
                                   {{-- <span class="post-cat">
                                       <i class="far fa-folder-open"></i><a href="#"> News</a>
                                   </span> --}}
                                   <span class="post-meta-date"><i class="far fa-calendar"></i>
                                       {{ $blog->created_at->format('d-m-Y ') }}</span>
                                   <span class="post-comment"><i class="far fa-comment"></i> {{ $jumlahKomentar }} <a
                                           href="#" class="comments-link">Komentar</a></span>
                               </div>
                               <h2 class="entry-title">
                                   {{ $blog->judul }}
                               </h2>
                           </div><!-- header end -->

                           <div class="entry-content">
                               <p>{!! $blog->deskripsi !!}</p>
                           </div>

                           <div class="tags-area d-flex align-items-center justify-content-between">
                               <div class="post-tags">
                                   <a href="#">Prestasi</a>
                                   <a href="#">Alumni</a>
                                   <a href="#">Guru</a>
                               </div>
                               <div class="share-items">
                                   <ul class="post-social-icons list-unstyled">
                                       <li class="social-icons-head">Share:</li>
                                       <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                       <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                       {{-- <li><a href="#"><i class="fab fa-brands fa-tiktok"></i></a></li> --}}
                                       <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                   </ul>
                               </div>
                           </div>

                       </div><!-- post-body end -->
                   </div><!-- post content end -->

                   {{-- <div class="author-box d-nlock d-sm-flex">
                    <div class="author-img mb-4 mb-md-0">
                        <img loading="lazy" src="images/news/avator1.png" alt="author">
                    </div>
                    <div class="author-info">
                        <h3>Elton Themen<span>Site Engineer</span></h3>
                        <p class="mb-2">Lisicing elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim
                            ad vene minim
                            veniam, quis nostrud exercitation nisi ex ea commodo.</p>
                        <p class="author-url mb-0">Website: <span><a href="#">http://www.example.com</a></span>
                        </p>

                    </div>
                </div> <!-- Author box end --> --}}
                   <!-- Post comment start -->
                   <div id="comments" class="comments-area">
                       <h3 class="comments-heading">{{ $jumlahKomentar }} Komentar</h3>

                       <ul class="comments-list">
                           {{-- @if ($komen !== null)
                            @foreach ($komen as $komentar)
                                <li>
                                    <div class="comment d-flex">
                                        <div class="comment-body">
                                            <div class="meta-data">
                                                <span class="comment-author mr-3">{{ $komentar->nama }}</span>
                                                <span
                                                    class="comment-date float-right">{{ $komentar->created_at->format('d-m-Y H:i:s') }}</span>
                                            </div>
                                            <div class="comment-content">
                                                <p>{{ $komentar->isi }}</p>
                                            </div>
                                        </div>
                                    </div><!-- Comments end -->
                                </li>
                            @endforeach
                        @else
                            <li>No comments available.</li>
                        @endif --}}
                           <li>
                               @if ($komen !== null)
                                   @foreach ($komen as $komentar)
                                       <div class="comment d-flex last border-bottom mb-3 mt-4">
                                           <img class="comment-avatar mb-5  " alt="author" src="/img/user.png"
                                               height="200px">
                                           <div class="comment-body">
                                               <p class="comment-date">{{ $komentar->created_at->format('d M Y ') }}
                                               </p>
                                               <div class="meta-data">

                                                   <span
                                                       class="comment-author mr-3 text-capitalize">{{ $komentar->nama }}</span>

                                               </div>
                                               <div class="comment-content text-capitalize">
                                                   <p>{{ $komentar->isi }}</p>
                                               </div>
                                               {{-- <div class="text-left">
                                                <a class="comment-reply font-weight-bold" href="#">Reply</a>
                                            </div> --}}
                                           </div>
                                       </div><!-- Comments end -->
                                   @endforeach
                               @else
                           <li>No comments available.</li>
                           @endif
                           </li><!-- Comments-list li end -->

                       </ul><!-- Comments-list ul end -->
                   </div><!-- Post comment end -->


                   <div class="comments-form border-box mb-5">
                       <h3 class="title-normal">Tambahkan Komentar</h3>

                       <form action="{{ route('komentar.send') }}" method="POST">

                           @csrf

                           <div class="form-group col-sm-8">
                               <label for="nama">Nama Lengkap</label>
                               <input type="text" name="nama" id="nama" class="form-control " required>
                           </div>

                           <label for="isi" class="mb-1 mt-2 text-capitalize"> komentar</label>
                           <div class="form-group col-sm-6">

                               <textarea name="isi" id="isi" class=" blog-area " cols="66" rows="3" required></textarea>
                           </div>

                           <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                           <!-- Assuming you want to associate comments with a specific blog -->

                           <button type="submit" class="btn btn-primary">Tambahkan komentar</button>
                       </form>
                   </div><!-- Comments form end -->
               </div><!-- Content Col end -->

               <div class="col-lg-4">

                   <div class="sidebar sidebar-right">
                       <div class="widget recent-posts">
                           <h3 class="widget-title">Postingan Terbaru</h3>
                           <ul class="list-unstyled">
                               @foreach ($recentBlogs as $recentBlog)
                                   <li class="d-flex align-items-center">
                                       <div class="posts-thumb">
                                           <a href="#"><img loading="lazy" alt="img"
                                                   src="/{{ $recentBlog->gambar }}"></a>
                                       </div>
                                       <div class="post-info">
                                           <h4 class="entry-title">
                                               <a
                                                   href="{{ route('blog.detail', ['id' => $recentBlog->id]) }}">{{ $recentBlog->judul }}</a>
                                           </h4>
                                       </div>
                                   </li><!-- Recent post item end -->
                               @endforeach

                           </ul>

                       </div><!-- Recent post end -->

                       {{-- <div class="widget">
                        <h3 class="widget-title">Categories</h3>
                        <ul class="arrow nav nav-tabs">
                            <li><a href="#">Construction</a></li>
                            <li><a href="#">Commercial</a></li>
                            <li><a href="#">Building</a></li>
                            <li><a href="#">Safety</a></li>
                            <li><a href="#">Structure</a></li>
                        </ul>
                    </div><!-- Categories end --> --}}

                       <div class="widget">
                           <h3 class="widget-title">Pencapaian </h3>
                           <ul class="arrow nav nav-tabs">
                               <li><a href="#"> 2019</a></li>
                               <li><a href="#"> 2020</a></li>
                               <li><a href="#"> 2021</a></li>
                               <li><a href="#"> 2022</a></li>
                               <li><a href="#"> 2023</a></li>
                           </ul>
                       </div><!-- Archives end -->

                       <div class="widget widget-tags">
                           <h3 class="widget-title">Tags </h3>

                           <ul class="list-unstyled">
                               <li><a href="#">Daftar</a></li>
                               <li><a href="#">Foto</a></li>
                               <li><a href="#">Guru</a></li>
                               <li><a href="#">Jurusan</a></li>
                               <li><a href="#">Alumni</a></li>
                               <li><a href="#">Prestasi</a></li>
                               {{-- <li><a href="#">Contracting</a></li>
                            <li><a href="#">Planning</a></li> --}}
                           </ul>
                       </div><!-- Tags end -->


                   </div><!-- Sidebar end -->
               </div><!-- Sidebar Col end -->

           </div><!-- Main row end -->

       </div><!-- Conatiner end -->
   </section><!-- Main container end -->
