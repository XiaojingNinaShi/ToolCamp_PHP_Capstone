$(document).ready(function(){
    console.log('Page loaded!');

    $('.flash').slideDown('slow');
    
    setTimeout(function(){
        $('.flash').slideUp('slow');
    }, 2000);
})