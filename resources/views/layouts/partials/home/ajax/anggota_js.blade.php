<script type="text/javascript">
  $('#table-anggota').DataTable({
  processing:true,
  serverSide:true,
  ajax: "{{ route('api.anggota') }}",
  columns: [
    {data: 'rownum', name: 'rownum'},
    {data: 'nm_anggota', name:'nm_anggota'},
    {data: 'npm', name:'npm'},
    {data: 'foto', name:'foto'},
    {data: 'nm_bidang', name:'nm_bidang'},
    {data: 'nm_prodi', name:'nm_prodi'},
    {data: 'telp', name:'telp'},
    {data: 'email', name:'email'},
    {data: 'fb', name:'fb'},
    {data: 'instagram', name:'instagram'},
    {data: 'action', name:'action', orderable:false, searchable:false}
  ]
});

function tambahAnggota(){
  save_method = "add";
  $('input[name=_method]').val('POST');
  $('#form-anggota').modal('show');
  $('.modal-dialog').css('width','750px');
  $('#form-anggota form')[0].reset();
  $('.modal-title').text('Tambah Bidang Kepengurusan');
}

function editAnggota(id_anggota){
    save_method = 'edit';
    $('input[name=_method]').val('patch');
    $('#form-anggota form')[0].reset();
    $.ajax({
      url: "{{ url('admin/manajemen_anggota') }}"+'/'+ id_anggota + "/edit",
      type: "GET",
      dataType: "JSON",
      success: function(data){
        $('#form-anggota').modal('show');
        $('.modal-dialog').css('width','750px');
        $('.modal-title').text('Edit Bidang Kepengurusan');
        $('#id').val(data.id_anggota);
        $('#nm_anggota').val(data.nm_anggota);
        $('#npm').val(data.npm);
        $('#id_bidang').val(data.id_bidang);
        $('#id_prodi').val(data.id_prodi);
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

function hapusAnggota(id_anggota){
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
          url : "{{ url('admin/manajemen_anggota') }}" + '/' + id_anggota,
          type : "POST",
          data : {'_method' : 'DELETE', '_token' : csrf_token},
          success : function(data) {
            $('#table-anggota').dataTable().api().ajax.reload();
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
    $('#form-anggota form').validator().on('submit', function(e){
      if (!e.isDefaultPrevented()) {
        var id = $('#id').val();
        if (save_method == 'add') url = "{{ url('admin/manajemen_anggota') }}";
        else url = "{{ url('admin/manajemen_anggota').'/' }}"+id;

        $.ajax({
          url : url,
          type : "POST",
          // data : $('#form-anggota form').serialize(),
          data : new FormData($('#form-anggota form')[0]),
          contentType : false,
          processData : false,
          success : function($data){
            $('#form-anggota').modal('hide');
            $('#table-anggota').dataTable().api().ajax.reload();
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