@extends('layouts.admin')
@section('scripts')
<script>
  $('#TableBank').DataTable( {
    ajax: {
        url: apiUrl+'bank',
        dataType: "json",
        type: "GET",
    },
    columns: [
        { data: "id" },
        { data: "number" },
        { data: "user_id" },
        { data: "master_bank_id" },
        { data: "id", 
          "render" : function ( id ) {
            return '<div class="btn-group mr-1 mb-1">'+
                   '<button type="button" class="btn btn-icon btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
                      '<i class="la la-navicon"></i>'+
                   '</button>'+
                   '<ul class="dropdown-menu">'+
                      '<li><a onclick="BankEdit('+id+')" id="BankEdit">Edit</a>'+
                      '<li><a onclick="BankDelete('+id+')" id="BankDelete">Hapus</a>'+
                   '</ul>'+
                   '</div>'
            }
        },
    ]
  });
</script>
<script>
  $.get(apiUrl+'masterbank', function(data) {
    $('.pilihBank').empty();
    $('.pilihBank').append(  
      '<option value="0">Pilih Bank</option>'
    );

      // console.log(); 
    $.each(data.data, function(index, value) {
      $('.pilihBank').append(
        '<option value="'+value.id+'">'+value.name+'</option>'
      );
    })
  });
</script>
<script>
  $('#createData').submit(function(e){
      var formData    = new FormData($('#createData')[0]);
      e.preventDefault();
      $.ajax({
          url:apiUrl+'bank',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:true,
          dataType: 'json',
          success:function(response){
              swal("Berhasil!", "Tambah Data Bank!", "success");
              $('#createFormBank').hide();
              $('#TableBank').DataTable().ajax.reload();
          },
          complete: function() {
              $("#indexBank").show();
              $("#createData")[0].reset();
          }
      });
  });
</script>
<script>
  function BankEdit(id)
  {
    console.log(id);
    // var dataUrl=$('.barangEdit').data('id-url');
    $('.bank').hide();
    $('.BankEdit').show();
    // $('.BankEdit').attr('hidden',false);
    $.ajax({
        url:apiUrl+'bank/edit/'+id,
        type:'get',
        cache: true,
        contentType: false,
        processData: false,
        async:false,
        dataType: 'json',
        success:function(data){
          console.log(data.name);
          $('input#id').val(data.id);
          $('input#number').val(data.number);
          $('input#user_id').val(data.user_id);
          $('select#master_bank_id').val(data.user_id);
        },
        complete: function() {
            // $('#indexBank').attr('hidden', false);
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
            url:apiUrl+'bank/'+id,
            type:'post',
            data:formData,
            cache: true,
            contentType: false,
            processData: false,
            async:false,
            dataType: 'json',
            success:function(respone){
                swal("Berhasil!", "Edit Data Bank!", "success");
                $('.BankEdit').hide();
                $('#TableBank').DataTable().ajax.reload();
            },
            complete: function() {
                $('#indexBank').show();
            }
        });
    });
</script>

<script>
  function BankDelete(id)
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
              url:apiUrl+'bank/'+id,
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
              $('#TableBank').DataTable().ajax.reload();
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
<div class="content bank" id="indexBank">
  <div class="col-md-12">
    <div class="row">
      <div class="card">
        <div class="header">
          <h4 class="title">Bank
            <button class="btn btn-primary pull-right" id="changeViewBank">
              Tambah Data
            </button>
          </h4>
        
        </div>
        <div class="container-fluid">
          <div class="content table-responsive table-full-width">
            <table class="table table-striped" id="TableBank">
              <thead>
                <th>#</th>
                <th>Number</th>
                <th>Owner</th>
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
@include('bank.create')
@include('bank.edit')
@endsection