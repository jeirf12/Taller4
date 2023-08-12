<?php
    $productoid = $producto->__get('id');
    $usuarioid = isset($this->usuario) ? $this->usuario->__get('id') : "";
    echo '<script type="module">';
    echo 'import { loadClickEvent } from "../Vista/js/Events.js";';
    echo 'let card = document.getElementById("card'.$productoid.'");';
    echo 'let a = document.createElement("a");';
    echo 'a.setAttribute("class", "button-admin button-success btn-hover");';
    echo 'a.setAttribute("type", "submit");';
    echo 'a.textContent = "Agregar Carrito";';
    echo 'const openLink = (url) => window.location.href = url;';
    echo 'loadClickEvent(a, openLink, "?c=carrito&a=crearEditar&proid='.$productoid.'&usuid='.$usuarioid.'");';
    echo 'card.appendChild(a);';
    echo '</script>';
?>
