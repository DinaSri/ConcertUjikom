@extends('layouts.admin')
@section('scripts')
<script>
  $('#TableKatiket').DataTable( {
    ajax: {
        url:  apiUrl+'katiket',
        dataType: "json",
        type: "GET",
        serverSide: true,
        processing: true,
    },
    columns: [
        { data: "id" },
        { data: "name" },
        { data: "id", 
          "render" : function ( id ) {
            return '<div class="btn-group mr-1 mb-1">'+
                   '<button type="button" class="btn btn-icon btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      '<i class="la la-navicon"></i>'+
                   '</button>'+
                   '<ul class="dropdown-menu">'+
                      '<li><a onclick="KatiketEdit('+id+')" id="KatiketEdit">Edit</a>'+
                      '<li><a onclick="KatiketDelete('+id+')" id="KatiketDelete">Hapus</a>'+
                   '</ul>'+
                   '</div>'
            }
        },
    ]
  });
</script>
<script>
  $('#createData').submit(function(e){
      var formData    = new FormData($('#createData')[0]);
      e.preventDefault();
      $.ajax({
          url: apiUrl+'katiket',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:false,
          dataType: 'json',
          success:function(formData){
              swal("Berhasil!", "Tambah Data Kategori Tiket!", "success");
              $('#createFormKatiket').hide();
              $('#TableKatiket').DataTable().ajax.reload();
          },
          complete: function() {
              $("#indexKatiket").show();
              $("#createData")[0].reset();
          }
      });
  });
</script>
<script>
  function KatiketEdit(id)
  {
    console.log(id);
    // var dataUrl=$('.barangEdit').data('id-url');
    $('.katiket').hide();
    $('.KatiketEdit').show();
    // $('.CategoryEdit').attr('hidden',false);
    $.ajax({
        url: apiUrl+'katiket/edit/'+id,
        type:'get',
        cache: true,
        contentType: false,
        processData: false,
        async:false,
        dataType: 'json',
        success:function(data){
          console.log(data.name);
          $('input#id').val(data.id);
          $('input#name').val(data.name);
        },
        complete: function() {
            // $('#indexCategory').attr('hidden', false);
        }
    });
  }
</script>
<script>
  $('.myFormEdit').submit(function(e){
        var formData    = new FormData($('.myFormEdit')[0]);
        var id = formData.get('id');
        e.preventDefault();
        $.ajax({
            url: apiUrl+'katiket/'+id,
            type:'post',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(respone){
                swal("Berhasil!", "Edit Data Kategori Tiket!", "success");
                $('.KatiketEdit').hide();
                $('#TableKatiket').DataTable().ajax.reload();
            },
            complete: function() {
                $('#indexKatiket').show();
            }
        });
    });
</script>
<script>
  function KatiketDelete(id)
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
              url: apiUrl+'katiket/'+id,
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
              $('#TableKatiket').DataTable().ajax.reload();
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
  $('.dropify').dropify();
</script>
@endsection
@section('content')
<div class="content katiket" id="indexKatiket">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Category Tickets
            <button class="btn btn-primary pull-right" id="changeViewKatiket">
              Tambah Data
            </button>
          </h4>
        </div>
        <div class="container-fluid">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="TableKatiket">
              <thead>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('katiket.create')
@include('katiket.edit')
@endsection