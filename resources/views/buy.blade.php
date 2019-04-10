@extends('layouts.front')
@section('scripts')
{{-- dd(); --}}


<script>
    $.get(apiUrl+'event/edit/{{ $id }}', function (data) {
        console.log(data)
                 $('#details').append(
         

                        '<div class="tabs-container">'+
      '<div id="tab_details" class="tab-content">'+
     '<div class="flex flex-wrap justify-content-between">'+

          '<div class="single-event-details">'+

'<div class="article causes-details">'+
                '<div class="article-img">'+
                    '<img src="'+imageUrl+'event/'+''+data.image+'" alt="">'+
                '</div>'+
                            '</div>'+

          '<div class="single-event-details-row">'+


                 '<label>Judul:</label>'+

             '<p>'+data.title+'</p>'+
                                        '</div>'+

         '<div class="single-event-details-row">'+
                                            '<label>Deskripsi Konser:</label>'+
                                            '<p>'+data.desc+'</p>'+
                                        '</div>'+


             
                                                                             '</div>'+
                                        '</div>'+


                                                '</div>'+


              
            
   '<div id="tab_venue" class="tab-content">'+
          '<div class="flex flex-wrap justify-content-between">'+

          '<div class="single-event-details">'+                      

            '<div class="single-event-details-row">'+


                 '<label>Penyelenggara:</label>'+

             '<p>'+data.penyelenggara+'</p>'+

                                        '</div>'+

                                       

          '<div class="single-event-details-row">'+
                                            '<label>tanggal:</label>'+
                                            '<p>'+data.tanggal+'</p>'+
                                        '</div>'+
      '<div class="single-event-details-row">'+
                                            '<label>Waktu:</label>'+
                                            '<p>'+data.waktu+'</p>'+
                                        '</div>'+

            '<div class="single-event-details-row">'+
                                            '<label>Lokasi:</label>'+
                                            '<p>'+data.lokasi+'</p>'+
                                             
                                        '</div>'+
 

          

                                          '</div>'+
                                          '</div>'+
          '  <button class="btn btn-warning" ><a href="'+support+'trans/{{ $id }}" class="primary-button causes-donate">Transaksi</a></button>'+
        '</div>'+
                                     '</div>'+
                                 
                                '</div>'+

                            '</div>'+
                            '</div>'+
                    '</div>'+
                '</div>'
                            );
      })
</script>


<script>
    $.get(apiUrl+'tiket/edit/{{ $id }}', function (data) {
        console.log(data)
                 $('#detaile').append(
                  '<div>'+
                   '<div class="single-event-details-row">'+
                                            '<label>Harga:</label>'+
                                            '<p>'+data.harga+'</p>'+
                                        '</div>'+  
                                        '</div' 
                                        );
               })
</script>
<script>
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

<script>
  function TransferEdit(id)
  {
    console.log(id);

    $('.transfer').hide();
    $('.TransferEdit').show();
    // $('.DonationEdit').attr('hidden',false);
    $.ajax({
        url:apiUrl+'transfer/edit/'+id,
        type:'get',
        cache: true,
        contentType: false,
        processData: false,
        async:false,
        dataType: 'json',
        success:function(data){
          console.log(data.target);
          $('input#id').val(data.id);
          $('input#jumlah_tiket').val(data.jumlah_tiket);
          $('textarea#desc').val(data.desc);
          $('input#status').val(data.status);
          $('input#user').val(data.user);
          $('input#bank').val(data.bank);
          $('input#event_id').val(data.event_id);
          $('input#tiket_id').val(data.tiket_id);
          // $('input#date_target').val(data.date_target);
          // $('input#title').val(data.title);
        },
        complete: function() {
            // $('#indexCategory').attr('hidden', false);
        }
    });
  }
</script>




@endsection
@section('content')


<body class="tickets-page">
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="entry-header">
                        <h2 class="entry-title">Buy tickets</h2>

                        <ul class="breadcrumbs flex align-items-center">
                            <li><a href="#">Home</a></li>
                            <li>Buy tickets</li>
                        </ul><!-- .breadcrumbs -->
                    </div><!-- entry-header -->
                </div><!-- col-12 -->
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- page-header -->
      <div class="main-content">
        <div class="container">
            
               <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <ul class="tabs-nav flex">
                            <li class="tab-nav flex justify-content-center align-items-center active" data-target="#tab_details">Detail Konser</li>
                            <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_venue">Detail Lokasi</li>
                          <!--   <li class="tab-nav flex justify-content-center align-items-center" data-target="#tab_tiket">Pilih Tiket dan Bank</li> -->
                           
                        </ul><!-- tabs-nav -->


          
          


         <div id="details">
          <div id="detaile">
          </div>  
         </div>
     

              
  
        </div>
      </div>
    </div>
  </div>
</div>
</body>

    @endsection