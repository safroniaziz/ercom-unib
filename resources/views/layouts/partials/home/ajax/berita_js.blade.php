<script type="text/javascript">
  $('#table-berita').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.berita') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_jenis_berita', name:'nm_jenis_berita'},
    {data: 'judul_berita', name:'judul_berita'},
    {data: 'isi_berita', name:'isi_berita'},
    {data: 'created_at', name:'created_at'},
    {data: 'foto', name:'foto'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahBerita(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-berita').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-berita form')[0].reset();
  $('.modal-title').text('Tambah Berita');
}

function editBerita(id_berita){
    save_method = 'edit';
    $('input[name=_method]').val('patch');
    $('#form-berita form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_berita') }}"+'/'+ id_berita + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-berita').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Berita');
        $('#id').val(data.id_berita);
        $('#id_jenis_berita').val(data.id_jenis_berita);
        $('#judul_berita').val(data.judul_berita);
        $('#isi_berita').val(data.isi_berita);
        $('#created_at').val(data.created_at);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusBerita(id_berita){
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
          url : "{{ url('admin/manajemen_berita') }}" + '/' + id_berita,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-berita').dataTable().api().ajax.reload();
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
    $('#form-berita form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_berita') }}";
        else url = "{{ url('admin/manajemen_berita').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          // data : $('#form-berita form').serialize(),
          data : new FormData($('#form-berita form')[0]),
          contentType : false,
          processData : false,
          success : function($data){
            $('#form-berita').modal('hide');
            $('#table-berita').dataTable().api().ajax.reload();
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