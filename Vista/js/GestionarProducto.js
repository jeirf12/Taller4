const accionProducto = (idproducto, accion) => {
  let element = document.getElementById(`gestion${accion}${idproducto}`);
  if(element) {
    window.location.href = `?c=producto&a=${accion == 'editar' ? `crearEditar&proid=${idproducto}` : `eliminar&id=${idproducto}`}`;
  }
}

