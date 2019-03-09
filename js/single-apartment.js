jQuery(document).ready(function($){
    $('#slides>.slide').on('click',function(){
        var img = $(this).data('img');
        $('#slides>.slide').removeClass('active');
        $(this).addClass('active');
        $('#photo-preview>img').attr('src',img);
    });
});