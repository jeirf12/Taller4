const accionCarroCompra = (idUsuario, idProducto, accion) => {
  let element = document.getElementById(`${accion}Compra${accion === 'ver' ? idUsuario : idProducto}`);
  if(element && accion !== 'ver') {
    window.location.href = `?c=carrito&a=${accion === 'editar' || accion === 'crear' ? `crearEditar` : `eliminar`}&proid=${idProducto}&usuid=${idUsuario}`;
  } else if(element && accion === 'ver') {
    window.location.href = `?c=carrito&a=listar&codUsu=${idUsuario}`;  
  }
}
