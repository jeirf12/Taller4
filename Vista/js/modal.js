const openModal = document.getElementById("openModal");
const modalContent = document.getElementById("modal-content");
const close = document.getElementById("close");

const open = () => {
  openModal.addEventListener("click", () => {
    modalContent.classList.add("show");
  });
  return true;
}

const closs = () => {
  close.addEventListener('click', () => {
    modalContent.classList.remove("show");
  });
  return true;
}

