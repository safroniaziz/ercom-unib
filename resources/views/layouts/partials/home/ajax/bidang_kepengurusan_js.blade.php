<script type="text/javascript">
  $('#table-bidang').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.bidang') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_bidang', name:'nm_bidang'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahBidang(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-bidang').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-bidang form')[0].reset();
  $('.modal-title').text('Tambah Bidang Kepengurusan');
}

function editBidang(id_bidang){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-bidang form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_bidang') }}"+'/'+ id_bidang + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-bidang').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Bidang Kepengurusan');
        $('#id').val(data.id_bidang);
        $('#nm_bidang').val(data.nm_bidang);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusBidang(id_bidang){
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
          url : "{{ url('admin/manajemen_bidang') }}" + '/' + id_bidang,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-bidang').dataTable().api().ajax.reload();
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
    $('#form-bidang form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_bidang') }}";
        else url = "{{ url('admin/manajemen_bidang').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          data : $('#form-bidang form').serialize(),
          success : function($data){
            $('#form-bidang').modal('hide');
            $('#table-bidang').dataTable().api().ajax.reload();
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