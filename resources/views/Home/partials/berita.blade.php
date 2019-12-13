<section class="latest_blog_area">
    <div class="container">
        <div class="tittle wow fadeInUp">
            <h2>Berita Terbaru</h2>
            <h4>Berita Terbaru UKM ERCOM Fakultas Teknik Universitas Bengkulu</h4>
        </div>
            <div class="row latest_blog">
                <?php 
                    $berita = DB::table('tb_berita')->get();
                    foreach ($berita as $berita) {
                ?>
                       <div class="col-md-4 col-sm-6 blog_content">
                            <img src="{{asset('assets/images/blog/lb-2.jpg')}}" alt="">
                            <a href="#" class="blog_heading">{{ $berita->judul_berita }}</a>
                            <h4><small>by  </small><a href="#">Prodip Ghosh</a><span>/</span><small>ON </small> October 15, 2016</h4>
                            <p>{{ $berita->isi_berita }} <a href="#">Read More</a></p>
                        </div>
                <?php 
                    }
                ?>
        </div>
    </div>
</section>