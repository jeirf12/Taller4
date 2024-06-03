<div id="myPopup" class="popup popup-invisible">
  <div id="myPopupContent" class="popup-content">
    <span class="popup-close">&times;</span>
    <?php if($this->action == "success"): ?>
    <i class="fa-solid fa-circle-check"></i>
    <?php elseif($this->action == "warning"): ?>
    <i class="fa-solid fa-circle-exclamation"></i>
    <?php elseif($this->action == "error"): ?>
    <i class="fa-solid fa-circle-xmark"></i>
    <?php endif; ?>
    <p class="icon-message"><?php echo $this->message; ?></p>
    <?php if(isset($this->isDelete) && $this->isDelete == true): ?>
      <div class="popup-buttons">
        <a id="popup-cancel" class="button-admin button-red btn-hover" href="">Cancelar</a>
        <a id="popup-ok" class="button-admin button-google btn-hover" href="">Acepto</a>
      </div>
    <?php endif; ?>
  </div>
</div>
<script type="text/javascript">
  <?php if(isset($this->isDelete) && $this->isDelete == true): ?>
    document.addEventListener("DOMContentLoaded", () => Popup.show("<?php echo $this->action ?>", true))
  <?php else: ?>
    document.addEventListener("DOMContentLoaded", () => Popup.show("<?php echo $this->action ?>"))
  <?php endif; ?>
</script>
