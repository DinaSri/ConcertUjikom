@extends('layouts.front')
<style>
  .cc-selector input{
      margin:0;padding:0;
      -webkit-appearance:none;
         -moz-appearance:none;
              appearance:none;
  }

  .cc-selector-2 input{
      position:absolute;
      z-index:999;
  }

  .visa{background-image:url(http://i.imgur.com/lXzJ1eB.png);}

  .cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
  .cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
      -webkit-filter: none;
         -moz-filter: none;
              filter: none;
  }
  .drinkcard-cc{
      cursor:pointer;
      background-size:contain;
      background-repeat:no-repeat;
      display:inline-block;
      width:100px;height:70px;
      -webkit-transition: all 100ms ease-in;
         -moz-transition: all 100ms ease-in;
              transition: all 100ms ease-in;
      -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
         -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
              filter: brightness(1.8) grayscale(1) opacity(.7);
  }
  .drinkcard-cc:hover{
      -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
         -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
              filter: brightness(1.2) grayscale(.5) opacity(.9);
  }

  /* Extras */
  .cc-selector-2 input{ margin: 5px 0 0 12px; }
  .cc-selector-2 label{ margin-left: 7px; }
  span.cc{ color:#6d84b4 }
</style>
@section('scripts')
<script type="text/javascript"  src="{{ asset('js/rupiah.js') }}"></script>
<script>
  $.get(apiUrl+'masterbank', function(data) {
    $('#selectBank').empty();
    $.each(data.data, function(index, value) {
      $('#selectBank').append(
        '<input type="radio" name="bank_id" id="'+value.id+'" value="'+value.id+'">'+
        '<label class="drinkcard-cc" name="bank_id" value="'+value.id+'" for="'+value.id+'" style="background-image: url('+imageUrl+'master/'+value.image+')"></label>'
      );
      console.log(value.id); 
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
                <div class="col-6 col-lg-10">
                    <div class="entry-header">
                       
                    
                    </div><!-- .entry-header -->

               
                </div><!-- .col-12 -->
            </div><!-- row -->

        </div><!-- .container -->
    </div><!-- .hero-content -->

    <div class="content-section">

<div class="section" id="createFormTransfer">
  <div class="container">
   
      <div class="card">
        <div class="header">
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" id="createData">
            {{ csrf_field() }}

            <br>
<!--   <div class="form-group">
              <label class="control-label">Nominal</label>
              <input type="number" class="form-control border-input" placeholder="Rp. " name="nominal" id="nominal" required>
            </div> -->



            
            <input type="hidden" name="nominal" value="{{ $id }}" id="nominal">

          

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" class="form-control border-input"></textarea>
            </div>

             <div class="form-group">
              <label class="control-label">Jumlah Tiket</label>
              <input type="text" class="form-control border-input" name="jumlah_tiket">
                
             
            </div>

            <label class="control-label">Pilih Bank</label>
            <div class="cc-selector-2" id="selectBank">
            </div>

            <br>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <input type="hidden" name="event_id" value="{{ $id }}" id="title">

            <input type="hidden" name="tiket_id" value="{{ $id }}" id="harga">

            <input type="hidden" value="Belum Terverifikasi" name="status" id="status">

            <div class="form-group">
              <button class="btn btn-success" type="submit" onclick="window.location='{{ url('transaksi/confirmation', $id) }}'">Transfer</button>
            </div>

          </form>
         
      </div>
    </div>
  </div>
</div>
@endsection











