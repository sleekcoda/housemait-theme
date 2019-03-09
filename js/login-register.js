jQuery(document).ready(function($){
    $('form#register').validate();
    $('#register').on('submit',function(e){

        e.preventDefault();
        var formData = $('form#register').serialize();
        var url = $('#url').val();
        $('form#register input[type=submit]').attr('disabled','disabled');

        $('form#register').addClass('wait');
        $('.img-placeholder.loading').addClass('active');
        $.ajax({

            url: housemait.ajaxurl,
            method: 'post',
            data: formData

        }).done(function(response){

            $('.notification').html('');
            $('form#register').removeClass('wait');

            if(response.success === false){

                $('form#register input[type=submit]').removeAttr('disabled'); 
                $('.img-placeholder.loading').removeClass('active');
                $(response.data).each(function(index,value){
                    $('.notification.error').append('<div>'+value+'</div>');
                });

            } else{

                $('.notification.success').append('<div>Registration successful. Please wait....</div>');
                window.location.href = response.data;

            }
            
        }).fail(function(){

            $('form#register').removeClass('wait');
            $('form#register input[type=submit]').removeAttr('disabled');
            $('.img-placeholder.loading').removeClass('active');
            
            $('.notification.error').html('');
            $('.notification.error').html('<strong>ERROR: Network Error</strong5>');

        });
    });

    $('#login').on('submit',function(e){

        e.preventDefault();
        var formData = $('form#login').serialize();
        var url = $('#url').val();
        $(this).addClass('wait');
        $('form#login input[type=submit]').attr('disabled','disabled');
        $('.img-placeholder.loading').addClass('active');
        $.ajax({

            url: housemait.ajaxurl,
            method: 'post',
            data: formData

        }).done(function(response){

            $('.notification').text('');
            $('form#login').removeClass('wait');

            if(response.success === false){

                $('.img-placeholder.loading').removeClass('active');
                $('.notification.error').html('<div>'+response.data+'</div>');
                $('form#login input[type=submit]').removeAttr('disabled');

            } else if(response.success === true){
                $('.notification.success').html('<div>Welcome, please wait</div>');
                window.location.href = response.data;
            }
            
        }).fail(function(){

            $('form#login').removeClass('wait');
            $('form#login input[type=submit]').removeAttr('disabled');
            $('.img-placeholder.loading').removeClass('active');
            $('.notification.error').html('');
            $('.notification.error').html('<strong>ERROR: Network Error</strong5>');

        });
    });

    jQuery('input').on('focus',function(){

        var label = jQuery(this).attr('id');
        jQuery('label[for='+label+']').addClass('active');

    });

    jQuery('input').on('blur',function(){

        var label = jQuery(this).attr('id');
        var val = jQuery(this).val();

        if( val === null || val === ""){
            jQuery('label[for='+label+']').removeClass('active');
        }

    });
    

});