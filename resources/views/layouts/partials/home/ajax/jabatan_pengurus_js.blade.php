<script type="text/javascript">
  $('#table-jabatan').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.jabatan') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_jabatan', name:'nm_jabatan'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahJabatan(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-jabatan').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-jabatan form')[0].reset();
  $('.modal-title').text('Tambah Jabatan Pengurus Inti');
}

function editJabatan(id_jabatan){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-jabatan form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_jabatan') }}"+'/'+ id_jabatan + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-jabatan').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Bidang Kepengurusan');
        $('#id').val(data.id_jabatan);
        $('#nm_jabatan').val(data.nm_jabatan);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusJabatan(id_jabatan){
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
          url : "{{ url('admin/manajemen_jabatan') }}" + '/' + id_jabatan,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-jabatan').dataTable().api().ajax.reload();
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
    $('#form-jabatan form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_jabatan') }}";
        else url = "{{ url('admin/manajemen_jabatan').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#form-jabatan form').serialize(),
          success : function($data){
            $('#form-jabatan').modal('hide');
            $('#table-jabatan').dataTable().api().ajax.reload();
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