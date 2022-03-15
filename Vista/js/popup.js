const Popup = {
  init() {
    this.hideTimeout = null;
    this.element = document.getElementById("myPopup");
  },
  show(state) {
    clearTimeout(this.hideTimeout);
    this.element.classList.remove("popup-invisible");
    if (state) {
      this.element.classList.add("popup-"+state);
    }

    this.hideTimeout = setTimeout(() => {
      this.element.classList.add("popup-invisible");
    }, 5000);
  }

};

document.addEventListener('DOMContentLoaded', () => Popup.init());

function openModal(){
    this.element = document.getElementById("myDropdown");
    this.element.classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.open-btn')) {
    var dropdowns = document.getElementsByClassName("dropdown-menu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
