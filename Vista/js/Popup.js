const Popup = {
  init() {
    this.hideTimeout = null;
    this.element = document.getElementById("myPopup");
    this.content = document.getElementById("myPopupContent");
  },
  show(state, withButton) {
    clearTimeout(this.hideTimeout);
    this.element.classList.remove("popup-invisible");
    if (state) {
      this.content.classList.add("popup-"+state);
    }

    if(withButton) {
      document.getElementById('popup-cancel').onclick = () => {
        this.element.classList.add("popup-invisible");
      };
      document.getElementById('popup-ok').onclick = () => {
        this.element.classList.add("popup-invisible");
      };
    } else {
      this.hideTimeout = setTimeout(() => {
        this.element.classList.add("popup-invisible");
      }, 5000);
    }
  }
};

document.addEventListener('DOMContentLoaded', () => Popup.init());
