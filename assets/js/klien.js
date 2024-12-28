function openEditModal(id, nama, noTelepon, alamat) {
  const modal = document.querySelector("#editKlien");

  document.getElementById("edit_idklien").value = id;
  document.getElementById("edit_nama_klien").value = nama;
  document.getElementById("edit_no_telepon").value = noTelepon;
  document.getElementById("edit_alamat").value = alamat;

  window.modalSystem.openModal(modal);
}

function confirmDelete(id) {
  if (confirm("Apakah Anda yakin ingin menghapus data klien ini?")) {
    const form = document.createElement("form");
    form.method = "POST";
    form.style.display = "none";

    const idInput = document.createElement("input");
    idInput.type = "hidden";
    idInput.name = "idklien";
    idInput.value = id;

    const submitInput = document.createElement("input");
    submitInput.type = "hidden";
    submitInput.name = "hapusklien";
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

      const noTeleponField = form.querySelector('input[name="noTelepon"]');
      if (noTeleponField && !/^[0-9]+$/.test(noTeleponField.value)) {
        event.preventDefault();
        alert("Nomor telepon hanya boleh berisi angka");
      }
    });
  });
});
