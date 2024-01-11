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
            @foreach ($paket_layanan as $item)
                <div class="col-lg-4">
                    <div class="mt-4 mt-lg-0 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h3>{{ $item->nama }}</h3>
                            <h4><sup>Rp</sup>{{ number_format($item->harga, 0, ',', '.') }}<span>Per Project</span>
                            </h4>
                            <p>{{ $item->deskripsi }}</p>
                            <ul>
                                @foreach ($item->layanan_options as $options)
                                    <li><i class="bx bx-check"></i>{{ $options->layanan->nama }}</li>
                                @endforeach
                            </ul>
                            <a href="{{ route('checkout-package', $item) }}" class="buy-btn">Detail Paket</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-4">
                <div data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <h3>Free Plan</h3>
                        <h4><sup>$</sup>0<span>per month</span></h4>
                        <ul>
                            <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                            <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                            <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                            <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span>
                            </li>
                            <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis hendrerit</span>
                            </li>
                        </ul>
                        <a href="#" class="buy-btn">Get Started</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                <div class="box featured">
                    <h3>Business Plan</h3>
                    <h4><sup>$</sup>29<span>per month</span></h4>
                    <ul>
                        <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                        <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                        <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                        <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                        <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                    </ul>
                    <a href="#" class="buy-btn">Get Started</a>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <div class="box">
                    <h3>Developer Plan</h3>
                    <h4><sup>$</sup>49<span>per month</span></h4>
                    <ul>
                        <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                        <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                        <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                        <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                        <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                    </ul>
                    <a href="#" class="buy-btn">Get Started</a>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Pricing Section -->
