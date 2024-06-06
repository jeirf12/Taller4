<div id="myPopup" class="popup popup-invisible">
  <div id="myPopupContent" class="popup-content">
    <div class="popup-content-main">
      <span class="popup-message-content">
        <?php if($this->action == "success"): ?>
          <i class="fa-solid fa-circle-check"></i>
        <?php elseif($this->action == "warning"): ?>
          <i class="fa-solid fa-circle-exclamation"></i>
        <?php elseif($this->action == "error"): ?>
          <i class="fa-solid fa-circle-xmark"></i>
        <?php endif; ?>
        <p id="message-icon-popup" class="icon-message"></p>
      </span>
      <span class="popup-close">&times;</span>
    </div>
    <div id="popup-buttons" class="popup-buttons popup-buttons-invisible">
      <a id="popup-cancel" class="button-admin button-red btn-hover">Cancelar</a>
      <a id="popup-ok" class="button-admin button-google btn-hover">Acepto</a>
    </div>
  </div>
</div>
