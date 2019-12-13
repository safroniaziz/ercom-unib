<script type="text/javascript">
  $('#table-prodi').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.prodi') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_prodi', name:'nm_prodi'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahProdi(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-prodi').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-prodi form')[0].reset();
  $('.modal-title').text('Tambah Program Studi');
}

function editProdi(id_prodi){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-prodi form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_prodi') }}"+'/'+ id_prodi + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-prodi').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Program Studi');
        $('#id').val(data.id_prodi);
        $('#nm_prodi').val(data.nm_prodi);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusProdi(id_prodi){
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
          url : "{{ url('admin/manajemen_prodi') }}" + '/' + id_prodi,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-prodi').dataTable().api().ajax.reload();
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
    $('#form-prodi form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_prodi') }}";
        else url = "{{ url('admin/manajemen_prodi').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#form-prodi form').serialize(),
          success : function($data){
            $('#form-prodi').modal('hide');
            $('#table-prodi').dataTable().api().ajax.reload();
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