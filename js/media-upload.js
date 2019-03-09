jQuery(document).ready(function($){

    var $formNotice = $('.form-notice');
    var $imgForm    = $('.image-form');
    var $imgNotice  = $imgForm.find('.image-notice');
    var $imgPreview = $imgForm.find('.image-preview');
    var $imgFile    = $imgForm.find('.image-file');

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
                if ( resp.success  ) {
                    $imgNotice.html('Successfully uploaded.');
            
                    var img = $('<img>', {

                        src: resp.data.url,
                        style: 'width:150px;',
                        
                    });

                    var input = $('<input>',{
                        type:   'hidden',
                        id:     resp.data.id,
                        name:   'photo_gallery[]',
                        value:  resp.data.id
                    })
                    var delete_link = $('<a>',{
                        href:'#' + resp.data.id ,
                        class: 'btn-delete-image'
                    });
                    var delete_icon = $('<i>',{
                        class: 'fa fa-times'
                    });
                    var list_item = $('<li>',{
                        'data-image-id' : resp.data.id,
                    });
                    
                    delete_link = $(delete_link).append(delete_icon).append(img);
                    var list_in_link = $(list_item).append(delete_link).append(input);
                    $imgPreview.append( list_in_link ).show();
            
                } else {
                    $imgNotice.html('Fail to upload image. Please try again.');
                }
                $('label[for=photo_file_selector]').show();

            }
        });
    });
    $imgForm.on( 'click', '.btn-delete-image', function(e) {
        e.preventDefault();
        
        var hash = $(this).attr('href');
        var id = hash.replace('#','');
        remove_gallery_image(id);
        //$(hash).remove();
        $('li[data-image-id='+id+']').remove();
        
        $(this).parent().html('');

    });
    
    function remove_gallery_image(id){

            $.ajax({
                url: media.ajaxurl,
                data: {
                    name:       id,
                    _wpnonce:   media.nonce,
                    action:     'delete_upload_attachment'
                },
                dataType: 'json',
                type: 'POST',
                beforeSend: function() {
                    $('[type=submit]').attr('disable','disabled');
                    $('label[for=photo_file_selector]').hide();
                    $imgNotice.html('Deleting please wait....');
                },
                success: function(resp) {
                    if ( resp.success ) {
                        $imgNotice.html('Image deleted successfully');
                
                    } else {
                        $imgNotice.html('Fail to delete image. Please try again.');
                        
                    }

                    $('label[for=photo_file_selector]').show();
                    $('button[type=submit]').removeAttr('disabled');

                },
                fail: function(){
                    $('label[for=photo_file_selector]').show();
                    $('[type=submit]').removeAttr('disabled');
                }
            });
    }
    function delete_gallery_image(id){

    }

});