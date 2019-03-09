
jQuery(document).ready(function($){
    $('form#form-new-hmpost').validate();
    $('form#form-new-hmpost').on('submit',function(e){
        
        e.preventDefault();
        var form = $('form#form-new-hmpost').serialize();
        $('.notification.error').html('');
        $('.notification.success').html('');
        $('form#form-new-hmpost button[type=submit]').attr('disabled','disabled');
        $('.img-placeholder.loading').addClass('active');
        $.ajax({
            url: media.ajaxurl,
            method: 'POST',
            data: form,
                
        }).done(function(response){
            $('.notification').html('');
            $('form#form-new-hmpost button[type=submit]').removeAttr('disabled');
            if(response.success === false){
                $('.img-placeholder.loading').removeClass('active');
                if(jQuery.type(response.data) === 'object'){
                    
                    $(response.data).each(function(index,value){
                        $('.notification.error').append('<div>'+response.data+'</div>');
                    });
                }else{
                    $('.notification.error').append('<div>'+response.data+'</div>');
                }
                
            } else if(response.success === true){
                window.location.href = window.location.href;
                if($('input[name=action]').val() === 'create_hmpost'){
                    
                    $('input[name=action]').val('update_hmpost_post');
                    $('form#form-new-hmpost button[type=submit]').html('Update');

                    $('.notification.success').append('<div>Ads submit successfully for review. <br>Please wait...</div>');
                    
                }
                else{
                    $('.notification.success').append('<div>Ads updated submit successfully.</div>');
                }
            }
            
        }).fail(function(response){
            $('form#form-new-hmpost button[type=submit]').removeAttr('disabled');
            $('.img-placeholder.loading').removeClass('active');
            $('.notification.error').html('');
            $('.notification.error').html('<strong>ERROR: Network Error</strong5>')
        });
    });
});