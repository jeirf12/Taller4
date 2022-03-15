jQuery('document').ready(function($){
    var menuBtn = $('.menu-icon'),
      menu = $('.navigation ul'),
      header = $('.header'),
      inicioBtn = $('.nav-inicio'),
      aboutBtn = $('.nav-about'),
      productosBtn = $('.nav-productos'),
      contactoBtn = $('.nav-contacto'),
      inicioSesionbtn = $('.inicio-button'),
      container = $('.container'),
      bodycontact = $('.bodyContact'),
      containerabout = $('.container-about');
  
    container.click(() =>{
      if(menu.hasClass('show')) {
        inicioSesionbtn.removeClass('show');
        header.removeClass('showheader');
        menu.removeClass('show');
      }
    });
    containerabout.click(() =>{
      if(menu.hasClass('show')) {
        inicioSesionbtn.removeClass('show');
        header.removeClass('showheader');
        menu.removeClass('show');
      }
    });
    bodycontact.click(() =>{
      if(menu.hasClass('show')) {
        inicioSesionbtn.removeClass('show');
        header.removeClass('showheader');
        menu.removeClass('show');
      }
    });
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
      inicioSesionbtn.removeClass('show');
      header.removeClass('showheader');
      menu.removeClass('show');
    });
  
    aboutBtn.click(() =>{
      inicioSesionbtn.removeClass('show');
      header.removeClass('showheader');
      menu.removeClass('show');
    });
  
    productosBtn.click(() =>{
      inicioSesionbtn.removeClass('show');
      header.removeClass('showheader');
      menu.removeClass('show');
    });
    
    contactoBtn.click(() =>{
      inicioSesionbtn.removeClass('show');
      header.removeClass('showheader');
      menu.removeClass('show');
    });

    inicioSesionbtn.click(()=> {
      inicioSesionbtn.removeClass('show');
      header.removeClass('showheader');
      menu.removeClass('show');
    });
  });

