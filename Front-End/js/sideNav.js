$('.snavbar').on('click',function(){
    $('.side-nav').toggleClass('ssbar');
})

$('.snavbarx').on('click',function(){
    $('.side-nav').toggleClass('ssbarx');
    $('.content').toggleClass('contentx');
    $('.footerxxx').toggleClass('foot');
})

$('.mainmenu').on('click',function(){
    var x = $(this);
    x.find('.collapsible-body').toggleClass('showsbxxx');
    x.toggleClass('actives');
})


