@extends('layouts.admin')
@section('scripts')
<script>
  $('#TableMasterBank').DataTable( {
    ajax: {
        url: apiUrl+'masterbank',
        dataType: "json",
        type: "GET",
    },
    columns: [
        { data: "id" },
        { data: "image",
          "render" : function ( url, type, full) {
          return '<img height="50" width="50" src="'+imageUrl+'master/'+''+url+'"/>';
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
                      '<li><a onclick="editmasterbank('+id+')" id="editmasterbank">Edit</a>'+
                      '<li><a onclick="MasterDelete('+id+')" id="MasterDelete">Hapus</a>'+
                   '</ul>'+
                   '</div>'
            }
        },
    ]
  });
</script>
<script>
  function editmasterbank(id)
  {
    console.log(id);
    // var dataUrl=$('.barangEdit').data('id-url');
    $('.masterbank').hide();
    $('.editmasterbank').show();
    // $('.editmasterbank').attr('hidden',false);
    $.ajax({
        url:apiUrl+'masterbank/edit/'+id,
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
            // $('#indexMasterBank').attr('hidden', false);
        }
    });
  }
</script>
<script>
  $('#createData').submit(function(e){
      var formData    = new FormData($('#createData')[0]);
      e.preventDefault();
      $.ajax({
          url:apiUrl+'masterbank',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:false,
          dataType: 'json',
          success:function(formData){
              swal("Berhasil!", "Tambah Data Master Bank!", "success");
              $('#createFormMasterBank').hide();
          },
          complete: function() {
              $("#indexMasterBank").show();
              $("#createData")[0].reset();
              $('#TableMasterBank').DataTable().ajax.reload();
          }
      });
  });
</script>
<script>
  $('.Form').submit(function(e){
  var formData    = new FormData($('.Form')[0]);
  var id = formData.get('id');
  console.log(formData.get('id'));
  e.preventDefault();
  $.ajax({
      url: apiUrl+'masterbank/'+id,
      type:'post',
      data:formData,
      cache: true,
      contentType: false,
      processData: false,
      async:false,
      dataType: 'json',
      success:function(data){
          swal("Berhasil!", "Edit Data Master Bank!", "success");
              $('.editmasterbank').hide();
              $('#TableMasterBank').DataTable().ajax.reload();
          },
          complete: function() {
              $("#indexMasterBank").show();
              // $("#myFormEdit")[0].reset();
          }
      });
  });
</script>
<script>
  function MasterDelete(id)
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
              url:apiUrl+'masterbank/'+id,
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
              $('#TableMasterBank').DataTable().ajax.reload();
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
  $('.image').dropify();
</script>
@endsection
@section('content')
<div class="content masterbank" id="indexMasterBank">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Master Bank
            <button class="btn btn-primary pull-right" id="changeViewMasterBank">
              Tambah Data
            </button>
          </h4>
        </div>
        <div class="container-fluid">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="TableMasterBank">
              <thead>
                <th>#</th>
                <th>Image</th>
                <th>Nama Bank</th>
                <th>Action</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('masterbank.create')
@include('masterbank.edit')
@endsection