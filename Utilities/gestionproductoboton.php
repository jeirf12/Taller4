<?php
    $idproducto = $producto->__get('id');
    echo '<script type="module">';
    echo 'import { loadClickEvent } from "../Vista/js/Events.js";';
    echo 'let editarbtn = document.getElementById("gestioneditar'.$idproducto.'");';
    echo 'let eliminarbtn = document.getElementById("gestioneliminar'.$idproducto.'");';
    echo 'const openLink = (url) => window.location.href = url;';
    echo 'loadClickEvent(editarbtn, openLink, "?c=producto&a=crearEditar&proid='.$idproducto.'");';
    echo 'loadClickEvent(eliminarbtn, openLink, "?c=producto&a=eliminar&id='.$idproducto.'");';
    echo "</script>"
?>
