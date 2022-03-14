jQuery('document').ready(function($){
    var menuBtn = $('.menu-icon'),
      menu = $('.navigation ul'),
      header = $('.header'),
      inicioBtn = $('.nav-inicio'),
      aboutBtn = $('.nav-about'),
      productosBtn = $('.nav-productos'),
      contactoBtn = $('.nav-contacto');
  
    menuBtn.click(() =>{
      if(menu.hasClass('show')){
        header.removeClass('showheader')
        menu.removeClass('show');
      }else{
        header.addClass('showheader')
        menu.addClass('show');
      }
    });
  
    inicioBtn.click(() =>{
      header.removeClass('showheader')
      menu.removeClass('show');
    });
  
    aboutBtn.click(() =>{
      header.removeClass('showheader')
      menu.removeClass('show')
    });
  
    productosBtn.click(() =>{
      header.removeClass('showheader')
      menu.removeClass('show')
    });
    
    contactoBtn.click(() =>{
      header.removeClass('showheader')
      menu.removeClass('show')
    });
    
  });