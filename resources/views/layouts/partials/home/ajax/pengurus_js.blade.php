<script type="text/javascript">
  $('#table-pengurus').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.pengurus') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_pengurus', name:'nm_pengurus'},
    {data: 'npm', name:'npm'},
    {data: 'foto', name:'foto'},
    {data: 'nm_jabatan', name:'nm_jabatan'},
    {data: 'nm_bidang', name:'nm_bidang'},
    {data: 'nm_prodi', name:'nm_prodi'},
    {data: 'nm_tahun_kepengurusan', name:'nm_tahun_kepengurusan'},
    {data: 'telp', name:'telp'},
    {data: 'email', name:'email'},
    {data: 'fb', name:'fb'},
    {data: 'instagram', name:'instagram'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahPengurus(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-pengurus').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-pengurus form')[0].reset();
  $('.modal-title').text('Tambah Bidang Kepengurusan');
}

function editPengurus(id_pengurus){
    save_method = 'edit';
    $('input[name=_method]').val('PATCH');
    $('#form-pengurus form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_pengurus') }}"+'/'+ id_pengurus + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-pengurus').modal('show');
        $('.modal-dialog').css('width','750px');
        $('#modal-title').text('Edit Bidang Kepengurusan');
        $('#id').val(data.id_pengurus);
        $('#nm_pengurus').val(data.nm_pengurus);
        $('#npm').val(data.npm);
        $('#id_jabatan').val(data.id_jabatan);
        $('#id_bidang').val(data.id_bidang);
        $('#id_prodi').val(data.id_prodi);
        $('#id_tahun_kepengurusan').val(data.id_tahun_kepengurusan);
        $('#telp').val(data.telp);
        $('#email').val(data.email);
        $('#fb').val(data.fb);
        $('#instagram').val(data.instagram);
      },
      error:function(){
        alert("Nothing Data");
      }
    });
  }

function hapusPengurus(id_pengurus){
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
          url : "{{ url('admin/manajemen_pengurus') }}" + '/' + id_pengurus,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-pengurus').dataTable().api().ajax.reload();
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
    $('#form-pengurus form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_pengurus') }}";
        else url = "{{ url('admin/manajemen_pengurus').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          // data : $('#form-pengurus form').serialize(),
          data : new FormData($('#form-pengurus form')[0]),
          contentType : false,
          processData : false,
          success : function($data){
            $('#form-pengurus').modal('hide');
            $('#table-pengurus').dataTable().api().ajax.reload();
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