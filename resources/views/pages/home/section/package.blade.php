<!-- ======= Package Section ======= -->
<section id="package" class="package">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Paket Layanan</h2>
            <p>Kami menyajikan beragam paket harga yang dirancang untuk memenuhi kebutuhan Anda dengan
                fleksibilitas dan nilai tambah. Dengan layanan berkualitas tinggi dan harga yang transparan, temukan
                paket yang sesuai untuk membawa visi kreatif Anda menjadi kenyataan.</p>
        </div>

        <div class="row">
            @foreach ($paket_layanan->where('status', true) as $item)
                <div class="col-lg-4">
                    <div class="mt-4 mt-lg-0 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h3>{{ $item->nama }}</h3>
                            <h4><sup>Rp</sup>{{ number_format($item->harga, 0, ',', '.') }}<span>Per Project</span>
                            </h4>
                            <div class="card-text overflow-hidden text-justify" style="max-height: 190px">
                                {!! $item->deskripsi !!}</div>
                            <p class="mb-0">...</p>
                            <ul class="my-0">
                                @foreach ($item->layanan_options as $options)
                                    <li><i class="bx bx-check"></i>{{ $options->layanan->nama }}</li>
                                @endforeach
                            </ul>
                            <a href="{{ route('detail-package', $item) }}" class="buy-btn">Detail
                                Paket</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section><!-- End Pricing Section -->
