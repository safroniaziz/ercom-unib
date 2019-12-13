<script type="text/javascript">
  $('#table-slide').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.slide') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'gambar', name:'gambar'},
    {data: 'keterangan', name:'keterangan'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahSlide(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-slide').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-slide form')[0].reset();
  $('.modal-title').text('Tambah Gambar Slide');
}

function editSlide(id_slide){
    save_method = 'edit';
    $('input[name=_method]').val('patch');
    $('#form-slide form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_slide') }}"+'/'+ id_slide + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-slide').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Gambar Slide');
        $('#id').val(data.id_slide);
        $('#keterangan').val(data.keterangan);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusSlide(id_slide){
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
          url : "{{ url('admin/manajemen_slide') }}" + '/' + id_slide,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-slide').dataTable().api().ajax.reload();
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
    $('#form-slide form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_slide') }}";
        else url = "{{ url('admin/manajemen_slide').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          // data : $('#form-slide form').serialize(),
          data : new FormData($('#form-slide form')[0]),
          contentType : false,
          processData : false,
          success : function($data){
            $('#form-slide').modal('hide');
            $('#table-slide').dataTable().api().ajax.reload();
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