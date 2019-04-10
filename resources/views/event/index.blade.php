@extends('layouts.admin')
@section('scripts')
<script>
  $('#TableEvent').DataTable( {
    responsive: true,
    ajax: {
        url: apiUrl+'event',
        dataType: "json",
        type: "GET",
        serverSide: true,
        processing: true,
    },
    columns: [
          { data: "id"},
         { data: "image",
          "render" : function ( url, type, full) {
          return '<img height="50" width="50" src="'+imageUrl+'event/'+''+url+'"/>';
          }
        },
          { data: "title" },
          { data: "desc" },
          { data: "penyelenggara"},
          { data: "tanggal"},
          { data: "waktu"},
          { data: "lokasi"},       
          { data: "category_id" },
          { data: "status" },
          { data: "user_id" },
          { data: "id", 
          "render" : function ( id ) {
            return '<div class="btn-group mr-1 mb-1">'+
                   '<button type="button" class="btn btn-icon btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      '<i class="la la-navicon"></i>'+
                   '</button>'+
                   '<ul class="dropdown-menu">'+
                      '<li><a onclick="EventEdit('+id+')" id="EventEdit">Edit</a>'+
                      '<li><a onclick="EventHapus('+id+')" id="EventHapus">Hapus</a>'+
                   '</ul>'+
                   '</div>'
          }
        },
    ]
  });
</script>

 <!--  
 ======================== Source Code Append / Foreach -->
<script>
  $.get(apiUrl+'user', function(data) {
    $('#pilihUser').empty();
    $('#pilihUser').append(  
      '<option value="0">Pilih User</option>'
    );

  $.each(data.data, function(index, value){
      $('#pilihUser').append(
         '<option value="'+value.id+'">'+value.name+'</option>'
      );
    })
  });

   $.get(apiUrl+'category', function(data) {
    $('#pilihCategory').empty();
    $('#pilihCategory').append(
         '<option value="0">Pilih Category</option>'
    );

    $.each(data.data, function(index, value){
      $('#pilihCategory').append(
        '<option value="'+value.id+'">'+value.name+'</option>'
      );
    })
  });


  $('#createData').submit(function(e){
      var formData    = new FormData($('#createData')[0]);
      e.preventDefault();
      $.ajax({
          url:apiUrl+'event',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:true,
          dataType: 'json',
          success:function(response){
              swal("Good Job!", "Tambah Data Event!", "success");
              $('#createFormEvent').hide();
              $('#TableEvent').DataTable().ajax.reload();
          },
          complete: function() {
              $("#indexEvent").show();
              $("#createData")[0].reset();
          }
      });
  });
</script>

<script>
  function EventHapus(id)
  {
      const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
      })

      swalWithBootstrapButtons({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
              url: apiUrl+'event/'+id,
              type:'get',
              cache: true,
              contentType: false,
              processData: false,
              async:false,
              dataType: 'json',
              success:function(respone){
              swalWithBootstrapButtons(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
          },
          complete: function() {
              $('#TableEvent').DataTable().ajax.reload();
          }
          });
        } else if (
          // Read more about handling dismissals
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
  }
</script>

<script>
  function EventEdit(id)
  {
    console.log(id);

    $('.event').hide();
    $('.EventEdit').show();
    // $('.DonationEdit').attr('hidden',false);
    $.ajax({
        url:apiUrl+'event/edit/'+id,
        type:'get',
        cache: true,
        contentType: false,
        processData: false,
        async:false,
        dataType: 'json',
        success:function(data){
          console.log(data.target);
          $('input#id').val(data.id);
          $('input#title').val(data.title);
          $('textarea#desc').val(data.desc);
          $('input#penyelenggara').val(data.penyelenggara);
          $('input#tanggal').val(data.tanggal);
          $('input#waktu').val(data.waktu);
          $('input#lokasi').val(data.lokasi);
          $('input#image').val(data.image);
          
        },
        complete: function() {
            // $('#indexCategory').attr('hidden', false);
        }
    });
  }
</script>

<script>
  $('.FormEdit').submit(function(e){
        var formData    = new FormData($('.FormEdit')[0]);
        var id = formData.get('id');
        e.preventDefault();
        $.ajax({
            url:apiUrl+'event/'+id,
            type:'post',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(respone){
                swal("Berhasil!", "Edit Data Event!", "success");
                $('.EventEdit').hide();
                $('#TableEvent').DataTable().ajax.reload();
            },
            complete: function() {
                $('#indexEvent').show();
            }
        });
    });

  $('.myFormVerify').submit(function(e){
      var formData    = new FormData($('.myFormVerify')[0]);
      var id = formData.get('id');
      e.preventDefault();
      $.ajax({
          url:apiUrl+'event/verify/'+id,
          type:'post',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:false,
          dataType: 'json',
          success:function(respone){
              swal("Berhasil!", "Edit Data Event!", "success");
              $('.EventEdit').hide();
              $('#TableEvent').DataTable().ajax.reload();
          },
          complete: function() {
              $('#indexEvent').show();
          }
      });
  });
</script>

<script>
  ClassicEditor
    .create( document.querySelector('#editan' ) )
    .catch( error => {
          console.error( error );
        } );
  
</script>
<script>
  $('.image').dropify();
</script>
@endsection
@section('content')
<div class="content event" id="indexEvent">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Event
            <button class="btn btn-primary pull-right" id="changeViewEvent">
              Tambah Data
            </button>
          </h4>
        </div>
        <div class="container-fluid">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="TableEvent">
              <thead>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Penyelenggara</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Category</th>
                <th>Status</th>
                <th>Name</th>
                <th width="300">Action</th> 
              </thead>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
@include('event.create')
@include('event.edit')
@endsection