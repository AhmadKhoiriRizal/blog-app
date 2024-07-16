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

                <!-- Latest -->
                <div class="tab-pane fade" id="pills-{{ $category->kategori }}" role="tabpanel" aria-labelledby="pills-{{ $category->kategori }}-tab">
                @php
    // Mengelompokkan aplikasi berdasarkan kategori
    $appsByCategory = $apps->groupBy('kategori');
@endphp

@foreach ($appsByCategory as $kategori => $apps)
    <div class="category-group mb-4">
        <h2 class="category-title">{{ $kategori }}</h2>

        @foreach ($apps as $app)
            <div class="collapse item mb-5" id="collapseExample-{{ $app->category->kategori }}">
                <div class="media">
                    <h3 class="title mb-1">
                        <a href="">{{ $app->category->kategori }}</a>
                    </h3>
                    <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="{{ asset('storage/app/'. $app->foto) }}" alt="image" width="300">
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
                        <div class="intro" style="text-align: justify;">{{ $app->deskripsi }}</div>
                        <a class="more-link" href="{{ $app->link_download }}"><button class="btn btn-info">Download</button></a>
                    </div><!--//media-body-->
                </div><!--//media-->
            </div><!--//item-->
        @endforeach
    </div><!--//category-group-->
@endforeach

                </div> <!-- End Latest -->

              </div>
            </div>
