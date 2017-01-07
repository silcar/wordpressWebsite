jQuery(document).ready(function($) {
    $('#remove-cover-img').click(function(e){
        e.preventDefault();
        $(this).hide();
        $('#cover-img').hide();
        $('#wp_custom_attachment').attr('value', '');
    })
});