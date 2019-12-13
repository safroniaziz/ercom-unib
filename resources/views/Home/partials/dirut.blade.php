<section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>DIREKTUR UTAMA UKM ERCOM</h2>
                <h4>sambutan dari direktur utama ukm ercom fakultas teknik, universitas bengkulu</h4>
            </div>
            <div class="row about_row">
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h2>halo semuanya</h2>
                    </div>
                    <p style="text-align: justify;">Puji syukur senantiasa kita ucapkan ke hadirat Allah SWT atas segala  limpahan rahmat dan karunianya kepada kita bersama yang mana hingga detik ini kita masih diberi kesempatan untuk hidup di bumi Nya yang indah ini, dalam rangka mencari bekal untuk kehidupan yang lebih kekal di akhirat nanti. Kemudian shalawat beserta salam senantiasa tercurah buat arwah junjungan alam Nabi Besar Muhammad SAW, beserta para keluarga, sahabat, dan orang-orang yang istiqamah menegakkan agama ini hingga hari akhir nanti.Tiada terasa, sudah setengah satu tahun diri ini mengemban amanah di lembaga akademis ini. Ruang Karya tempat bersinggah, Sekretariat Sementara yang masih menginduk kepada sekretariat UKM P3M KBM UNIB menjadi saksi, Rabu 7 Oktober 2017, beberapa saat setelah terbenamnya sang Matahari, Presidium Sidang I yang diamini peserta Musyawarah Besar Pertama UKM ERCOM FT KBM UNIB, mengetuk palu sidang tiga kali, memutuskan untuk menetapkan Rizka Yulia Ningsih sebagai Direktur Utaama UKM ERCOM FT KBM UNIB Pertama periode 2017/2018. Diri ini bergetar, jantung berdebar, dada ini pun membuncah. Berbagai pertanyaan bermunculan dari dalam diri, sanggupkah diri ini bertahan mengemban amanah yang tidak ringan ini. Kuatkah dan mampukah diri ini memenuhi harapan besar dan kepercayaan yang telah diberikan dan yang terpenting adalah bagaimana untuk mempertanggungjawabkan ini semua? Tidak sekedar pertanggungjawaban di hadapan manusia, tapi yang lebih utama adalah pertanggungjawaban kepada Sang Maha Pencipta di hari kiamat kelak. Akan tetapi, kekhawatiran dan kepesimisan itu pudar seketikanya, demi melihat tatapan-tatapan optimis, semangat, dan kepercayaan dari manusia- manusia luar biasa yang memenuhi ruangan yang bersejarah itu. Suatu keyakinan bahwa diri ini tidak sendiri, ada banyak orang yang menyokong, membersamai, dan memiliki itikad serta visi bersama, membawa lembaga ini menjadi lebih baik kedepannya. Dengan mengucap bismillah, perjuangan ini pun dimulai, demi terwujudnya visi ERCOM 2017/2018, “Terbentuknya UKM ERCOM FT KBM UNIB yang memiliki kader-kader yang kompeten dalam kepenelitian, profesional secara kelembagaan,  serta  memiliki  jejaring  dan  kontribusi  nyata  pada tataran global”
p>
                    <a href="#" class="button_all">Kontak Saya</a>
                </div>
                <div class="col-md-5 col-sm-6 about_client">
                    <?php
                       $dirut = DB::table('tb_pengurus')
                                ->select('foto')
                                ->where('id_pengurus',1)
                                ->get();
                        foreach ($dirut as $dirut){
                   ?>
                        <img src="{{ $dirut->foto }}" alt="">
                   <?php 
                    }
                   ?>
                    
                </div>
            </div>
        </div>
    </section>