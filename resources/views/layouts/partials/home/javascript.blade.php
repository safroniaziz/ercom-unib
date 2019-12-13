<script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
 <script src="{{ asset('assets/bootstrap/js/ie-emulation-modes-warning.js') }}"></script>


{{-- dataTables --}}
<script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>

{{-- Validator --}}
<script src="{{ asset('assets/validator/validator.min.js') }}"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>

@include('layouts/partials/home/ajax/tahun_kepengurusan_js')
@include('layouts/partials/home/ajax/prodi_js')
@include('layouts/partials/home/ajax/bidang_kepengurusan_js')
@include('layouts/partials/home/ajax/jabatan_pengurus_js')
@include('layouts/partials/home/ajax/anggota_js')
@include('layouts/partials/home/ajax/pengurus_js')
@include('layouts/partials/home/ajax/pembina_js')
@include('layouts/partials/home/ajax/slide_js')
@include('layouts/partials/home/ajax/kegiatan_js')
@include('layouts/partials/home/ajax/jenis_berita_js')
@include('layouts/partials/home/ajax/berita_js')
@include('layouts/partials/home/ajax/galeri_js')