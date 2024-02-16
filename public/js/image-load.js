document.addEventListener("DOMContentLoaded", function() {
    const loadingText = document.getElementById('loadingText');
    const studentImage = document.getElementById('studentImage');

    studentImage.addEventListener('load', function() {
        // Sembunyikan teks dan tampilkan gambar saat gambar selesai dimuat
        loadingText.style.display = 'none';
        studentImage.style.display = 'block';
    });

    studentImage.addEventListener('loading', function() {
        // Tampilkan teks saat gambar dimuat
        loadingText.style.display = 'block';
    });

    studentImage.addEventListener('error', function() {
        // Sembunyikan teks jika gambar gagal dimuat
        loadingText.style.display = 'none';
    });
});