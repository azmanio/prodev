<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Layanan</h2>
            <p>Temukan Solusi Kreatif dan Inovatif untuk Setiap Kebutuhan Anda. Kami siap membantu mewujudkan visi Anda
                melalui layanan yang tersedia. Bersama, mari kita bentuk jejak digital yang tak terlupakan!</p>
        </div>

        <div class="row">
            @foreach ($jenis_layanan as $item)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box mb-4">
                        <div class="icon text-center icon-color">
                            <i class="{{ $item->icon_class }} fa-8x mb-4"></i>
                        </div>
                        <h4 class="text-center"><a href="{{ route('services', $item) }}">{{ $item->nama }}</a>
                        </h4>
                        <hr>
                        <p class="text-justify">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section><!-- End Services Section -->
