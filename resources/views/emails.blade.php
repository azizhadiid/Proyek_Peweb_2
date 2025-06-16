<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pesan Masuk</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); padding: 20px;">
        <h2 style="color: #0055a5;">Halo, Admin! 📬</h2>

        <p>Kamu menerima pesan baru melalui formulir kontak. Berikut detailnya:</p>

        <h3 style="margin-top: 30px; color: #333;">📄 Detail Pesan</h3>
        <p><strong>Nama:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Subjek:</strong> {{ $data['subject'] }}</p>
        <p><strong>Pesan:</strong></p>
        <p style="border-left: 4px solid #eda96d; padding-left: 12px; background: #f8f9fa; margin-top: 8px;">
            {{ $data['body'] }}
        </p>

        <div style="margin-top: 30px;">
            <a href="mailto:{{ $data['email'] }}" style="display: inline-block; background-color: #0055a5; color: #ffffff; padding: 10px 20px; border-radius: 4px; text-decoration: none;">
                Balas Email
            </a>
        </div>

        <p style="color: #aaa; font-size: 12px; text-align: center; margin-top: 40px;">
            Email ini dikirim secara otomatis oleh sistem RasaTangkit. Mohon untuk tidak membalas email ini secara langsung.
        </p>
    </div>
</body>
</html>
