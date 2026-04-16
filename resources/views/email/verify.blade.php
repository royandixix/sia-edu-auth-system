<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
</head>
<body style="font-family: Arial; background:#f5f5f5; padding:20px;">

    <div style="max-width:500px; margin:auto; background:#fff; padding:20px; border-radius:10px;">
        
        <h2 style="text-align:center;">Verifikasi Akun</h2>

        <p>Halo,</p>
        <p>Terima kasih sudah mendaftar di sistem kami.</p>
        <p>Silakan klik tombol di bawah untuk verifikasi akun:</p>

        <div style="text-align:center; margin:30px 0;">
            <a href="{{ $link }}" 
               style="background:#000; color:#fff; padding:12px 20px; text-decoration:none; border-radius:5px;">
               Verifikasi Sekarang
            </a>
        </div>

        <p>Jika tombol tidak bekerja, gunakan link berikut:</p>
        <p>{{ $link }}</p>

        <hr>
        <small>Sistem Informasi Akademik</small>

    </div>

</body>
</html>