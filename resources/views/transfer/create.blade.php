@extends('layouts.front')
@section('scripts')
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
        '<option value="'+value.id+'">'+value.stok+'</option>'
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
          url: apiUrl+'transfer',
          type:'POST',
          data:formData,
          cache: true,
          contentType: false,
          processData: false,
          async:true,
          dataType: 'json',
          success:function(response){
              swal("Berhasil!", "Tambah Data Transfer!", "success");
              $('#createFormTransfer').hide();
              $('#TableTransfer').DataTable().ajax.reload();
          },
          complete: function() {
              $("#indexTransfer").attr('hidden', false);
              $("#createData")[0].reset();
          }
      });
  });
</script>


@endsection
@section('content')
<div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-12 offset-lg-2 col-lg-10">
                    <div class="entry-header">
                        <h3><font color="#00FFFF" style="animation-direction: 48"></font></h3>
                        <h2>Transfer</h2>
                    </div><!-- .entry-header -->

                 
                </div><!-- .col-12 -->
            </div><!-- row -->

           
        </div><!-- .container -->
    </div><!-- .hero-content -->
<div class="section" id="createFormTransfer">
  <div class="container">
    <br>
    <br>
    
        <div class="card">
        <div class="header">
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" id="createData">
            {{ csrf_field() }}

            <br>
            <br>
            <br>
            <div class="col-md-12 col-lg-6">
           
            <div class="form-group">
              <label class="control-label">Nominal</label>
              <input type="text" class="form-control border-input" placeholder="Nominal" name="nominal" id="nominal" required>
            </div>
            
            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" class="form-control border-input"></textarea>
            </div>
 
         <div class="form-group">
              <label class="control-label">Stok</label>
              <input type="text" class="form-control border-input" placeholder="jumlah_stok" name="jumlah_stok" id="jumlah_stok" required>
            </div>

            <div class="form-group">
              <label class="control-label">Status</label>
              <input type="text" class="form-control border-input" placeholder="Status" name="status" id="status" required>
            </div>
          </div>

             

            <div class="col-md-12 col-lg-6">
            <div class="form-group">
              <label class="control-label">User</label>
              <input type="text" class="form-control border-input" name="user_id" id="selectUser">
            </div>

            <div class="form-group">
              <label class="control-label">Bank</label>
              <select class="form-control border-input" name="bank_id" id="selectBank" required>
                
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Judul Event</label>
              <select class="form-control border-input" name="event_id" id="selectEvent" required="">
                
              </select>
            </div>

<div class="form-group">
              <label class="control-label">Jumlah Tiket</label>
              <textarea name="jumlah_tiket" class="form-control border-input"></textarea>
            </div>

                  <div class="form-group">
              <label class="control-label">Harga Satuan</label>
              <select class="form-control border-input" name="tiket_id" id="selectTiket" required="">
                
              </select>
            </div>
          </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>

          </form>
          </div>
    
    </div>
  </div>
</div>
@endsection