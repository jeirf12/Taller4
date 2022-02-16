<?php if(isset($isForm) && !$isForm): ?>
<a class="button-main button-danger" type="submit" href="?c=Sesion&a=volverprincipal">Regresar</a>
<?php else: ?>
<a class="button-back button-danger" type="submit" href="?c=Sesion&a=volver">Regresar</a>
<?php endif; ?>
