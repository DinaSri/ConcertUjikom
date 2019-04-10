$(document).ready(function(){
    // Create Category
    // $('#createFormCategory').attr('hidden',true);
    $('#changeViewCategory').on('click',function() {
        $('.categories').hide();
        $('#createFormCategory').show();
    });
    $('#backViewCategory').on('click',function() {
        $('#indexCategory').attr('hidden', false);
        $('#createFormCategory').attr('hidden',true);
        
    });

    // Create Category
    // $('#createFormCategory').attr('hidden',true);
    $('#changeViewKatiket').on('click',function() {
        $('.katiket').hide();
        $('#createFormKatiket').show();
    });
    $('#backViewKatiket').on('click',function() {
        $('#indexKatiket').attr('hidden', false);
        $('#createFormKatiket').attr('hidden',true);
        
    });


      



    // Create Master Bank
    // $('#createFormMasterBank').attr('hidden',true);
    $('#changeViewMasterBank').on('click',function() {
        $('.masterbank').hide();
        $('#createFormMasterBank').show();
    });
    $('#backViewMasterBank').on('click',function() {
        $('#indexMasterBank').attr('hidden', false);
        $('#createFormMasterBank').attr('hidden',true);
        
    });


    // Create User
    // $('#createFormUser').attr('hidden',true);
    $('#changeViewUser').on('click',function() {
        $('.user').hide();
        $('#createFormUser').show();
    });
    $('#backViewUser').on('click',function() {
        $('#indexUser').attr('hidden', false);
        $('#createFormUser').attr('hidden',true);
        
    });

   
    // Create Bank
    // $('#createFormBank').attr('hidden',true);
    $('#changeViewBank').on('click',function() {
        $('.bank').hide();
        $('#createFormBank').show();
    });
    $('#backViewBank').on('click',function() {
        $('#indexBank').attr('hidden', false);
        $('#createFormBank').attr('hidden',true);
        
    });

    // Create Transfer
    // $('#createFormTransfer').attr('hidden',true);
    $('#changeViewTransfer').on('click',function() {
        $('.transfer').hide();
        $('#createFormTransfer').show();
    });
    $('#backViewTransfer').on('click',function() {
        $('#indexTransfer').attr('hidden', false);
        $('#createFormTransfer').attr('hidden',true);
        
    });

    // Create Event
    // $('#createFormEvent').attr('hidden',true);
    $('#changeViewEvent').on('click',function() {
        $('.event').hide();
        $('#createFormEvent').show();
    });
    $('#backViewEvent').on('click',function() {
        $('#indexEvent').attr('hidden', false);
        $('#createFormEvent').attr('hidden',true);
        
    });


       // Create Tiket
    // $('#createFormEvent').attr('hidden',true);
    $('#changeViewTiket').on('click',function() {
        $('.tiket').hide();
        $('#createFormTiket').show();
    });
    $('#backViewTiket').on('click',function() {
        $('#indexTiket').attr('hidden', false);
        $('#createFormTiket').attr('hidden',true);
        
    });

    //============================================================================================== Tampilan
    $('#categories').click(function() {
        $('.categories').show();
        $('#createFormCategory').attr('hidden',true);
        $('#indexCategory').attr('hidden', false);
    });

   $('#katiket').click(function() {
        $('.katiket').show();
        $('#createFormKatiket').attr('hidden',true);
        $('#indexKatiket').attr('hidden', false);
    });

    $('#masterbank').click(function() {
        $('.masterbank').show();
        $('#createFormMasterBank').attr('hidden',true);
        $('#indexMasterBank').attr('hidden', false);
    });

    $('#user').click(function() {
        $('.user').show();
        $('#createFormUser').attr('hidden',true);
        $('#indexUser').attr('hidden', false);
    });

 

    $('#bank').click(function() {
        $('.bank').show();
        $('#createFormBank').attr('hidden',true);
        $('#indexBank').attr('hidden', false);
    });

    $('#transfer').click(function() {
        $('.transfer').show();
        $('#createFormTransfer').attr('hidden',true);
        $('#indexTransfer').attr('hidden', false);
    });

    $('#event').click(function() {
        $('.event').show();
        $('#createFormEvent').attr('hidden',true);
        $('#indexEvent').attr('hidden', false);
    });


      $('#tiket').click(function() {
        $('.tiket').show();
        $('#createFormTiket').attr('hidden',true);
        $('#indexTiket').attr('hidden', false);
    });

});

