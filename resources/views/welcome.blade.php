<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ZenBlog Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

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
                  use App\Models\Blog;
                  $categorys = Category::all();
                  $apps = Application::all();
                  $blogs = Blog::all();
                  $no = 1;
              @endphp
              <nav id="navbar" class="navbar">
                  <ul>
                      <li><a href="/">Blog</a></li>
                      <li><a href="{{ url('single') }}">Single Post</a></li>
                      <li class="dropdown"><a href="/list">Categories
                          <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                          <ul>
                              @foreach ($categorys as $category)
                              <li><a href="#{{ $category->kategori }}">{{ $category->kategori }}</a></li>
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

        <!-- ======= Hero Slider Section ======= -->
        <section id="hero-slider" class="hero-slider">
            <div class="container-md" data-aos="fade-in">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper sliderFeaturedPosts">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="single-post.html" class="img-bg d-flex align-items-end"
                                        style="background-image: url('assets/img/post-slide-1.jpg');">
                                        <div class="img-bg-inner">
                                            <h2>The Best Homemade Masks for Face (keep the Pimples Away)</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque
                                                est mollitia! Beatae minima assumenda repellat harum vero, officiis
                                                ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                                necessitatibus rem atque.</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="swiper-slide">
                                    <a href="single-post.html" class="img-bg d-flex align-items-end"
                                        style="background-image: url('assets/img/post-slide-2.jpg');">
                                        <div class="img-bg-inner">
                                            <h2>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New
                                                Haircut</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque
                                                est mollitia! Beatae minima assumenda repellat harum vero, officiis
                                                ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                                necessitatibus rem atque.</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="swiper-slide">
                                    <a href="single-post.html" class="img-bg d-flex align-items-end"
                                        style="background-image: url('assets/img/post-slide-3.jpg');">
                                        <div class="img-bg-inner">
                                            <h2>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque
                                                est mollitia! Beatae minima assumenda repellat harum vero, officiis
                                                ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                                necessitatibus rem atque.</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="swiper-slide">
                                    <a href="single-post.html" class="img-bg d-flex align-items-end"
                                        style="background-image: url('assets/img/post-slide-4.jpg');">
                                        <div class="img-bg-inner">
                                            <h2>9 Half-up/half-down Hairstyles for Long and Medium Hair</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque
                                                est mollitia! Beatae minima assumenda repellat harum vero, officiis
                                                ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                                necessitatibus rem atque.</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="custom-swiper-button-next">
                                <span class="bi-chevron-right"></span>
                            </div>
                            <div class="custom-swiper-button-prev">
                                <span class="bi-chevron-left"></span>
                            </div>

                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Hero Slider Section -->

        <!-- ======= Post Grid Section ======= -->
        <section id="posts" class="posts">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    <div class="col-lg-12">

                        <div class="row g-5">
                            @php
                                // Ambil semua kategori yang unik dari $blogs
                                $uniqueCategories = $blogs->unique('category_id');
                            @endphp

                                @foreach ($uniqueCategories as $category)
                                    <div class="col-lg-4 border-start custom-border">
                                    @php
                                        // Ambil satu blog pertama dari kategori saat ini
                                        $blog = $blogs->where('category_id', $category->category_id)->first();
                                    @endphp

                                    <div class="post-entry-1">
                                        <a href="single-post.html">
                                            <img src="{{ asset('storage/blog/'. $blog->foto) }}" alt="" style="width: 70%">
                                        </a>
                                        <div class="post-meta">
                                            <span class="date">{{ $blog->category->kategori }}</span>
                                            <span class="mx-1">&bullet;</span>
                                            <span>{{ \Carbon\Carbon::parse($blog->tanggal_upload)->format('d/m/Y') }}</span>
                                        </div>
                                        <h2>
                                            <a href="single-post.html">{{ Str::limit($blog->judul, 100, '...') }}</a>
                                        </h2>
                                        <p>{{ Str::limit($blog->deskripsi, 250, '...') }}</p>
                                    </div>
                                </div>
                                @endforeach

                            <!-- Trending Section -->
                            {{-- <div class="col-lg-2">

                                <div class="trending">
                                    <h3>Trending</h3>
                                    <ul class="trending-post">
                                        @foreach ($blogs as $blog)
                                        @if ($blog->nama_uploader === 'fahmi@2')
                                        <li>
                                            <a href="single-post.html">
                                                <span class="number">{{ $no++ }}</span>
                                                <h3>{{ $blog->judul }}</h3>
                                                <span class="author">{{ $blog->nama_uploader }}</span>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>

                            </div> <!-- End Trending Section --> --}}
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>
        </section> <!-- End Post Grid Section -->

        <!-- ======= Culture Category Section ======= -->
        <section class="category-section">

            <div class="container" data-aos="fade-up">
                <div class="row">
                    @php
                        $uniqueCategories = $blogs->unique('category_id');
                    @endphp

                    @foreach ($uniqueCategories as $categoryBlog)
                        @php
                            $category = $categoryBlog->category;
                            $blogsToShow = $blogs->where('category_id', $category->id)->take(2);
                        @endphp

                        <div class="section-header d-flex justify-content-between align-items-center mb-5">
                            <h2 id="{{ $category->kategori }}">{{ $category->kategori }}</h2>
                            <div><a href="#" class="more">See All {{ $category->kategori }}</a></div>
                        </div>

                        <div class="col-xl-9">
                            @foreach ($blogsToShow as $blog)
                                <div class="post-entry-1">
                                    <a href="single-post.html">
                                        <img src="{{ asset('storage/blog/'. $blog->foto) }}" alt="" class="rounded mx-auto d-block" style="width: 60%">
                                    </a>
                                    <div class="post-meta">
                                        <span class="date">{{ $category->kategori }}</span>
                                        <span class="mx-1">&bullet;</span>
                                        <span>{{ \Carbon\Carbon::parse($blog->tanggal_upload)->format('d/m/Y') }}</span>
                                    </div>
                                    <h2 class="mb-2"><a href="single-post.html">{{ $blog->judul }}</a></h2>
                                    <span class="author mb-3 d-block">{{ $blog->nama_uploader }}</span>
                                    <p class="mb-4 d-block">{{ $blog->deskripsi }}</p>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-3">
                            <div class="category-section">
                                <h3>{{ $category->kategori }}</h3>
                                @foreach ($blogs->where('category_id', $category->id) as $blog)
                                    <div class="post-entry-1 border-bottom">
                                        <div class="post-meta">
                                            <span class="date">{{ $category->kategori }}</span>
                                            <span class="mx-1">&bullet;</span>
                                            <span>{{ \Carbon\Carbon::parse($blog->tanggal_upload)->format('d/m/Y') }}</span>
                                        </div>
                                        <h2 class="mb-2"><a href="single-post.html">{{ $blog->judul }}</a></h2>
                                        <span class="author mb-3 d-block">{{ $blog->nama_uploader }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Culture Category Section -->

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
