$(document).ready(function () {
  // config
  const SERVER_URL = "submit_loan.php";
  const STORAGE_KEY = "library_loans";

  // tampilkan error
  function displayError(fieldName, message) {
    $(`div.error-message[data-for="${fieldName}"]`).text(message);
    $(`#${fieldName}`).addClass("input-error");
  }

  // bersihkan error
  function clearError(fieldName) {
    $(`div.error-message[data-for="${fieldName}"]`).text("");
    $(`#${fieldName}`).removeClass("input-error");
  }

  // validasi
  function validateForm() {
    let isValid = true;

    // bersihkan semua error sebelumnya
    $(".error-message").text("");
    $("input, textarea").removeClass("input-error");

    // get input
    const name = $("#name").val().trim();
    const email = $("#email").val().trim();
    const title = $("#title").val().trim();
    const author = $("#author").val().trim();
    const year = $("#year").val().trim();
    const dateBorrowed = $("#date_borrowed").val();
    const dateDue = $("#date_due").val().trim();
    const notes = $("#notes").val().trim();

    // VALIDASI NAMA
    if (name === "") {
      displayError("name", "Nama peminjam wajib diisi.");
      isValid = false;
    }

    // VALIDASI EMAIL
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === "") {
      displayError("email", "Email peminjam wajib diisi.");
      isValid = false;
    } else if (!emailRegex.test(email)) {
      displayError("email", "Format email tidak valid.");
      isValid = false;
    }

    // VALIDASI JUDUL & PENULIS
    if (title === "") {
      displayError("title", "Judul buku wajib diisi.");
      isValid = false;
    }
    if (author === "") {
      displayError("author", "Nama penulis wajib diisi.");
      isValid = false;
    }

    // VALIDASI TAHUN
    const currentYear = new Date().getFullYear();
    if (year === "") {
      displayError("year", "Tahun terbit wajib diisi.");
      isValid = false;
    } else if (parseInt(year) > currentYear || parseInt(year) < 1000) {
      displayError(
        "year",
        `Tahun terbit harus antara 1000 dan ${currentYear}.`
      );
      isValid = false;
    }

    // VALIDASI TANGGAL PINJAM
    if (dateBorrowed === "") {
      displayError("date_borrowed", "Tanggal dipinjam wajib diisi.");
      isValid = false;
    }

    // VALIDASI TANGGAL KEMBALI & LOGIKA
    if (dateDue === "") {
      displayError("date_due", "Tanggal kembali wajib diisi.");
      isValid = false;
    } else if (
      dateBorrowed !== "" &&
      new Date(dateDue) < new Date(dateBorrowed)
    ) {
      displayError("date_due", "Tanggal kembali harus setelah tanggal pinjam.");
      isValid = false;
    }

    // VALIDASI CATATAN
    if (notes === "") {
      displayError("notes", "Catatan peminjaman wajib diisi.");
      isValid = false;
    } else if (notes.length <= 10) {
      displayError("notes", "Catatan harus lebih dari 10 karakter.");
      isValid = false;
    }
    return isValid;
  }

  // event listener untuk form submit
  $("#loanForm").on("submit", function (event) {
    event.preventDefault();
    if (validateForm()) {
      // kirim ke PHP
      const formData = $(this).serialize();

      // Tampilkan loading/disable tombol
      const $submitButton = $("#submitButton");
      $submitButton
        .prop("disabled", true)
        .html('<i class="fas fa-spinner fa-spin"></i> Memproses...');

      // Kirim data
      $.ajax({
        url: SERVER_URL,
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response.status === "success") {
            let loans = [];
            const storedLoans = localStorage.getItem(STORAGE_KEY);

            if (storedLoans) {
              try {
                loans = JSON.parse(storedLoans);
              } catch (e) {
                console.error("Error parsing stored data:", e);
              }
            }

            // Tambahkan ID unik dan status pengembalian
            const newLoanData = {
              ...response.data,
              id: Date.now(),
              date_returned: null,
            };

            loans.push(newLoanData);
            localStorage.setItem(STORAGE_KEY, JSON.stringify(loans));

            alert(response.message);
            $("#loanForm")[0].reset(); // Reset formulir
          } else {
            alert("Gagal memproses data: " + response.message); // status tetap 200
          }
        },
        error: function (xhr, status, error) {
          alert("Terjadi kesalahan saat berkomunikasi dengan server.");
          console.error("AJAX Error:", status, error);
        },
        complete: function () {
          $submitButton
            .prop("disabled", false)
            .html('<i class="fas fa-save"></i> Simpan Peminjaman');
        },
      });
    }
  });
});
