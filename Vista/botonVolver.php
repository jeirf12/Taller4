<?php if(isset($isForm) && !$isForm): ?>
<button class="button-back button-danger" type="submit" action="?s=Sesion&a=volver">Regresar</button>
<?php else: ?>
<button class="button-danger" type="submit" action="?s=Sesion&a=volver">Regresar</button>
<?php endif; ?>
