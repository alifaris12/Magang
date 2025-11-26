<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Kerjasama Nasional dan Internasional</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Pastikan jQuery Terpanggil -->
    <style>
                * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;
            background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
            min-height:100vh; padding:20px; line-height:1.6;
        }
        .container{
            max-width:1200px;
            margin:0 auto;
            background:rgba(255,255,255,.95);
            backdrop-filter:blur(10px);
            border-radius:20px;
            padding:40px;
            box-shadow:0 20px 40px rgba(255,140,0,.2),0 10px 20px rgba(0,0,0,.1),inset 0 1px 0 rgba(255,255,255,.6);
            border:1px solid rgba(255,255,255,.2);
            animation:fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn{0%{opacity:0;transform:scale(.95)}100%{opacity:1;transform:scale(1)}}

        /* Header Flexbox for the title and buttons */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ff9a56, #ff8c00);
            -webkit-background-clip: text;
            color: transparent;
            flex-grow: 1;
        }

        .header .back-btn, .header .tambah-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            text-decoration: none;
        }

        .back-btn:hover {
            background: linear-gradient(135deg, #4b5563, #6b7280);
            transform: translateX(-6px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .2);
        }

        .tambah-btn {
            background: linear-gradient(135deg, #ff9a56, #ff8c00);
            color: white;
            text-decoration: none;
        }

        .tambah-btn:hover {
            background: linear-gradient(135deg, #ff8c00, #ff9a56);
            transform: translateY(-2px);
        }

        /* Filter Section */
        .filter-section {
            background: rgba(255, 255, 255, .6);
            backdrop-filter: blur(5px);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, .3);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 2fr auto;
            gap: 15px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
        }

        .filter-group label {
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .filter-select,
        .filter-input {
            padding: 10px 12px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 14px;
            background: rgba(255, 255, 255, .9);
            transition: .3s;
        }

        .filter-select:focus,
        .filter-input:focus {
            outline: none;
            border-color: #0891b2;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(8, 145, 178, .1);
        }

        .search-btn {
            padding: 10px 20px;
            background: linear-gradient(135deg, #0891b2, #0e7490);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }

        .search-btn:hover {
            background: linear-gradient(135deg, #0e7490, #0891b2);
            transform: translateY(-1px);
        }

        /* Table Styling */
        .table-container {
            background: rgba(255, 255, 255, .8);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .1);
            backdrop-filter: blur(5px);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .data-table thead {
            background: linear-gradient(135deg, #0891b2, #0e7490);
        }

        .data-table th {
            color: white;
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
        }

        .data-table td {
            padding: 14px 12px;
            border-bottom: 1px solid rgba(0, 0, 0, .06);
            transition: .3s;
            vertical-align: middle;
        }

        .data-table tbody tr:hover {
            background: rgba(8, 145, 178, .05);
            transform: translateX(2px);
        }

        /* Action Button Styling */
        .action-btn {
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
            margin-right: 6px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-view {
            background: rgba(8, 145, 178, .1);
            color: #0891b2;
            border: 1px solid rgba(8, 145, 178, .2);
        }

        .btn-view:hover {
            background: #0891b2;
            color: white;
        }

        .modal-overlay {
    display: none; /* Modal tidak terlihat saat pertama kali */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    justify-content: center;
    align-items: center;
}
.modal-card {
    background: white;
    padding: 20px;
    border-radius: 10px;
}


        .btn-edit {
            background: rgba(245, 158, 11, .1);
            color: #d97706;
            border: 1px solid rgba(245, 158, 11, .2);
        }

        .btn-edit:hover {
            background: #d97706;
            color: white;
        }

        .btn-delete {
            background: rgba(239, 68, 68, .1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, .2);
        }

        .btn-delete:hover {
            background: #dc2626;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .alert-success {
            background: rgba(34, 197, 94, .1);
            color: #16a34a;
        }

        .alert-error {
            background: rgba(239, 68, 68, .1);
            color: #dc2626;
        }

        @media (max-width: 768px) {
            .data-table {
                min-width: 800px;
            }
        }

        /* Style khusus untuk modal */
        .modal-overlay{
            position:fixed; inset:0; display:none; align-items:center; justify-content:center;
            background:rgba(0,0,0,.5); z-index:9999; padding:20px;
        }
        .modal-overlay.show{ display:flex; }
        .modal-card{
            width:100%; max-width:560px; background:#fff; border-radius:16px; padding:24px;
            box-shadow:0 20px 40px rgba(0,0,0,.25);
            animation:modalIn .2s ease-out;
            position:relative;
        }
        @keyframes modalIn{from{opacity:0; transform:translateY(8px)} to{opacity:1; transform:translateY(0)}}
        .modal-title{font-size:20px; margin-bottom:16px; color:#111827}
        .modal-row{display:flex; justify-content:space-between; gap:16px; padding:10px 0; border-bottom:1px solid #f2f2f2}
        .modal-row strong{color:#374151; font-weight:600}
        .modal-row span{color:#111827}
        .modal-close{
            position:absolute; right:22px; top:22px; font-size:28px; line-height:1; background:transparent; border:0; cursor:pointer;
            color:#6b7280; font-weight:300;
        }
        .modal-close:hover{ color:#111827 }
        /* Modal CSS tetap sama */
        .modal-overlay {
            display: none; /* Modal tidak terlihat saat pertama kali */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        .modal-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
        }
 </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Daftar Kerjasama Nasional dan Internasional</h1>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="back-btn">⬅ Kembali</a>
                <a href="{{ route('input.kerjasama') }}" class="tambah-btn">+ Tambah Program</a>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('daftar.kerjasama.nasional') }}">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="tingkat">Tingkat</label>
                        <select name="tingkat" id="tingkat" class="filter-select">
                            <option value="">Semua Tingkat</option>
                            <option value="nasional" {{ request('tingkat') == 'nasional' ? 'selected' : '' }}>Nasional</option>
                            <option value="internasional" {{ request('tingkat') == 'internasional' ? 'selected' : '' }}>Internasional</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="filter-select">
                            <option value="">Semua Tahun</option>
                            @foreach($tahuns as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="search">Pencarian</label>
                        <input type="text" name="search" id="search" class="filter-input" placeholder="Cari mitra, tahun, atau kata kunci..." value="{{ request('search') }}"/>
                    </div>
                    <button type="submit" class="search-btn">🔍 Filter</button>
                </div>
            </form>
        </div>

        <!-- Data Table -->
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mitra Kerjasama</th>
                        <th>Tahun</th>
                        <th>Jangka Waktu</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Tingkat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($programKerjasama as $index => $program)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $program->mitra_kerjasama }}</td>
                            <td>{{ $program->tahun }}</td>
                            <td>{{ $program->jangka_waktu }}</td>
                            <td>{{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($program->tanggal_selesai)->format('d-m-Y') }}</td>
                            <td>{{ ucfirst($program->tingkat) }}</td>
                            <td>
                                <!-- Tombol Lihat dan Edit -->
                                <button class="btn-view" data-id="{{ $program->id }}" onclick="lihatDetail(this)">Lihat</button>

                                <a href="javascript:void(0);" class="btn-edit" data-id="{{ $program->id }}" onclick="openEditModal(this)">Edit</a>
                                <form action="{{ route('program-kerjasama.destroy', $program->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="empty-state">📋 Belum ada program kerjasama nasional maupun internasional.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

<!-- Modal Lihat -->
<div class="modal-overlay" id="modalProgram" style="display:none;">
    <div class="modal-card">
        <button class="modal-close" onclick="closeModal()">&times;</button>
        <h2 id="modalTitle">Detail Program Kerjasama</h2>
        <p><strong>Mitra Kerjasama:</strong> <span id="mitra-detail"></span></p>
        <p><strong>Tahun:</strong> <span id="tahun-detail"></span></p>
        <p><strong>Jangka Waktu:</strong> <span id="jangka-waktu-detail"></span></p>
        <p><strong>Tanggal Mulai:</strong> <span id="tanggal-mulai-detail"></span></p>
        <p><strong>Tanggal Selesai:</strong> <span id="tanggal-selesai-detail"></span></p>
        <p><strong>Tingkat:</strong> <span id="tingkat-detail"></span></p>
    </div>
</div>



        <!-- Modal Edit Program -->
        <div class="modal-overlay" id="editModal" style="display:none;">
            <div class="modal-card">
                <button class="modal-close" onclick="closeEditModal()">&times;</button>
                <h2>Edit Program Kerjasama</h2>
<form id="editForm" method="POST" action="">
    @csrf
    @method('PUT')
    <label for="mitra_kerjasama">Mitra Kerjasama</label>
    <input type="text" id="mitra_kerjasama" name="mitra_kerjasama" required>

    <label for="tahun">Tahun</label>
    <input type="number" id="tahun" name="tahun" required>

    <label for="jangka_waktu">Jangka Waktu</label>
    <input type="text" id="jangka_waktu" name="jangka_waktu" required>

    <label for="tanggal_mulai">Tanggal Mulai</label>
    <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>

    <label for="tanggal_selesai">Tanggal Selesai</label>
    <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>

    <label for="tingkat">Tingkat</label>
    <select name="tingkat" id="tingkat" required>
        <option value="nasional">Nasional</option>
        <option value="internasional">Internasional</option>
    </select>

    <button type="submit">Update</button>
</form>

            </div>
        </div>
    </div>

    <script>


// Fungsi untuk membuka modal dan menampilkan data program
function lihatDetail(btn) {
    const id = btn.getAttribute('data-id');  // Ambil ID dari data-id tombol

    $.ajax({
        url: '/program-kerjasama/' + id,  // Endpoint JSON ProgramKerjasamaController@show
        method: 'GET',
        success: function(data) {
            console.log(data); // Menampilkan data yang diterima dari backend
            if (data) {
                $('#mitra-detail').text(data.mitra_kerjasama);
                $('#tahun-detail').text(data.tahun);
                $('#jangka-waktu-detail').text(data.jangka_waktu);
                $('#tanggal-mulai-detail').text(data.tanggal_mulai);
                $('#tanggal-selesai-detail').text(data.tanggal_selesai);
                $('#tingkat-detail').text(data.tingkat);
                $('#modalProgram').fadeIn();  // Pastikan modal ditampilkan setelah data diterima
            } else {
                alert('Data tidak ditemukan.');
            }
        },
        error: function(xhr, status, error) {
            alert('Terjadi kesalahan saat memuat data program: ' + error);
        }
    });
}







        // Fungsi untuk membuka modal Edit Program
function openEditModal(btn) {
    const id = btn.getAttribute('data-id'); // Ambil ID dari data-id tombol

    $.ajax({
        url: '/program-kerjasama/' + id + '/edit',  // Pastikan URL ini sesuai dengan route yang didefinisikan
        method: 'GET',
        success: function(data) {
            // Isi form modal dengan data yang diterima
            $('#mitra_kerjasama').val(data.mitra_kerjasama);
            $('#tahun').val(data.tahun);
            $('#jangka_waktu').val(data.jangka_waktu);
            $('#tanggal_mulai').val(data.tanggal_mulai);
            $('#tanggal_selesai').val(data.tanggal_selesai);
            $('#tingkat').val(data.tingkat);

            // Perbarui action form agar mengarah ke URL update yang benar
            $('#editForm').attr('action', '/program-kerjasama/' + id);

            // Tampilkan modal
            $('#editModal').fadeIn();
        },
        error: function(xhr, status, error) {
            alert('Terjadi kesalahan saat memuat data program: ' + error);
        }
    });
}


        // Fungsi untuk menutup modal
        function closeModal() {
            $('#modalProgram').fadeOut();
        }

        // Fungsi untuk menutup modal edit
        function closeEditModal() {
            $('#editModal').fadeOut();
        }
    </script>
</body>
</html>