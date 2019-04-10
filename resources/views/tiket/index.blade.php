@extends('layouts.admin')
@section('scripts')
<script>
  $('#TableTiket').DataTable( {
    responsive: true,
    ajax: {
        url: apiUrl+'tiket',
        dataType: "json",
        type: "GET",
        serverSide: true,
        processing: true,
    },
    columns: [
          { data: "id"},
          { data: "harga" },
          { data: "stok" },     
          { data: "katiket_id" },
          { data: "event_id" },
          { data: "id", 
          "render" : function ( id ) {
            return '<div class="btn-group mr-1 mb-1">'+
                   '<button type="button" class="btn btn-icon btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      '<i class="la la-navicon"></i>'+
                   '</button>'+
                   '<ul class="dropdown-menu">'+
                      '<li><a onclick="TiketEdit('+id+')" id="TiketEdit">Edit</a>'+
                      '<li><a onclick="TiketHapus('+id+')" id="TiketHapus">Hapus</a>'+
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
  $.get(apiUrl+'event', function(data) {
    $('#pilihEvent').empty();
    $('#pilihEvent').append(  
      '<option value="0">Pilih Event</option>'
    );

  $.each(data.data, function(index, value){
      $('#pilihEvent').append(
         '<option value="'+value.id+'">'+value.title+'</option>'
      );
    })
  });

   $.get(apiUrl+'katiket', function(data) {
    $('#pilihKatiket').empty();
    $('#pilihKatiket').append(
         '<option value="0">Pilih Kategori Tiket</option>'
    );

    $.each(data.data, function(index, value){
      $('#pilihKatiket').append(
        '<option value="'+value.id+'">'+value.name+'</option>'
      );
    })
  });


  $('#createData').submit(function(e){
      var formData    = new FormData($('#createData')[0]);
      e.preventDefault();
      $.ajax({
          url:apiUrl+'tiket',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:true,
          dataType: 'json',
          success:function(response){
              swal("Good Job!", "Tambah Data Tiket!", "success");
              $('#createFormTiket').hide();
              $('#TableTiket').DataTable().ajax.reload();
          },
          complete: function() {
              $("#indexTiket").show();
              $("#createData")[0].reset();
          }
      });
  });
</script>

<script>
  function TiketEdit(id)
  {
    console.log(id);

    $('.tiket').hide();
    $('.TiketEdit').show();
    // $('.DonationEdit').attr('hidden',false);
    $.ajax({
        url:apiUrl+'tiket/edit/'+id,
        type:'get',
        cache: true,
        contentType: false,
        processData: false,
        async:false,
        dataType: 'json',
        success:function(data){
          console.log(data.harga);
          $('input#id').val(data.id);
          $('input#harga').val(data.harga);
          $('input#stok').val(data.stok);
          // $('select#katiket_id').val(data.katiket_id);
          $('input#event_id').val(data.event_id);
          // $('input#date_target').val(data.date_target);
          // $('input#title').val(data.title);
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
            url:apiUrl+'tiket/'+id,
            type:'post',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(respone){
                swal("Berhasil!", "Edit Data Tiket!", "success");
                $('.TiketEdit').hide();
                $('#TableTiket').DataTable().ajax.reload();
            },
            complete: function() {
                $('#indexTiket').show();
            }
        });
    });
</script>

<script>
  function TiketHapus(id)
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
              url: apiUrl+'tiket/'+id,
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
              $('#TableTiket').DataTable().ajax.reload();
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
<div class="content tiket" id="indexTiket">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Tiket
            <button class="btn btn-primary pull-right" id="changeViewTiket">
              Tambah Data
            </button>
          </h4>
        </div>
        <div class="container-fluid">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="TableTiket">
              <thead>
                <th>No</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori Tiket</th>
                <th>Event</th>
            
                <th width="300">Action</th> 
              </thead>
            </table>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
@include('tiket.create')
@include('tiket.edit')
@endsection