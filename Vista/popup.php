<div class="modal">
  <div id="myModal" class="modal-content modal-invisible">
    <?php if($this->action == "success"): ?>
    <i class="fa-solid fa-circle-check"></i>
    <?php elseif($this->action == "warning"): ?>
    <i class="fa-solid fa-circle-exclamation"></i>
    <?php elseif($this->action == "error"): ?>
    <i class="fa-solid fa-circle-xmark"></i>
    <?php endif; ?>
    <p class="icon"><?php echo $this->message; ?></p>
  </div>
</div>
<?php
 echo '<script type="text/javascript">';
 echo 'document.addEventListener("DOMContentLoaded", () => Modal.show("'.$this->action.'"));';
 echo '</script>';
?>
