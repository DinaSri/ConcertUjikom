@extends('layouts.admin')
@section('scripts')

<script>
  $('.image').dropify();
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
              $("#indexEvent").attr('hidden', false);
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
                        <h2>Buat Event</h2>
                    </div><!-- .entry-header -->

                 
                </div><!-- .col-12 -->
            </div><!-- row -->

           
        </div><!-- .container -->
    </div><!-- .hero-content -->
<div class="section" id="createFormEvent">
  <div class="container">
    
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
                <label class="control-label">Image</label>
                <input type="file" name="image" id="image" class="image" data-height="300" />
            </div>
  


             <div class="form-group">
              <label class="control-label">Title</label>
              <input type="text" class="form-control border-input" placeholder="Title" name="title" id="title" required>
            </div>
           

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" class="form-control border-input"></textarea>
            </div>
</div>


            <div class="col-md-12 col-lg-6">
             <div class="form-group">
              <label class="control-label">Penyelanggara</label>
              <input type="text" class="form-control border-input" name="penyelenggara" id="penyelenggara" >
            </div>


             <div class="form-group">
              <label class="control-label">Tanggal</label>
              <input type="date" class="form-control border-input" placeholder="Tanggal" name="tanggal" id="tanggal" required>
            </div>

            <div class="form-group">
              <label class="control-label">Category</label>
              <select class="form-control border-input" name="category_id" id="pilihCategory" required>
              </select>
            </div> 
            
            <div class="form-group">
              <label class="control-label">Waktu</label>
              <input type="time" class="form-control border-input" placeholder="Waktu" name="waktu" id="waktu" required>
            </div>

                  <div class="form-group">
              <label class="control-label">Lokasi</label>
              <input type="text" class="form-control border-input" placeholder="Lokasi" name="lokasi" id="lokasi" required>
            </div>
            

         
             


            <div class="form-group">
              <label class="control-label">Status</label>
              <input type="string" class="form-control border-input" placeholder="Status" name="status" id="status" required>
            </div>

                
                   <input type=hidden name="user_id" id="user_id" value="{{ Auth::user()->id }}">

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