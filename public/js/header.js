$(document).ready( function(){
    $('#lang').change(function(){
        let lang = $(this).val();
        location.href = '/' + lang + get_page_url();
    });
});