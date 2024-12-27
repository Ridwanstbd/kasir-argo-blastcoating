function openEditModal(id, nama, layanan, harga, keterangan) {
  const modal = document.querySelector("#editBarang");

  document.getElementById("edit_idbarang").value = id;
  document.getElementById("edit_nama_barang").value = nama;
  document.getElementById("edit_layanan").value = layanan;
  document.getElementById("edit_harga").value = harga;
  document.getElementById("edit_keterangan").value = keterangan;

  window.modalSystem.openModal(modal);
}

function confirmDelete(id) {
  if (confirm("Apakah Anda yakin ingin menghapus barang ini?")) {
    const form = document.createElement("form");
    form.method = "POST";
    form.style.display = "none";

    const idInput = document.createElement("input");
    idInput.type = "hidden";
    idInput.name = "idbarang";
    idInput.value = id;

    const submitInput = document.createElement("input");
    submitInput.type = "hidden";
    submitInput.name = "hapusbarang";
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

      const hargaField = form.querySelector('input[name="harga"]');
      if (hargaField && hargaField.value < 0) {
        event.preventDefault();
        alert("Harga tidak boleh negatif");
      }
    });
  });
});
