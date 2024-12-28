function openEditModal(id, status, waktu) {
  const modal = document.querySelector("#editPesanan");

  document.getElementById("edit_idpesanan").value = id;
  document.getElementById("edit_status").value = status;
  document.getElementById("edit_waktu").value = waktu.replace(" ", "T"); // Convert MySQL datetime to HTML datetime-local

  window.modalSystem.openModal(modal);
}

function confirmDelete(id) {
  if (confirm("Apakah Anda yakin ingin menghapus pesanan ini?")) {
    const form = document.createElement("form");
    form.method = "POST";
    form.style.display = "none";

    const idInput = document.createElement("input");
    idInput.type = "hidden";
    idInput.name = "idpesanan";
    idInput.value = id;

    const submitInput = document.createElement("input");
    submitInput.type = "hidden";
    submitInput.name = "hapuspesanan";
    submitInput.value = "1";

    const csrfInput = document.createElement("input");
    csrfInput.type = "hidden";
    csrfInput.name = "csrf_token";
    csrfInput.value = document.querySelector('input[name="csrf_token"]').value;

    form.appendChild(idInput);
    form.appendChild(submitInput);
    form.appendChild(csrfInput);
    document.body.appendChild(form);
    form.submit();
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll("form");
  forms.forEach((form) => {
    form.addEventListener("submit", function (event) {
      const requiredFields = form.querySelectorAll("[required]");
      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          event.preventDefault();
          alert("Mohon isi semua field yang wajib diisi");
        }
      });

      const waktuField = form.querySelector('input[type="datetime-local"]');
      if (waktuField && waktuField.value) {
        const selectedTime = new Date(waktuField.value);
        const now = new Date();
        if (selectedTime < now) {
          event.preventDefault();
          alert("Waktu pesanan tidak boleh di masa lalu");
        }
      }
    });
  });
});
