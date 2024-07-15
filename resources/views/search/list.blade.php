<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ZenBlog Bootstrap Template - Single Post</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="/" class="logo d-flex align-items-center">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <!-- <img src="assets/img/logo.png" alt=""> -->
              <h1>FahmyBlog</h1>
          </a>

            @php
                use App\Models\Category;
                use App\Models\Application;
                $categorys = Category::all();
                $apps = Application::all();
            @endphp
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/">Blog</a></li>
                    <li><a href="{{ url('single') }}">Single Post</a></li>
                    <li class="dropdown"><a href="/list">Categories
                        <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            @foreach ($categorys as $category)
                            <li><a href="{{ $category->kategori }}">{{ $category->kategori }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ url('abouth') }}">About</a></li>
                </ul>
            </nav><!-- .navbar -->

          <div class="position-relative">
              <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
              <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
              <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

              <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
              <i class="bi bi-list mobile-nav-toggle"></i>

              <!-- ======= Search Form ======= -->
              <div class="search-form-wrap js-search-form-wrap">
                  <form action="search-result.html" class="search-form">
                      <span class="icon bi-search"></span>
                      <input type="text" placeholder="Search" class="form-control">
                      <button class="btn js-search-close"><span class="bi-x"></span></button>
                  </form>
              </div><!-- End Search Form -->

          </div>

      </div>

  </header><!-- End Header -->

  <main id="main">

    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" data-aos="fade-up">

            <section class="blog-list px-3 py-5 p-md-5">
                <div class="container">
                    @foreach ($apps as $app)
                    <div class="item mb-5">
                        <div class="media">
                            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{ asset('storage/app/'. $app->foto) }}" alt="image" class="img-fluid" width="300">
                            <div class="media-body">
                                <h3 class="title mb-1">
                                    <a href="adobephotoshop.html">{{ $app->judul }}</a>
                                </h3>
                                <div class="meta mb-1">
                                    <span class="date">Published {{ \Carbon\Carbon::parse($app->tanggal_upload)->format('d/m/Y') }}</span>
                                    <span class="time"> By: {{ $app->nama }}</span>
                                    {{-- <span class="comment">
                                    <a href="#">8 comments</a>
                                    </span> --}}
                                </div>
                                <div class="intro" style="justify; text-justify: inter-word;">{{ $app->deskripsi }}</div>
                                <a class="more-link" href="{{ $app->link_download }}"><button class="btn btn-info">Download</button></a>
                            </div><!--//media-body-->
                        </div><!--//media-->
                    </div><!--//item-->
                    @endforeach

                    {{-- <div class="item mb-5">
                        <div class="media">
                            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/mozila.jpg" alt="image">
                            <div class="media-body">
                                <h3 class="title mb-1"><a href="mozilafirefox.html">Mozilla Firefox 103.0.2 Offline Installer Terbaru</a></h3>
                                <div class="meta mb-1"><span class="date">Published 3 months ago</span><span class="time">3 min read</span><span class="comment"><a href="#">26 comments</a></span></div>
                                <div class="intro">Mozilla Firefox 103.0.2 Offline Installer Terbaru merupkan versi terbaru dan paling stabil dari mozilla firefox yang mana kini dengan engine Quantum yang di klaim 2 kali lebih cepat dan 30 persen penggunaan RAM lebih rendah dari...</div>
                                <a class="more-link" href="mozilafirefox.html">Read more &rarr;</a>
                            </div><!--//media-body-->
                        </div><!--//media-->
                    </div><!--//item-->

                    <div class="item mb-5">
                        <div class="media">
                            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/msoffice.png" alt="image">
                            <div class="media-body">
                                <h3 class="title mb-1"><a href="msoffice.html">Microsoft Office 2016 Pro Plus x86/x64 Full Version</a></h3>
                                <div class="meta mb-1"><span class="date">Published 1 month ago</span><span class="time">8 min read</span><span class="comment"><a href="#">12 comments</a></span></div>
                                <div class="intro">Dikutip dari Wikipedia, Microsoft Office 2016 Pro Plus rillis final version 22 September 2015.. -Hmm. Menarik nih, software kantor yang paling populer di dunia besutan dari Microsoft ini dibuat berdasarkan Style Windows 10 tersebut kini semakin canggih. Setelah kita mendengar atau bahkan mendapatkan...</div>
                                <a class="more-link" href="msoffice.html">Read more &rarr;</a>
                            </div><!--//media-body-->
                        </div><!--//media-->
                    </div><!--//item-->
                    <div class="item mb-5">
                        <div class="media">
                            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/wondershare.png" alt="image">
                            <div class="media-body">
                                <h3 class="title mb-1"><a href="wondershare.html">Wondershare TunesGo 9.8.3.47 Full</a></h3>
                                <div class="meta mb-1"><span class="date">Published 2 months ago</span><span class="time">15 min read</span><span class="comment"><a href="#">3 comments</a></span></div>
                                <div class="intro">Wondershare TunesGo 9.8.3.47 Full Terbaru merupakan sebuah software management file phone baik itu untuk pengguna iOS ( iphone, ipad ) ataupun...</div>
                                <a class="more-link" href="wondershare.html">Read more &rarr;</a>
                            </div><!--//media-body-->
                        </div><!--//media-->
                    </div><!--//item-->

                    <div class="item mb-5">
                        <div class="media">
                            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/adobeilustrator.png" alt="image">
                            <div class="media-body">
                                <h3 class="title mb-1"><a href="adobeilustrator.html">Adobe Illustrator CS5 Full Version</a></h3>
                                <div class="meta mb-1"><span class="date">Published 2 months ago</span><span class="time">10 min read</span><span class="comment"><a href="#">23 comments</a></span></div>
                                <div class="intro">Adobe Illustrator CS5 Full Version merupakan software untuk membuat gambar dari product adobe
                                    yang sangat terkenal. apabila...</div>
                                <a class="more-link" href="adobeilustrator.html">Read more &rarr;</a>
                            </div><!--//media-body-->
                        </div><!--//media-->
                    </div><!--//item-->

                    <div class="item">
                        <div class="media">
                            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="assets/images/blog/idm.jpg" alt="image">
                            <div class="media-body">
                                <h3 class="title mb-1"><a href="blog-post.html">Internet Download Manager 6.42 Build 10 Full Terbaru</a></h3>
                                <div class="meta mb-1"><span class="date">Published 3 months ago</span><span class="time">2 min read</span><span class="comment"><a href="#">1 comment</a></span></div>
                                <div class="intro">Download IDM Full Crack atau Internet Download Manager 6.42 Build 10 Terbaru merupakan software untuk download file, video ataupun lainya yang sangat populer di dunia. walapun banyak software sejenis yang baru bermunculan, namun...</div>
                                <a class="more-link" href="blog-post.html">Read more &rarr;</a>
                            </div><!--//media-body-->
                        </div><!--//media-->
                    </div><!--//item--> --}}

                    <nav class="blog-nav nav nav-justified my-5">
                      <a class="nav-link-prev nav-item nav-link d-none rounded-left" href="#">Previous<i class="arrow-prev fas fa-long-arrow-alt-left"></i></a>
                      <a class="nav-link-next nav-item nav-link rounded" href="blog-list.html">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
                    </nav>

                </div>
            </section>

            <!-- ======= Comments ======= -->
            <div class="comments">
              <h5 class="comment-title py-4">2 Comments</h5>
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="assets/img/person-5.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2">Jordan Singer</h6>
                    <span class="text-muted">2d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non minima ipsum at amet doloremque qui magni, placeat deserunt pariatur itaque laudantium impedit aliquam eligendi repellendus excepturi quibusdam nobis esse accusantium.
                  </div>

                  <div class="comment-replies bg-light p-3 mt-3 rounded">
                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                    <div class="reply d-flex mb-4">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">Brandon Smith</h6>
                          <span class="text-muted">2d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                    <div class="reply d-flex">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">James Parsons</h6>
                          <span class="text-muted">1d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente, praesentium.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comment d-flex">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="assets/img/person-2.jpg" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-shrink-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex">
                    <h6 class="me-2">Santiago Roberts</h6>
                    <span class="text-muted">4d</span>
                  </div>
                  <div class="comment-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum in corrupti dolorum, quas delectus nobis porro accusantium molestias sequi.
                  </div>
                </div>
              </div>
            </div><!-- End Comments -->

            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">

              <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label for="comment-name">Name</label>
                    <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label for="comment-email">Email</label>
                    <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
                  </div>
                  <div class="col-12 mb-3">
                    <label for="comment-message">Message</label>

                    <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
                  </div>
                  <div class="col-12">
                    <input type="submit" class="btn btn-primary" value="Post comment">
                  </div>
                </div>
              </div>
            </div><!-- End Comments Form -->

          </div>
          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">

              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Popular</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Trending</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest" type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">

                <!-- Popular -->
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                    @foreach ($apps as $app)
                    @if ($app->nama === 'fahmi@1')
                        <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $app->category->kategori }}</span>
                            <span class="mx-1">&bullet;</span>
                            <span>{{ \Carbon\Carbon::parse($app->tanggal_upload)->format('d/m/Y') }}</span>
                        </div>
                            <h2 class="mb-2">
                                <a href="">{{ Str::limit($app->deskripsi, 300, '...') }}</a>
                            </h2>
                            <span class="author mb-3 d-block">{{ $app->nama }}</span>
                        </div>
                    @endif
                    @endforeach
                </div> <!-- End Popular -->

                <!-- Trending -->
                <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                    @foreach ($apps as $app)
                    @if ($app->nama === 'fahmi@2')
                        <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $app->category->kategori }}</span>
                            <span class="mx-1">&bullet;</span>
                            <span>{{ \Carbon\Carbon::parse($app->tanggal_upload)->format('d/m/Y') }}</span>
                        </div>
                            <h2 class="mb-2">
                                <a href="">{{ Str::limit($app->deskripsi, 300, '...') }}</a>
                            </h2>
                            <span class="author mb-3 d-block">{{ $app->nama }}</span>
                        </div>
                    @endif
                    @endforeach
                </div> <!-- End Trending -->

                <!-- Latest -->
                <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab">
                    @foreach ($apps as $app)
                    @if ($app->nama === 'fahmi@3')
                        <div class="post-entry-1 border-bottom">
                        <div class="post-meta"><span class="date">{{ $app->category->kategori }}</span>
                            <span class="mx-1">&bullet;</span>
                            <span>{{ \Carbon\Carbon::parse($app->tanggal_upload)->format('d/m/Y') }}</span>
                        </div>
                            <h2 class="mb-2">
                                <a href="">{{ Str::limit($app->deskripsi, 300, '...') }}</a>
                            </h2>
                            <span class="author mb-3 d-block">{{ $app->nama }}</span>
                        </div>
                    @endif
                    @endforeach

                </div> <!-- End Latest -->

              </div>
            </div>

            <div class="aside-block">
              <h3 class="aside-title">Video</h3>
              <div class="video-post">
                <a href="https://www.youtube.com/watch?v=AiFfDjmd0jU" class="glightbox link-video">
                  <span class="bi-play-fill"></span>
                  <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
                </a>
              </div>
            </div><!-- End Video -->

            <div class="aside-block">
              <h3 class="aside-title">Categories</h3>
              <ul class="aside-links list-unstyled">
                @foreach ($categorys as $category)
                <li><a href="#{{ $category->kategori }}"><i class="bi bi-chevron-right"></i>{{ $category->kategori }}</a></li>
                @endforeach
              </ul>
            </div><!-- End Categories -->

            <div class="aside-block">
              <h3 class="aside-title">Tags</h3>
              <ul class="aside-tags list-unstyled">
                @foreach ($categorys as $category)
                <li><a href="#{{ $category->kategori }}">{{ $category->kategori }}</a></li>
                @endforeach
              </ul>
            </div><!-- End Tags -->

          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">Tentang FahmyBlog</h3>
                        <p>Blog website ini khusus untuk penyedia software gratis, sekaligus menyediakan tutorial penginstalan untuk mempermudah pengguna untuk memasang software</p>
                        <p><a href="about.html" class="footer-link-more">Learn More</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="/"><i class="bi bi-chevron-right"></i> Blog</a></li>
              <li><a href="/single"><i class="bi bi-chevron-right"></i> Single Post</a></li>
              <li><a href="/list"><i class="bi bi-chevron-right"></i> Categories</a></li>
              <li><a href="/abouth"><i class="bi bi-chevron-right"></i> About us</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Categories</h3>
            <ul class="footer-links list-unstyled">
                @foreach ($categorys as $category)
                <li><a href="#{{ $category->kategori }}"><i class="bi bi-chevron-right"></i> {{ $category->kategori }}</a></li>
                @endforeach
            </ul>
          </div>

          <div class="col-lg-4">
            <h3 class="footer-heading">Recent Posts</h3>

            <ul class="footer-links footer-blog-entry list-unstyled">
              <li>
                <a href="single-post.html" class="d-flex align-items-center">
                  <img src="assets/img/post-sq-1.jpg" alt="" class="img-fluid me-3">
                  <div>
                    <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <span>5 Great Startup Tips for Female Founders</span>
                  </div>
                </a>
              </li>

              <li>
                <a href="single-post.html" class="d-flex align-items-center">
                  <img src="assets/img/post-sq-2.jpg" alt="" class="img-fluid me-3">
                  <div>
                    <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <span>What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</span>
                  </div>
                </a>
              </li>

              <li>
                <a href="single-post.html" class="d-flex align-items-center">
                  <img src="assets/img/post-sq-3.jpg" alt="" class="img-fluid me-3">
                  <div>
                    <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <span>Life Insurance And Pregnancy: A Working Mom’s Guide</span>
                  </div>
                </a>
              </li>

              <li>
                <a href="single-post.html" class="d-flex align-items-center">
                  <img src="assets/img/post-sq-4.jpg" alt="" class="img-fluid me-3">
                  <div>
                    <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <span>How to Avoid Distraction and Stay Focused During Video Calls?</span>
                  </div>
                </a>
              </li>

            </ul>

          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
            </div>

            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>

          </div>

          <div class="col-md-6">
            <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

          </div>

        </div>

      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
