<section class="section-video parallax100" style="background-image: url(images/bg2.jpg);">
    <div class="content-video t-center p-t-150 p-b-150">
        <h3 class="tit4 t-center p-l-15 p-r-15 p-t-3">
            Cuplikan Video
        </h3>
        <div class="btn-play ab-center size16 hov-pointer m-l-r-auto m-t-43 m-b-33" data-toggle="modal"
            data-target="#modal-video-01">
            <div class="flex-c-m sizefull bo-cir bgwhite color1 hov1 trans-0-4">
                <i class="fa fa-play fs-18 m-l-2" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</section>

<!-- Blog -->
<section class="section-blog bg-white p-t-10 p-b-50">
    <div class="container">
        <div class="row">
            @foreach ($trendingArticle as $item)
                <div class="col-md-4 p-t-30">
                    <!-- Block1 -->
                    <div class="blo1">
                        <label class="float-end badge btn-success d-flex justify-content-center" style="font-size: 14px">Popular Artikel</label>
                        <div class="wrap-pic-blo1 bo-rad-10 hov-img-zoom pos-relative">
                            <a href="detailartikel"><img src="{{ asset('images/artikel/' . $item->gambar_artikel) }}"
                                class="img-fluid" alt="{{ $item->judul_artikel }}"></a>
                        </div>

                        <div class="wrap-text-blo1 p-t-35">
                            <a href="detailartikel">
                                <h4 class="txt5 color0-hov trans-0-4 m-b-13">
                                    {{ $item->judul_artikel }}
                                </h4>
                            </a>

                            <p class="m-b-20">
                                {{ Str::limit($item->deskripsi_artikel, '50', ' . . . . . . . ') }}
                            </p>

                            <a href="{{ url('artikel/detail-artikel/'.$item->id) }}" class="txt4">
                                Lanjutkan Membaca
                                <i class="fa fa-long-arrow-right m-l-10" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

