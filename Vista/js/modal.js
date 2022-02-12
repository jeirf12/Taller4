const openModal = document.getElementById("openModal");
const modalContent = document.getElementById("modal-content");
const close = document.getElementById("close");

openModal.addEventListener("click", () => {
  modalContent.classList.add("show");
});

close.addEventListener('click', () => {
  modalContent.classList.remove("show");
});
