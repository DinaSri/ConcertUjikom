@extends('layouts.admin')
@section('scripts')
<script>
  $('#TableTransfer').DataTable( {
    ajax: {
        url: apiUrl+'transfer',
        dataType: "json",
        type: "GET",
    },
    columns: [
      { data: "id" },
      { data: "nominal" },
      { data: "desc" },
      { data: "status" },
      { data: "user_id" },
      { data: "bank_id" },
      { data: "event_id" },
      { data: "jumlah_tiket" },
      { data: "tiket_id" },
       { data: "id", 
          "render" : function ( id ) {
            return '<div class="btn-group mr-1 mb-1">'+
                   '<button type="button" class="btn btn-icon btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      '<i class="la la-navicon"></i>'+
                   '</button>'+
                   '<ul class="dropdown-menu">'+
                    '<li><a onclick="TransferEdit('+id+')" id="TransferEdit">Verify</a>'+
                 '</ul>'+
                   '</div>'
          }
        },
    ]
  });


</script>
<script>
  $.get(apiUrl+'user', function(data) {
    $('#selectUser').empty();
    $('#selectUser').append(  
      '<option value="0">Pilih User</option>'
    );

      // console.log(); 
    $.each(data.data, function(index, value) {
      $('#selectUser').append(
        '<option value="'+value.id+'">'+value.name+'</option>'
      );
    })
  });

  $.get(apiUrl+'masterbank', function(data) {
    $('#selectBank').empty();
    $('#selectBank').append(  
      '<option value="0">Pilih Bank</option>'
    );

      // console.log(); 
    $.each(data.data, function(index, value) {
      $('#selectBank').append(
        '<option value="'+value.id+'">'+value.name+'</option>'
      );
    })
  });

    $.get(apiUrl+'tiket', function(data) {
    $('#selectTiket').empty();
    $('#selectTiket').append(  
      '<option value="0">Pilih Jumlah Tiket</option>'
    );

      // console.log(); 
    $.each(data.data, function(index, value) {
      $('#selectTiket').append(
        '<option value="'+value.id+'">'+value.harga+'</option>'
      );
    })
  });


  $.get(apiUrl+'event', function(data) {
    $('#selectEvent').empty();
    $('#selectEvent').append(  
      '<option value="0">Pilih Judul Event</option>'
    );

      // console.log(); 
    $.each(data.data, function(index, value) {
      $('#selectEvent').append(
        '<option value="'+value.id+'">'+value.title+'</option>'
      );
    })
  });

  $('#createData').submit(function(e){
      var formData    = new FormData($('#createData')[0]);
      e.preventDefault();
      $.ajax({
          url:apiUrl+'transfer',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:true,
          dataType: 'json',
          success:function(response){
              swal("Berhasil!", "Tambah Data Transfer!", "success");
              $('#createFormTransfer').attr('hidden', true);
              $('#TableTransfer').DataTable().ajax.reload();
          },
          complete: function() {
              $("#indexTransfer").attr('hidden', false);
              $("#createData")[0].reset();
          }
      });
  });
</script>
<script>
  function TransferDelete(id)
  {
      // var dataUrl=$('#barangDelete').data('id-url');
      Swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url:apiUrl+'transfer/'+id,
                  type:'delete',
                  cache: true,
                  contentType: false,
                  processData: false,
                  async:false,
                  dataType: 'json',
                  success:function(respone){
                  swal("Data Anda Telah di Hapus!", {
                      icon: "success",
                  });
              },
              complete: function() {
                  $('#TableTransfer').DataTable().ajax.reload();
              }
              });
          } else {
              swal("Data Anda Tersimpan Aman!");
          }
      });
  }
</script>


<script>
  function TransferEdit(id)
  {
    console.log(id);

    $('.transfer').hide();
    $('.TransferEdit').show();
    // $('.TransferEdit').attr('hidden',false);
    $.ajax({
        url:apiUrl+'transfer/edit/'+id,
        type:'get',
        cache: true,
        contentType: false,
        processData: false,
        async:false,
        dataType: 'json',
        success:function(data){
          console.log(data.id);
          $('input#id').val(data.id);
          $('input#nominal').val(data.nominal);
          $('textarea#desc').val(data.desc);
          // $('input#title').val(data.title);
        },
        complete: function() {
            // $('#indexCategory').attr('hidden', false);
        }
    });
  }

  $('.myFormEdit').submit(function(e){
      var formData    = new FormData($('.myFormEdit')[0]);
      var id = formData.get('id');
      e.preventDefault();
      $.ajax({
          url:apiUrl+'transfer/verify/'+id,
          type:'post',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:false,
          dataType: 'json',
          success:function(respone){
              swal("Berhasil!", "verify Berhasil!", "success");
              $('.TransferEdit').show();
              $('#TableTransfer').DataTable().ajax.reload();
          },
          complete: function() {
              $('#indexTransfer').show();
          }
      });
  });
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editan' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
@section('content')
<div class="content transfer" id="indexTransfer">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Transfer
          </h4>
    
        </div>
        <div class="container-fluid">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="TableTransfer">
              <thead>
                <th>No</th>
                <th>Nominal</th>
                <th>Description</th>
                <th>Status</th>
                <th>Nama User</th>
                <th>Bank</th>
                <th>Event</th>
                <th>Jumlah Tiket</th>
                <th>Harga_satuan</th>
                  <th width="300">Action</th> 
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('transfer.edit')
@endsection