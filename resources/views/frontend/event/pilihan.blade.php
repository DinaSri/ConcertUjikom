@extends('layouts.front')
@section('scripts')
<script>
  $('.unPublished').click( function() {
$.ajax({

url: "index.php?publish=" + pkey,
success: function(msg){
  $('.unPublished').hide();  
  $('.Published').show();  
}
});

$('.Published').click( function() {
$.ajax({
url: "index.php?unpublish=" + pkey,
success: function(msg){
  $('.Published').hide();  
  $('.unPublished').show();  
}
});
</script>

<script>
  add_action( 'edit_form_top', 'wpmudev_top_form_edit_button' );
function wpmudev_top_form_edit_button( $post ) {

    $status = get_post_status( $post->ID );
    if('publish' == $status) {
        echo '<a href="#" id="custom_publish_button" class="button custom_publish_button">Un-Publish</a>';
        //change_post_status($post_id, 'draft');
    } elseif ('draft' == $status) {
        echo '<a href="#" id="custom_publish_button" class="button custom_publish_button">Publish</a>';
        //change_post_status($post_id, 'publish');
    }
}

function change_post_status($post_id, $status){
    $current_post = get_post( $post_id, 'ARRAY_A' );
    $current_post['post_status'] = $status;
    wp_update_post($current_post);
}
</script>
    <!-- ajax function publish and unpublished -->
<script>
  var flag_ok = false;

$('#publish').on('click', function (e) {
    if ( ! flag_ok ) {
        e.preventDefault();

        var url = shiftajax.ajaxurl;
        var shift = $('#post_ID').val();

        var data = {
            'action': 'wpaesm_check_for_schedule_conflicts_before_publish',
            'shift': shift,
        };

        $.post(url, data, function (response) {
            if( response.action == 'go' ) {
                // there aren't any scheduling conflicts, so we can publish the post
                //$('#hidden_post_status').val('publish'); 
                flag_ok = true;
                $('#publish').trigger('click');
            } else {
                // there are scheduling conflicts, so ask the user if they want to publish
                if (confirm(response.message)) {
                    //$('#hidden_post_status').val('publish');
                    flag_ok = true;
                    $('#publish').trigger('click');
                } else {
                    // do nothing
                }
            }
        });    

    }    

});
</script>
<script>
  $(document).ready(function() {
  $("#results" ).load( "fetch_pages.php"); //load initial records
  
  //executes code below when user click on pagination links
  $("#results").on( "click", ".pagination a", function (e){
    e.preventDefault();
    $(".loading-div").show(); //show loading element
    var page = $(this).attr("data-page"); //get page number from link
    $("#results").load("fetch_pages.php",{"page":page}, function(){ //get content from PHP page
      $(".loading-div").hide(); //once done, hide loading element
    });
    
  });
});
</script>
<script>
  $.get(baseUrl+'masterbank', function(data) {
    $('#selectBank').empty();
    $.each(data.data, function(index, value) {
      $('#selectBank').append(
        '<input type="radio" name="bank_id" value="'+value.id+'"><img height="100" width="100" src="'+imageUrl+'master/'+''+value.image+'"/>&nbsp&nbsp&nbsp&nbsp'
      );
      console.log(value.id); 
    })
  });

  $('#createData').submit(function(e){
      var formData    = new FormData($('#createData')[0]);
      e.preventDefault();
      $.ajax({
          url: baseUrl+'transfer',
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
<div class="section" id="createFormTransfer">
  <div class="container">
    <div class="row">
      <div class="card">
        <div class="header">
        </div>
          <div class="container-fluid">
            <form enctype="multipart/form-data" id="createData">
            {{ csrf_field() }}

            <br>
            <div class="form-group">
              <label class="control-label">Nominal</label>
              <input type="number" class="form-control border-input" placeholder="Rp. " name="nominal" id="nominal" required>
            </div>

            <div class="form-group">
              <label class="control-label">Description</label>
              <textarea name="desc" class="form-control border-input"></textarea>
            </div>

            <label class="control-label">Pilih Bank</label>
            <div class="form-group" id="selectBank">
            </div>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <input type="hidden" name="donation_id" value="{{ $id }}" id="title">

            <input type="hidden" value="Belum Terverifikasi" name="status" id="status">

            <div class="form-group">
              <button class="btn btn-success" type="submit">Transfer</button>
            </div>

          </form>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection