class Modal {
  constructor() {
    this.init();
  }

  init() {
    document.addEventListener("click", (e) => {
      const trigger = e.target.closest("[data-modal-target]");
      if (trigger) {
        const modalId = trigger.getAttribute("data-modal-target");
        this.openModal(document.querySelector(modalId));
      }
    });

    document.addEventListener("click", (e) => {
      if (
        e.target.matches("[data-modal-close]") ||
        e.target.classList.contains("modal") ||
        e.target.classList.contains("cancel-btn")
      ) {
        const modal = e.target.closest(".modal");
        if (modal) {
          this.closeModal(modal);
        }
      }
    });

    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") {
        const modal = document.querySelector(".modal.active");
        if (modal) {
          this.closeModal(modal);
        }
      }
    });
  }

  openModal(modal) {
    if (!modal) return;
    modal.classList.add("active");
    this.addBackdrop();
  }

  closeModal(modal) {
    if (!modal) return;
    modal.classList.remove("active");
    this.removeBackdrop();

    const form = modal.querySelector("form");
    if (form) form.reset();
  }

  addBackdrop() {
    document.body.classList.add("modal-open");
  }

  removeBackdrop() {
    document.body.classList.remove("modal-open");
  }
}

document.addEventListener("DOMContentLoaded", () => {
  window.modalSystem = new Modal();
});
