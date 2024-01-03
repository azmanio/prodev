<!-- ======= Services Section ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Layanan</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
            @foreach ($jenis_layanan as $item)
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box mb-4">
                        <div class="icon"><i class="{{ $item->icon_class }}"></i></div>
                        <h4><a href="">{{ $item->nama }}</a></h4>
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section><!-- End Services Section -->
