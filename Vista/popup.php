<div class="modal">
  <div id="myModal" class="modal-content modal-invisible">
  <p><?php echo $this->message; ?></p>
  </div>
</div>
<?php
 echo '<script type="text/javascript">';
 echo 'document.addEventListener("DOMContentLoaded", () => Modal.show("'.$this->action.'"));';
 echo '</script>';
?>
