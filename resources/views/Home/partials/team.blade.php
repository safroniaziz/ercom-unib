    <section class="our_team_area ">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>Badan Pengurus Harian Ercom FT UNIB 2017/2018</h2>
                <h4>Berikut adalah tim BPH UKM ERCOM FT UNIB</h4>
            </div>
            <div class="row team_row">
                <?php 
                    $bph = DB::table('tb_pengurus')
                            ->join('tb_jabatan','tb_jabatan.id_jabatan','tb_pengurus.id_jabatan')
                            ->join('tb_bidang_kepengurusan','tb_bidang_kepengurusan.id_bidang','tb_pengurus.id_bidang')
                            ->select('nm_pengurus','npm','nm_jabatan','nm_bidang','telp','fb','email','instagram','foto')
                            ->get();
                    foreach ($bph as $bph) {
                ?>            
                    <div class="col-md-3 col-sm-6 wow fadeInUp">
                   <div class="team_membar">
                        <img src="{{ $bph->foto }}" alt="">
                        <div class="team_content">
                            <ul>
                                <li>
                                    <a href="{{ $bph->fb }}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="{{ $bph->instagram }}" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                            <a class="name" data-toggle="modal" data-target="#data-bph" >{{ $bph->nm_pengurus }}</a>
                            <a href="" class="name">{{ ($bph->npm) }}</a>
                            
                            <h6>{{ $bph->nm_jabatan }} {{ $bph->nm_bidang }}</h6>
                        </div>
                   </div>
                </div>
                <?php 
                    }
                ?>
        </div>
    </section>
    