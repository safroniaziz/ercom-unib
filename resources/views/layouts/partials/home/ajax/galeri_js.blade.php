<script type="text/javascript">
  $('#table-galeri').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.galeri') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'judul_kegiatan', name:'judul_kegiatan'},
    {data: 'foto', name:'foto'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahGaleri(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-galeri').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-galeri form')[0].reset();
  $('.modal-title').text('Tambah Berita');
}

function editGaleri(id_galeri){
    save_method = 'edit';
    $('input[name=_method]').val('patch');
    $('#form-galeri form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_galeri') }}"+'/'+ id_galeri + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-galeri').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Berita');
        $('#id').val(data.id_galeri);
        $('#id_kegiatan').val(data.id_kegiatan);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusGaleri(id_galeri){
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
          url : "{{ url('admin/manajemen_galeri') }}" + '/' + id_galeri,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-galeri').dataTable().api().ajax.reload();
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
    $('#form-galeri form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_galeri') }}";
        else url = "{{ url('admin/manajemen_galeri').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          // data : $('#form-galeri form').serialize(),
          data : new FormData($('#form-galeri form')[0]),
          contentType : false,
          processData : false,
          success : function($data){
            $('#form-galeri').modal('hide');
            $('#table-galeri').dataTable().api().ajax.reload();
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