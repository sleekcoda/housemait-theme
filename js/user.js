jQuery(document).ready(function($){

    var $formNotice = $('.form-notice');
    var $imgForm    = $('.image-form');
    var $imgNotice  = $imgForm.find('.image-notice');
    var $imgPreview = $imgForm.find('#image-preview');
    var $imgFile    = $imgForm.find('.image-file');

    var $delete = $imgForm.find('#delete');
    $('#form-update-user').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url: media.ajaxurl,
            type: 'POST',
            data: $('#form-update-user').serialize(),
            beforeSend: function(){
                $('.img-placeholder.loading').addClass('active');
                $('.notification.error').html('');
                $('.notification.success').html('');
                $('label[for=photo_file_selector]').hide();
            },
            success:    function(response){
                $('.img-placeholder.loading').removeClass('active');
                if(response.success===true){
                    window.location.href = window.location.href;
                    $('label[for=photo_file_selector]').hide();                    
                    $('.notification.error').html('<p class="color:green;">Profile updated successful</p>');                   

                }else{
                    if(jQuery.type(response.data) === 'object'){
                    
                        $(response.data).each(function(index,value){
                            $('.notification.error').append('<div>'+response.data+'</div>');
                        });
                    }else{
                        $('.notification.error').append('<div>'+response.data+'</div>');
                    } 
                }
            },
            fail:       function(){
                $('.img-placeholder.loading').removeClass('active');
                $('.notification.error').append('<p>Network error</p>');
            }
        });
    });
    $imgFile.on('change', function(e) {
        e.preventDefault();
    
        var formData = new FormData();
    
        formData.append('action', 'upload-attachment');
        formData.append('async-upload', $imgFile[0].files[0]);
        formData.append('name', $imgFile[0].files[0].name);
        formData.append('_wpnonce', media.nonce);
    
        $.ajax({
            url: media.upload_url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            type: 'POST',
            beforeSend: function() {
                $('label[for=photo_file_selector]').hide();
                $imgNotice.html('Uploading&hellip;').show();
            },
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
            
                if ( myXhr.upload ) {
                    myXhr.upload.addEventListener( 'progress', function(e) {
                        if ( e.lengthComputable ) {
                            var perc = ( e.loaded / e.total ) * 100;
                            perc = perc.toFixed(2);
                            $imgNotice.html('Uploading&hellip;(' + perc + '%)');
                        }
                    }, false );
                }
            
                return myXhr;
            },
            fail:function(){
                $('label[for=photo_file_selector]').show();
            },
            success: function(resp) {

                $('label[for=photo_file_selector]>span').show();
                if ( resp.success ) {
            
                    var container = $('<div>',{
                        style: 'height:120px;width:100px;background-image:url('+ resp.data.url+');background-size:cover;',
                        'data-src': resp.data.url
                    });
                    var delete_button = $('<button>',{
                        id:     'delete',
                        style: 'border:none;background-color:transparent;padding:5px;color:red;'
                    });
                    

                    var icon = $('<i>',{
                        class: 'fa fa-times'
                    });
                    var input = $('<input>',{
                        type:   'hidden',
                        id:     resp.data.id,
                        name:   'avata',
                        value:  resp.data.id
                    });

                    var button = delete_button.append(icon);
                    var avata = container.append(input).append(button);
                    
                    $imgPreview.html( avata ).show();

                    $imgNotice.html('Successfully uploaded.');
            
                } else {
                    $imgNotice.html('Fail to upload image. Please try again.');
                }
                $('label[for=photo_file_selector]').show();

            }
        });
    });
    $delete.on('click',function(e){
        e.preventDefault();
        delete_image();
    });
    function delete_image(){
        $.ajax({
            url: media.ajaxurl,
            type: 'POST',
            data: {
                action: 'delete_upload_attachment',
                name:   $('input[name=avata]').val(),
                _wpnonce: media.nonce
            },
            beforeSend: function(){
                $imgNotice.html('Removing please wait....');
                $('label[for=photo_file_selector]').hide();
            },
            success:    function(response){
                if(response.success===true){

                    $('label[for=photo_file_selector]').show();                    
                    $imgPreview.html('');                   

                }else{
                    $imgPreview.html(''); 
                }
            },
            fail:       function(){}
        });
    }
});