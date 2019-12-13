<script type="text/javascript">
  $('#table-tahun-kepengurusan').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.tahun.kepengurusan') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_tahun_kepengurusan', name:'nm_tahun_kepengurusan'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahTahun(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-tahun').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-tahun form')[0].reset();
  $('.modal-title').text('Tambah Tahun Kepengurusan');
}

function editTahun(id_tahun_kepengurusan){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-tahun form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_tahun_kepengurusan') }}"+'/'+ id_tahun_kepengurusan + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-tahun').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Tahun Kepengurusan');
        $('#id').val(data.id_tahun_kepengurusan);
        $('#nm_tahun_kepengurusan').val(data.nm_tahun_kepengurusan);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusTahun(id_tahun_kepengurusan){
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
          url : "{{ url('admin/manajemen_tahun_kepengurusan') }}" + '/' + id_tahun_kepengurusan,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-tahun-kepengurusan').dataTable().api().ajax.reload();
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
    $('#form-tahun form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_tahun_kepengurusan') }}";
        else url = "{{ url('admin/manajemen_tahun_kepengurusan').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#form-tahun form').serialize(),
          success : function($data){
            $('#form-tahun').modal('hide');
            $('#table-tahun-kepengurusan').dataTable().api().ajax.reload();
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