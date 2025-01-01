<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        h1, h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Riwayat Prediksi</h1>

    <h2>Detail History</h2>
    <table>
        <tr>
            <th>Hasil Prediksi</th>
            <td>{{ $history->sleep_disorder }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $history->created_at->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <th>Usia</th>
            <td>{{ $history->age }}</td>
        </tr>
        <tr>
            <th>Durasi Tidur</th>
            <td>{{ $history->sleep_duration }} jam</td>
        </tr>
        <tr>
            <th>Tingkat Aktivitas Fisik</th>
            <td>{{ $history->physical_activity_level }}</td>
        </tr>
        <tr>
            <th>Detak Jantung</th>
            <td>{{ $history->heart_rate }} bpm</td>
        </tr>
        <tr>
            <th>Langkah Harian</th>
            <td>{{ $history->daily_steps }}</td>
        </tr>
        <tr>
            <th>Tekanan Darah (Sistolik / Diastolik)</th>
            <td>{{ $history->sistolik }} / {{ $history->diastolik }} mmHg</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $history->gender }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $history->occupation }}</td>
        </tr>
        <tr>
            <th>Kategori BMI</th>
            <td>{{ $history->bmi_category }}</td>
        </tr>
        <tr>
            <th>Kualitas Tidur</th>
            <td>{{ $history->quality_of_sleep }}</td>
        </tr>
        <tr>
            <th>Tingkat Stres</th>
            <td>{{ $history->stress_level }}</td>
        </tr>
    </table>

    <h2>Ringkasan Prediksi</h2>
    <p><strong>Hasil Prediksi:</strong> {{ $history->sleep_disorder }}</p>
</body>
</html>
