$(document).ready(function(){
    // Create Category
    $('#createFormCategory').attr('hidden',true);
    $('#changeViewCategory').on('click',function() {
        $('.categories').attr('hidden', true);
        $('#createFormCategory').attr('hidden',false);
    });
    $('#backViewCategory').on('click',function() {
        $('#indexCategory').attr('hidden', false);
        $('#createFormCategory').attr('hidden',true);
        
    });


  // Create Event
    $('#createFormEvent').attr('hidden',true);
    $('#changeViewEvent').on('click',function() {
        $('.event').attr('hidden', true);
        $('#createFormEvent').attr('hidden',false);
    });
    $('#backViewEvent').on('click',function() {
        $('#indexEvent').attr('hidden', false);
        $('#createFormEvent').attr('hidden',true);
        
    });

    // Create Master Bank
    $('#createFormMasterBank').attr('hidden',true);
    $('#changeViewMasterBank').on('click',function() {
        $('.masterbank').attr('hidden', true);
        $('#createFormMasterBank').attr('hidden',false);
    });
    $('#backViewMasterBank').on('click',function() {
        $('#indexMasterBank').attr('hidden', false);
        $('#createFormMasterBank').attr('hidden',true);
        
    });

    // Create User
    $('#createFormUser').attr('hidden',true);
    $('#changeViewUser').on('click',function() {
        $('.user').attr('hidden', true);
        $('#createFormUser').attr('hidden',false);
    });
    $('#backViewUser').on('click',function() {
        $('#indexUser').attr('hidden', false);
        $('#createFormUser').attr('hidden',true);
        
    });

   

    // Create Bank
    $('#createFormBank').attr('hidden',true);
    $('#changeViewBank').on('click',function() {
        $('.bank').attr('hidden', true);
        $('#createFormBank').attr('hidden',false);
    });
    $('#backViewBank').on('click',function() {
        $('#indexBank').attr('hidden', false);
        $('#createFormBank').attr('hidden',true);
        
    });

    // Create Transfer
    $('#createFormTransfer').attr('hidden',true);
    $('#changeViewTransfer').on('click',function() {
        $('.transfer').attr('hidden', true);
        $('#createFormTransfer').attr('hidden',false);
    });
    $('#backViewTransfer').on('click',function() {
        $('#indexTransfer').attr('hidden', false);
        $('#createFormTransfer').attr('hidden',true);
        
    });

  
    // View
    $('#categories').click(function() {
        $('.categories').show();
        $('#createFormCategory').attr('hidden',true);
        $('#indexCategory').attr('hidden', false);
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

});

