<script type="text/javascript">
  $('#table-pembina').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.pembina') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_pembina', name:'nm_pembina'},
    {data: 'foto', name:'foto'},
    {data: 'sambutan', name:'sambutan'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahPembina(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-pembina').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-pembina form')[0].reset();
  $('.modal-title').text('Tambah Pembina');
}

function editPembina(id_pembina){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-pembina form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_pembina') }}"+'/'+ id_pembina + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-pembina').modal('show');
        $('.modal-dialog').css('width','750px');
        $('#modal-title').text('Edit Pembina');
        $('#id').val(data.id_pembina);
        $('#nm_pembina').val(data.nm_pembina);
        $('#sambutan').val(data.sambutan);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusPembina(id_pembina){
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
          url : "{{ url('admin/manajemen_pembina') }}" + '/' + id_pembina,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-pembina').dataTable().api().ajax.reload();
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
    $('#form-pembina form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_pembina') }}";
        else url = "{{ url('admin/manajemen_pembina').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          // data : $('#form-pembina form').serialize(),
          data : new FormData($('#form-pembina form')[0]),
          contentType : false,
          processData : false,
          success : function($data){
            $('#form-pembina').modal('hide');
            $('#table-pembina').dataTable().api().ajax.reload();
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