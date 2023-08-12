<?php
    $idproducto = $compra->__get('id');
    $idusuario = $compra->__get('usuid');
    echo '<script type="module">';
    echo 'import { loadClickEvent } from "../Vista/js/Events.js";';
    /* echo 'let editarbtn = document.getElementById("editarCompra'.$idproducto.'");'; */
    echo 'let eliminarbtn = document.getElementById("eliminarCompra'.$idproducto.'");';
    echo 'const openLink = (url) => window.location.href = url;';
    /* echo 'loadClickEvent(editarbtn, openLink, "?c=carrito&a=crearEditar&proid='.$idproducto.'&usuid='.$idusuario.'");'; */
    echo 'loadClickEvent(eliminarbtn, openLink, "?c=carrito&a=eliminar&proid='.$idproducto.'&usuid='.$idusuario.'");';
    echo "</script>"
?>
