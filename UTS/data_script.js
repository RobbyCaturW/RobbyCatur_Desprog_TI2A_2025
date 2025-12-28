$(document).ready(function() {
    
    // Konfigurasi
    const STORAGE_KEY = 'library_loans';
    const DAILY_FINE_RATE = 2000; // Denda per hari

    // 1. Fungsi untuk menghitung denda
    /**
     * @param {string} dateDueStr
     * @param {string} dateReturnedStr
     * @returns {object}
     */
    function calculateFine(dateDueStr, dateReturnedStr) {
        if (!dateReturnedStr) {
            return { daysLate: 0, fine: 0, status: 'Active' };
        }

        const dateDue = new Date(dateDueStr);
        const dateReturned = new Date(dateReturnedStr);

        dateDue.setHours(0, 0, 0, 0);
        dateReturned.setHours(0, 0, 0, 0);
        if (dateReturned <= dateDue) {
            return { daysLate: 0, fine: 0, status: 'Returned On Time' };
        }
        const diffTime = Math.abs(dateReturned.getTime() - dateDue.getTime());
        const daysLate = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        const fine = daysLate * DAILY_FINE_RATE;

        return { daysLate: daysLate, fine: fine, status: 'Returned Late' };
    }

    // 2. Fungsi untuk menampilkan data peminjaman
    function renderLoanList() {
        $('#loadingMessage').hide();
        let loans = [];
        const storedLoans = localStorage.getItem(STORAGE_KEY);
        
        if (storedLoans) {
            try {
                loans = JSON.parse(storedLoans);
            } catch (e) {
                console.error("Error parsing loans from Local Storage:", e);
                localStorage.removeItem(STORAGE_KEY);
            }
        }

        const $loanList = $('#loanList');
        $loanList.empty();

        if (loans.length === 0) {
            $loanList.append('<p class="no-data-message"><i class="fas fa-box-open"></i> Belum ada data peminjaman tersimpan.</p>');
            return;
        }

        loans.reverse().forEach(loan => {
            const isReturned = loan.date_returned !== null;
            const dateForFineCalc = isReturned ? loan.date_returned : new Date().toISOString().split('T')[0];
            
            const fineResult = calculateFine(loan.date_due, dateForFineCalc);
            const fineDisplay = fineResult.fine.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            
            let statusText = '';
            let penaltyClass = '';
            let actionButtons = '';
            
            if (isReturned) {
                 if (fineResult.fine > 0) {
                     statusText = `Pengembalian Terlambat. Denda: ${fineDisplay} (${fineResult.daysLate} hari). (Aktual: ${loan.date_returned})`;
                     penaltyClass = 'has-penalty';
                 } else {
                     statusText = `Pengembalian Tepat Waktu. (Aktual: ${loan.date_returned})`;
                     penaltyClass = 'no-penalty';
                 }
                 actionButtons = `
                    <p class="returned-status"><i class="fas fa-check-circle"></i> Sudah Dikembalikan</p>
                 `;
            } else {
                const daysLate = fineResult.daysLate;
                if (daysLate > 0) {
                    statusText = `Terlambat ${daysLate} hari! Perkiraan Denda Saat Ini: ${fineDisplay}.`;
                    penaltyClass = 'has-penalty';
                } else {
                    statusText = `Buku masih dipinjam. Batas Kembali: ${loan.date_due}`;
                    penaltyClass = 'no-penalty';
                }
                actionButtons = `
                    <button class="return-btn" data-id="${loan.id}"><i class="fas fa-undo-alt"></i> Tandai Sudah Kembali</button>
                `;
            }

            const $loanItem = $('<div>')
                .addClass('loan-item')
                .attr('data-loan-id', loan.id)
                .html(`
                    <h3><i class="fas fa-bookmark"></i> ${loan.title} (${loan.year})</h3>
                    <h4><i class="fas fa-feather-alt"></i> Penulis: ${loan.author}</h4>
                    <p><strong><i class="fas fa-user-circle"></i> Peminjam:</strong> ${loan.name} (${loan.email})</p>
                    <p><strong><i class="fas fa-calendar-day"></i> Dipinjam:</strong> ${loan.date_borrowed}</p>
                    <p><strong><i class="fas fa-sticky-note"></i> Catatan:</strong> ${loan.notes || '-'}</p>
                    
                    <div class="penalty-info ${penaltyClass}">
                        <i class="fas fa-exclamation-triangle"></i> ${statusText}
                    </div>
                    
                    <div class="loan-actions">
                        ${actionButtons}
                        <button class="delete-btn" data-id="${loan.id}"><i class="fas fa-trash-alt"></i> Hapus Catatan</button>
                    </div>
                `)
                // Efek animasi jQuery
                .hide()
                .slideDown(400); 

            $loanList.append($loanItem);
        });

        $('.return-btn').on('click', handleReturn);
        $('.delete-btn').on('click', handleDelete);
    }

    // 3. Handler Tandai Kembali
    function handleReturn() {
        const loanId = parseInt($(this).data('id'));
        const dateReturned = prompt("Masukkan tanggal buku dikembalikan (YYYY-MM-DD):", new Date().toISOString().split('T')[0]);

        if (dateReturned && /^\d{4}-\d{2}-\d{2}$/.test(dateReturned)) {
            let loans = JSON.parse(localStorage.getItem(STORAGE_KEY));
            const loanIndex = loans.findIndex(loan => loan.id === loanId);

            if (loanIndex !== -1) {
                loans[loanIndex].date_returned = dateReturned;
                localStorage.setItem(STORAGE_KEY, JSON.stringify(loans));
                
                alert('Buku berhasil ditandai sudah kembali!');
                renderLoanList();
            }
        } else if (dateReturned !== null) {
            alert('Format tanggal tidak valid. Gunakan YYYY-MM-DD (Contoh: 2023-10-15).');
        }
    }

    // 4. Handler Hapus Catatan
    function handleDelete() {
        if (confirm('Anda yakin ingin menghapus catatan peminjaman ini secara permanen?')) {
            const loanId = parseInt($(this).data('id'));
            let loans = JSON.parse(localStorage.getItem(STORAGE_KEY));
            
            // Filter array untuk menghapus item yang sesuai ID
            loans = loans.filter(loan => loan.id !== loanId);
            
            localStorage.setItem(STORAGE_KEY, JSON.stringify(loans));
            
            // Animasi: hapus elemen dari DOM dengan efek slide up
            $(`.loan-item[data-loan-id="${loanId}"]`).slideUp(400, function() {
                $(this).remove();
                renderLoanList();
            });
        }
    }

    // Muat data saat halaman pertama kali dimuat
    renderLoanList();
});