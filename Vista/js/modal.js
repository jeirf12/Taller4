const Modal = {
  init() {
    this.hideTimeout = null;
    this.element = document.getElementById("myModal");
  },
  show(state) {
    clearTimeout(this.hideTimeout);
    this.element.classList.remove("modal-invisible");
    if (state) {
      this.element.classList.add("modal-"+state);
    }

    this.hideTimeout = setTimeout(() => {
      this.element.classList.add("modal-invisible");
    }, 5000);
  }

};

document.addEventListener('DOMContentLoaded', () => Modal.init());
