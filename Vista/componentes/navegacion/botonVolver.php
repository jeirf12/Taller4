<?php if(isset($isForm) && !$isForm): ?>
<a class="button-admin button-back btn-hover" type="submit" href="?c=producto&a=listar">Regresar</a>
<?php else: ?>
<a class="button-admin button-back btn-hover" type="submit" href="?c=sesion&a=iniciarSesion">Regresar</a>
<?php endif; ?>
