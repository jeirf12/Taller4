<?php
    $idusuario = $this->usuario->__get('id');
    echo '<script type="module">';
    echo 'import { loadClickEvent } from "../Vista/js/Events.js";';
    echo 'let verbtn = document.getElementById("carritoid'.$idusuario.'");';
    echo 'const openLink = (url) => window.location.href = url;';
    echo 'loadClickEvent(verbtn, openLink, "?c=carrito&a=listar&codUsu='.$idusuario.'");';
    echo "</script>"
?>
