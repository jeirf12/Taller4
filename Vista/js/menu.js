jQuery('document').ready(function($){
    var menuBtn = $('.menu-icon'),
      navul = $('.navigation ul li'),
      header = $('.header'),
      inicioBtn = $('.nav-inicio'),
      aboutBtn = $('.nav-about'),
      productosBtn = $('.nav-productos'),
      contactoBtn = $('.nav-contacto');
  
    menuBtn.click(() =>{
      if(navul.hasClass('show')){
        header.removeClass('showheader')
        navul.removeClass('show');
      }else{
        header.addClass('showheader')
        navul.addClass('show');
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