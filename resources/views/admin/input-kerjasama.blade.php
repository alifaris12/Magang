<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Kerjasama</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
            min-height:100vh; padding:20px; line-height:1.6;
        }
        .container { max-width:800px; margin:0 auto; background:rgba(255,255,255,.95);
            backdrop-filter:blur(10px); border-radius:20px; padding:60px 40px 40px 40px;
            box-shadow:0 20px 40px rgba(255,140,0,.2), 0 10px 20px rgba(0,0,0,.1), inset 0 1px 0 rgba(255,255,255,.6);
            border:1px solid rgba(255,255,255,.2); animation:fadeIn 1s ease-in-out; position:relative;
        }
        @keyframes fadeIn { 0%{opacity:0; transform:scale(.95)} 100%{opacity:1; transform:scale(1)} }

        .back-button {
            position:absolute; top:20px; left:20px;
            background:linear-gradient(135deg,#111,#333);
            color:#fff; border:none; border-radius:8px;
            padding:10px 16px; font-size:14px; font-weight:600; cursor:pointer;
            display:flex; align-items:center; gap:6px; transition:all .3s ease;
            box-shadow:0 4px 8px rgba(0,0,0,.3);
        }
        .back-button:hover { background:linear-gradient(135deg,#000,#444); transform:translateY(-2px); }

        .header { text-align:center; margin-bottom:30px; }
        .header h1 {
            font-size:2rem; font-weight:700; margin-bottom:10px;
            background:linear-gradient(135deg,#ff9a56,#ff8c00); -webkit-background-clip:text; color:transparent;
        }

        .form-group { margin-bottom:20px; display:flex; flex-direction:column; }
        .form-group label { font-size:1rem; font-weight:600; color:#333; margin-bottom:8px; }
        .form-group input,.form-group select {
            padding:12px; font-size:1rem; border-radius:8px; border:1px solid #ddd;
        }
        .submit-btn {
            padding:14px 20px; background:linear-gradient(135deg,#ff9a56,#ff8c00); color:#fff; border:none; border-radius:8px;
            font-size:1.1rem; font-weight:600; cursor:pointer; width:100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="history.back()">← Kembali</button>

        <div class="header">
            <h1>Input Kerjasama</h1>
            <p>Lengkapi formulir berikut untuk menambahkan data kerjasama</p>
        </div>

        <form action="{{ route('programs.store') }}" method="POST" autocomplete="off">
            @csrf
            <input type="hidden" name="kategori" value="kerjasama">

            <div class="form-group">
                <label for="tingkat">Tingkat</label>
                <select id="tingkat" name="tingkat" required>
                    <option value="nasional">Nasional</option>
                    <option value="internasional">Internasional</option>
                </select>
            </div>

            <div class="form-group">
                <label for="mitra_kerjasama">Mitra Kerjasama</label>
                <input type="text" id="mitra_kerjasama" name="mitra_kerjasama" placeholder="Masukkan Nama Mitra Kerjasama" required>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun</label>
                <input type="text" id="tahun" name="tahun" placeholder="Masukkan Tahun" required>
            </div>

            <div class="form-group">
                <label for="jangka_waktu">Jangka Waktu Kerjasama</label>
                <input type="text" id="jangka_waktu" name="jangka_waktu" placeholder="Masukkan Jangka Waktu" required>
            </div>

            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>
            </div>

            <div class="form-group">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>
            </div>

            <button type="submit" class="submit-btn">Tambah Kerjasama</button>
        </form>
    </div>
</body>
</html>
