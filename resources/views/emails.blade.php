<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesan Baru dari Pelanggan | Rasa Tangkit</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            padding: 20px;
            margin: 0;
        }
        .email-wrapper {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        .email-header {
            background-color: #eda96d;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 0.5px;
        }
        .email-content {
            padding: 25px 20px;
        }
        .email-content h2 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #2d3436;
        }
        .email-content p {
            margin: 8px 0;
            font-size: 16px;
            line-height: 1.6;
        }
        .email-footer {
            background-color: #f1f2f6;
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #888;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #eda96d;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
        }
        @media (max-width: 600px) {
            .email-wrapper {
                border-radius: 0;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            <h1>Pesan Baru dari Pelanggan</h1>
        </div>
        <div class="email-content">
            <h2>Detail Pesan</h2>
            <p><span class="label">Nama:</span> {{ $data['name'] }}</p>
            <p><span class="label">Email:</span> {{ $data['email'] }}</p>
            <p><span class="label">Subjek:</span> {{ $data['subject'] }}</p>
            <p><span class="label">Pesan:</span></p>
            <p style="border-left: 4px solid #eda96d; padding-left: 12px; background: #f8f9fa;">
                {{ $data['body'] }}
            </p>

            <a href="mailto:{{ $data['email'] }}" class="button">Balas Email</a>
        </div>
        <div class="email-footer">
            &copy; {{ now()->year }} Rasa Tangkit · UMKM Lokal Jambi
        </div>
    </div>
</body>
</html>
