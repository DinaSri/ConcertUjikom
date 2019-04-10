@extends('layouts.admin')
@section('scripts')
<script>
  $('#TableUser').DataTable( {
    ajax: {
        url: apiUrl+'user',
        dataType: "json",
        type: "GET",
    },
    columns: [
        { data: "id" },
        { data: "name" },
        { data: "email" },
        { data: "id", 
          "render" : function ( id ) {
            return '<div class="btn-group mr-1 mb-1">'+
                   '<button type="button" class="btn btn-icon btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      '<i class="la la-navicon"></i>'+
                   '</button>'+
                   '<ul class="dropdown-menu">'+
                      '<li><a onclick="UserEdit('+id+')" id="UserEdit">Edit</a>'+
                      '<li><a onclick="UserDelete('+id+')" id="UserDelete">Hapus</a>'+
                   '</ul>'+
                   '</div>'
            }
        },
    ]
  });
</script>
<script>
  function UserEdit(id)
  {
    console.log(id);
    // var dataUrl=$('.barangEdit').data('id-url');
    $('.user').hide();
    $('.UserEdit').show();
    $('.UserEdit').attr('hidden',false);
    $.ajax({
        url:apiUrl+'user/'+id,
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
          $('input#email').val(data.email);
          $('input#password').val(data.password);
        },
        complete: function() {
            // $('#indexUser').attr('hidden', false);
        }
    });
  }
</script>
<script>
  $('#createData').submit(function(e){
      var formData    = new FormData($('#createData')[0]);
      e.preventDefault();
      $.ajax({
          url:apiUrl+'user',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:false,
          dataType: 'json',
          success:function(formData){
              swal("Berhasil!", "Tambah Data User!", "success");
              $('#createFormUser').hide();
          },
          complete: function() {
              $("#indexUser").show();
              $("#createData")[0].reset();
              $('#TableUser').DataTable().ajax.reload();
          }
      });
  });
</script>
<script>
  $('.FormEdit').submit(function(e){
    var formData    = new FormData($('.FormEdit')[0]);
    var id = formData.get('id');
    e.preventDefault();
    $.ajax({
        url:apiUrl+'user/'+id,
        type:'post',
        data:formData,
        cache: true,
        contentType: false,
        processData: false,
        async:false,
        dataType: 'json',
        success:function(respone){
            swal("Berhasil!", "Edit Data User!", "success");
                $('.UserEdit').hide();
                $('#TableUser').DataTable().ajax.reload();
            },
            complete: function() {
                $("#indexUser").show();
            }
        });
    });
</script>
<script>
  function UserDelete(id)
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
              url:apiUrl+'user/'+id,
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
              $('#TableUser').DataTable().ajax.reload();
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
@endsection
@section('content')
<div class="content user" id="indexUser">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">User
            <button class="btn btn-primary pull-right" id="changeViewUser">
              Tambah Data
            </button>
          </h4>
        </div>
        <div class="container-fluid">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="TableUser">
              <thead>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('user.create')
@include('user.edit')
@endsection