jQuery(document).ready(function($) {
    $('#remove-cover-img').click(function(e){
        e.preventDefault();
        $(this).hide();
        $('#cover-img').hide();
        $('#wp_custom_attachment').attr('value', '');
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 21, // Creates a dropdown of 21 years to control year
        format: 'dd/mm/yyyy'
    });
    $('select').material_select();
});