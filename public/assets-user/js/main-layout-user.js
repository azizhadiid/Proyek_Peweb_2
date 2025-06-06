document.addEventListener("DOMContentLoaded", function () {
    const logoutButtons = document.querySelectorAll(".logout"); // Ambil semua tombol logout

    logoutButtons.forEach(function (logoutButton) {
        logoutButton.addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah logout langsung
            const logoutUrl = this.getAttribute("href"); // Ambil URL logout
            
            Swal.fire({
                title: "Apakah Anda yakin ingin logout?",
                text: "Anda akan keluar dari sesi saat ini.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, logout!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = logoutUrl; // Redirect jika dikonfirmasi
                }
            });
        });
    });
});
