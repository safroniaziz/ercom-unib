<script type="text/javascript">
  $('#table-kegiatan').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.kegiatan') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'judul_kegiatan', name:'judul_kegiatan'},
    {data: 'nm_bidang', name:'nm_bidang'},
    {data: 'gambar_kegiatan', name:'gambar_kegiatan'},
    {data: 'isi', name:'isi'},
    {data: 'created_at', name:'created_at'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahKegiatan(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-kegiatan').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-kegiatan form')[0].reset();
  $('.modal-title').text('Tambah Bidang Kepengurusan');
}

function editKegiatan(id_kegiatan){
    save_method = 'edit';
    $('input[name=_method]').val('patch');
    $('#form-kegiatan form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_kegiatan') }}"+'/'+ id_kegiatan + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-kegiatan').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Bidang Kepengurusan');
        $('#id').val(data.id_kegiatan);
        $('#judul_kegiatan').val(data.judul_kegiatan);
        $('#id_bidang').val(data.id_bidang);
        $('#isi').val(data.isi);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusKegiatan(id_kegiatan){
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
          url : "{{ url('admin/manajemen_kegiatan') }}" + '/' + id_kegiatan,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-kegiatan').dataTable().api().ajax.reload();
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
    $('#form-kegiatan form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_kegiatan') }}";
        else url = "{{ url('admin/manajemen_kegiatan').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          // data : $('#form-kegiatan form').serialize(),
          data : new FormData($('#form-kegiatan form')[0]),
          contentType : false,
          processData : false,
          success : function($data){
            $('#form-kegiatan').modal('hide');
            $('#table-kegiatan').dataTable().api().ajax.reload();
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