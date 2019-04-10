@extends('layouts.admin')
@section('scripts')
<script>
  $('#TableCategory').DataTable( {
    ajax: {
        url:  apiUrl+'category',
        dataType: "json",
        type: "GET",
        serverSide: true,
        processing: true,
    },
    columns: [
        { data: "id" },
        { data: "image",
          "render" : function ( image ) {
          return '<img height="50" width="50" src="'+imageUrl+'category/'+''+image+'"/>';
          }
        },
        { data: "name" },
        { data: "id", 
          "render" : function ( id ) {
            return '<div class="btn-group mr-1 mb-1">'+
                   '<button type="button" class="btn btn-icon btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      '<i class="la la-navicon"></i>'+
                   '</button>'+
                   '<ul class="dropdown-menu">'+
                      '<li><a onclick="CategoryEdit('+id+')" id="CategoryEdit">Edit</a>'+
                      '<li><a onclick="CategoryDelete('+id+')" id="CategoryDelete">Hapus</a>'+
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
          url: apiUrl+'category',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:false,
          dataType: 'json',
          success:function(formData){
              swal("Berhasil!", "Tambah Data Kategori!", "success");
              $('#createFormCategory').hide();
              $('#TableCategory').DataTable().ajax.reload();
          },
          complete: function() {
              $("#indexCategory").show();
              $("#createData")[0].reset();
          }
      });
  });
</script>
<script>
  function CategoryEdit(id)
  {
    console.log(id);
    // var dataUrl=$('.barangEdit').data('id-url');
    $('.categories').hide();
    $('.CategoryEdit').show();
    // $('.CategoryEdit').attr('hidden',false);
    $.ajax({
        url: apiUrl+'category/edit/'+id,
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
          $('input#image').val(data.image);
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
            url: apiUrl+'category/'+id,
            type:'post',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(respone){
                swal("Berhasil!", "Edit Data Barang!", "success");
                $('.CategoryEdit').hide();
                $('#TableCategory').DataTable().ajax.reload();
            },
            complete: function() {
                $('#indexCategory').show();
            }
        });
    });
</script>
<script>
  function CategoryDelete(id)
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
              url: apiUrl+'category/'+id,
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
              $('#TableCategory').DataTable().ajax.reload();
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
<div class="content categories" id="indexCategory">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Category
            <button class="btn btn-primary pull-right" id="changeViewCategory">
              Tambah Data
            </button>
          </h4>
        </div>
        <div class="container-fluid">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="TableCategory">
              <thead>
                <th>No</th>
                <th>Image</th>
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
@include('category.create')
@include('category.edit')
@endsection