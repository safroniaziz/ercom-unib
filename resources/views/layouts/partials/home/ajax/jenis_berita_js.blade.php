<script type="text/javascript">
  $('#table-jenis-berita').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.jenis_berita') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_jenis_berita', name:'nm_jenis_berita'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahJenisBerita(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-jenis-berita').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-Jenis-berita form')[0].reset();
  $('.modal-title').text('Tambah Jenis Berita Pengurus Inti');
}

function editJenisBerita(id_jenis_berita){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-jenis-berita form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_jenis_berita') }}"+'/'+ id_jenis_berita + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-jenis-berita').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Jenis Berita');
        $('#id').val(data.id_jenis_berita);
        $('#nm_jenis_berita').val(data.nm_jenis_berita);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusJenisBerita(id_jenis_berita){
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
  swal({
      title: 'Data akan dimasukan ke file sampah!',
      text: "Anda bisa mengembalikan data ini pada file sampah!",
      type: 'warning',
      showCancelButton: false,
      cancelButtonColor: '#d33',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'Oke!',
  }).then(function () {
      $.ajax({
          url : "{{ url('admin/manajemen_jenis_berita') }}" + '/' + id_jenis_berita,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-jenis-berita').dataTable().api().ajax.reload();
              swal({
                  title: 'Berhasil!',
                  text: 'Data sudah menjadi sampah!',
                  type: 'success',
                  timer: '1500'
              })
          },
          error : function () {
              swal({
                  title: 'Oops...',
                  text: ' Terjadi Kesalahan!',
                  type: 'error',
                  timer: '1500'
              })
          }
      });
  });
}

$(function(){
    $('#form-jenis-berita form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_jenis_berita') }}";
        else url = "{{ url('admin/manajemen_jenis_berita').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#form-jenis-berita form').serialize(),
          success : function($data){
            $('#form-jenis-berita').modal('hide');
            $('#table-jenis-berita').dataTable().api().ajax.reload();
          },
          error:function(){
          }
        });
        return false;
      }
    });
  });

</script>
</script>