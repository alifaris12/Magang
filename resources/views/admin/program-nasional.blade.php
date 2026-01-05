<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Kerjasama Nasional dan Internasional</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
     <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;
            background: linear-gradient(135deg,#f7c842 0%,#f4a742 50%,#e8941a 100%);
            min-height:100vh; padding:20px; line-height:1.6;
        }
        .container{max-width:1200px;margin:0 auto;background:rgba(255,255,255,.95);backdrop-filter:blur(10px);border-radius:20px;padding:40px;
            box-shadow:0 20px 40px rgba(255,140,0,.2),0 10px 20px rgba(0,0,0,.1),inset 0 1px 0 rgba(255,255,255,.6);
            border:1px solid rgba(255,255,255,.2);animation:fadeIn 1s ease-in-out;}
        @keyframes fadeIn{0%{opacity:0;transform:scale(.95)}100%{opacity:1;transform:scale(1)}}
        .header{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px;flex-wrap:wrap;gap:15px;}
        .header h1{font-size:2rem;font-weight:700;background:linear-gradient(135deg,#ff9a56,#ff8c00);-webkit-background-clip:text;color:transparent;}
        .tambah-btn{padding:12px 24px;background:linear-gradient(135deg,#ff9a56,#ff8c00);color:#fff;border:none;border-radius:8px;font-size:1rem;font-weight:600;
            cursor:pointer;transition:.3s;text-decoration:none;display:inline-flex;align-items:center;gap:8px;}
        .tambah-btn:hover{background:linear-gradient(135deg,#ff8c00,#ff9a56);transform:translateY(-2px);}
        .back-btn{
            padding:12px 24px;
            background:linear-gradient(135deg,#6b7280,#4b5563);
            color:#fff;
            border:none;
            border-radius:8px;
            font-size:1rem;
            font-weight:600;
            cursor:pointer;
            transition:all .3s ease;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            gap:8px;
            animation:fadeSlideIn 0.8s ease;
        }
        .back-btn:hover{
            background:linear-gradient(135deg,#4b5563,#6b7280);
            transform:translateX(-6px);
            box-shadow:0 4px 12px rgba(0,0,0,.2);
        }
        @keyframes fadeSlideIn {
            0% {opacity:0; transform:translateX(-20px);}
            100% {opacity:1; transform:translateX(0);}
        }
        
        /* Chart Section */
        .chart-section {
            background: rgba(255,255,255,.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 8px 24px rgba(0,0,0,.1);
            border: 1px solid rgba(255,255,255,.3);
            animation: fadeIn 1.2s ease-in-out;
        }
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 15px;
        }
        .chart-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg,#0891b2,#0e7490);
            -webkit-background-clip: text;
            color: transparent;
        }
        .chart-controls {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }
        .chart-toggle {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .toggle-btn {
            padding: 8px 16px;
            background: rgba(8,145,178,.1);
            color: #0891b2;
            border: 2px solid rgba(8,145,178,.2);
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }
        .toggle-btn:hover {
            background: #0891b2;
            color: #fff;
            transform: translateY(-2px);
        }
        .toggle-btn.active {
            background: linear-gradient(135deg,#0891b2,#0e7490);
            color: #fff;
            border-color: #0891b2;
        }
        .year-filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .year-filter-group label {
            font-weight: 600;
            font-size: 14px;
            color: #0891b2;
        }
        .year-filter-select {
            padding: 8px 16px;
            border: 2px solid rgba(8,145,178,.2);
            border-radius: 8px;
            font-size: 14px;
            background: rgba(255,255,255,.9);
            transition: .3s;
            cursor: pointer;
        }
        .year-filter-select:focus {
            outline: none;
            border-color: #0891b2;
            box-shadow: 0 0 0 3px rgba(8,145,178,.1);
        }
        .chart-container {
            position: relative;
            height: 400px;
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: inset 0 2px 8px rgba(0,0,0,.05);
        }
        .chart-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        .stat-card {
            background: linear-gradient(135deg, rgba(8,145,178,.1), rgba(14,116,144,.1));
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(8,145,178,.2);
            transition: .3s;
        }
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(8,145,178,.2);
        }
        .stat-label {
            font-size: 13px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 8px;
        }
        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #0891b2;
        }
        .stat-subtitle {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 4px;
        }

        .filter-section{background:rgba(255,255,255,.6);backdrop-filter:blur(5px);border-radius:12px;padding:20px;margin-bottom:25px;border:1px solid rgba(255,255,255,.3);}
        .filter-grid{display:grid;grid-template-columns:120px 1fr 1fr 2fr auto;gap:15px;align-items:end;}
        .filter-group{display:flex;flex-direction:column;}
        .filter-group label{font-weight:600;margin-bottom:6px;font-size:14px;}
        .filter-select,.filter-input{padding:10px 12px;border:2px solid #e1e5e9;border-radius:8px;font-size:14px;background:rgba(255,255,255,.9);transition:.3s;}
        .filter-select:focus,.filter-input:focus{outline:none;border-color:#0891b2;background:#fff;box-shadow:0 0 0 3px rgba(8,145,178,.1);}
        .search-btn{padding:10px 20px;background:linear-gradient(135deg,#0891b2,#0e7490);color:#fff;border:none;border-radius:8px;font-size:14px;font-weight:600;cursor:pointer;transition:.3s;}
        .search-btn:hover{background:linear-gradient(135deg,#0e7490,#0891b2);transform:translateY(-1px);}
        .table-container{background:rgba(255,255,255,.8);border-radius:12px;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,.1);backdrop-filter:blur(5px);}
        .data-table{width:100%;border-collapse:collapse;font-size:14px;}
        .data-table thead{background:linear-gradient(135deg,#0891b2,#0e7490);}
        .data-table th{color:#fff;padding:16px 12px;text-align:left;font-weight:600;font-size:13px;text-transform:uppercase;}
        .data-table td{padding:14px 12px;border-bottom:1px solid rgba(0,0,0,.06);transition:.3s;vertical-align:middle;}
        .data-table tbody tr:hover{background:rgba(8,145,178,.05);transform:translateX(2px);}
        .action-btn{padding:6px 12px;border:none;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer;transition:.3s;margin-right:6px;text-decoration:none;display:inline-block;}
        .btn-view{background:rgba(8,145,178,.1);color:#0891b2;border:1px solid rgba(8,145,178,.2);}
        .btn-view:hover{background:#0891b2;color:#fff;}
        .btn-edit{background:rgba(245,158,11,.1);color:#d97706;border:1px solid rgba(245,158,11,.2);}
        .btn-edit:hover{background:#d97706;color:#fff;}
        .btn-delete{background:rgba(239,68,68,.1);color:#dc2626;border:1px solid rgba(239,68,68,.2);}
        .btn-delete:hover{background:#dc2626;color:#fff;}
        .empty-state{text-align:center;padding:60px 20px;color:#666;}
        .alert{padding:12px 16px;border-radius:8px;margin-bottom:20px;font-weight:500;}
        .alert-success{background:rgba(34,197,94,.1);color:#16a34a;}
        .alert-error{background:rgba(239,68,68,.1);color:#dc2626;}
        .modal{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);backdrop-filter:blur(6px);justify-content:center;align-items:center;z-index:1000;}
        .modal-content{background:#fff;padding:25px;border-radius:12px;max-width:600px;width:90%;box-shadow:0 10px 30px rgba(0,0,0,.3);animation:fadeIn .3s ease;}
        .modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;}
        .modal-header h2{font-size:1.3rem;}
        .close-btn{background:none;border:none;font-size:1.5rem;cursor:pointer;}
        
        .pagination-wrapper {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
        .pagination-info {
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
        }
        
        @media (max-width: 768px) {
            .data-table { min-width: 800px; }
            .filter-grid { grid-template-columns: 1fr; }
            .chart-container { height: 300px; }
            .chart-stats { grid-template-columns: 1fr; }
            .chart-controls { flex-direction: column; align-items: stretch; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Daftar Kerjasama Nasional dan Internasional</h1>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <button onclick="history.back()" class="back-btn">⬅ Back</button>
                <a href="{{ route('input.kerjasama') }}" class="tambah-btn">+ Tambah Program</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">✔ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif

        <!-- Chart Section -->
        <div class="chart-section">
            <div class="chart-header">
                <h2>📊 Grafik Jumlah Program per Tingkat</h2>
                <div class="chart-controls">
                    <div class="year-filter-group">
                        <label for="chartYearFilter">Sampai Tahun:</label>
                        <select id="chartYearFilter" class="year-filter-select" onchange="updateChartByYear()">
                            <option value="">Semua Tahun</option>
                            @isset($tahuns)
                                @foreach($tahuns as $year)
                                    <option value="{{ $year }}" {{ isset($chartYearFilter) && $chartYearFilter == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="chart-toggle">
                        <button class="toggle-btn active" onclick="changeChartType('bar')">Bar Chart</button>
                        <button class="toggle-btn" onclick="changeChartType('line')">Line Chart</button>
                        <button class="toggle-btn" onclick="changeChartType('pie')">Pie Chart</button>
                    </div>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="kerjasamaChart"></canvas>
            </div>
            <div class="chart-stats">
                <div class="stat-card">
                    <div class="stat-label">Total Program</div>
                    <div class="stat-value" id="totalPrograms">0</div>
                    <div class="stat-subtitle">Semua tingkat</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Program Nasional</div>
                    <div class="stat-value" id="nasionalCount">0</div>
                    <div class="stat-subtitle">Program kerjasama</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Program Internasional</div>
                    <div class="stat-value" id="internasionalCount">0</div>
                    <div class="stat-subtitle">Program kerjasama</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Tingkat Dominan</div>
                    <div class="stat-value" id="dominantLevel">-</div>
                    <div class="stat-subtitle" id="dominantCount">0 program</div>
                </div>
            </div>
        </div>

        <!-- Filter -->
        <div class="filter-section">
            <form method="GET" action="{{ route('daftar.kerjasama.nasional') }}">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="per_page">Per Halaman</label>
                        <select name="per_page" id="per_page" class="filter-select">
                            <option value="10" {{ request('per_page') == '10' || !request('per_page') ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                            <option value="200" {{ request('per_page') == '200' ? 'selected' : '' }}>200</option>
                            <option value="500" {{ request('per_page') == '500' ? 'selected' : '' }}>500</option>
                        </select>
                    </div>
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
                            @isset($tahuns)
                                @foreach($tahuns as $tahun)
                                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="search">Pencarian</label>
                        <input type="text" name="search" id="search" class="filter-input"
                               placeholder="Cari mitra kerjasama..." value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="search-btn">🔍 Filter</button>
                </div>
            </form>
        </div>

        <!-- Tabel -->
        <div class="table-container">
            @isset($programKerjasama)
                @forelse($programKerjasama as $program)
                    @if($loop->first)
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
                    @endif
                    <tr>
                        <td>{{ ($programKerjasama->currentPage() - 1) * $programKerjasama->perPage() + $loop->iteration }}</td>
                        <td>{{ $program->mitra_kerjasama }}</td>
                        <td>{{ $program->tahun }}</td>
                        <td>{{ $program->jangka_waktu }}</td>
                        <td>{{ \Carbon\Carbon::parse($program->tanggal_mulai)->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($program->tanggal_selesai)->format('d-m-Y') }}</td>
                        <td>{{ ucfirst($program->tingkat) }}</td>
                        <td>
                            <a href="javascript:void(0)" data-program='@json($program)'
                               onclick="openModal(this)" class="action-btn btn-view">👁</a>
                            <a href="javascript:void(0)" data-program='@json($program)'
                               onclick="openEditModal(this)" class="action-btn btn-edit">✏️</a>
                            <form method="POST" action="{{ route('program-kerjasama.destroy',$program->id) }}"
                                  style="display:inline;" onsubmit="return confirm('Hapus program ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="action-btn btn-delete">🗑️</button>
                            </form>
                        </td>
                    </tr>
                    @if($loop->last)
                            </tbody>
                        </table>
                    @endif
                @empty
                    <div class="empty-state">
                        <h3>📋 Belum Ada Program Kerjasama</h3>
                        <p>Belum ada program kerjasama nasional maupun internasional yang terdaftar.</p>
                    </div>
                @endforelse
            @endisset
        </div>

        <!-- Pagination -->
        @if(isset($programKerjasama) && $programKerjasama->hasPages())
            <div class="pagination-wrapper">
                <span class="pagination-info">
                    Menampilkan {{ $programKerjasama->firstItem() }} sampai {{ $programKerjasama->lastItem() }} dari {{ $programKerjasama->total() }} hasil
                </span>
                {{ $programKerjasama->links() }}
            </div>
        @endif
    </div>

    <!-- Modal Detail -->
    <div id="programModal" class="modal" onclick="if(event.target === this) closeModal()">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Program Kerjasama</h2>
                <button class="close-btn" onclick="closeModal()">×</button>
            </div>
            <div id="modalBody"></div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="modal" onclick="if(event.target === this) closeEditModal()">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Program Kerjasama</h2>
                <button class="close-btn" onclick="closeEditModal()">×</button>
            </div>
            <form id="editForm" method="POST">
                @csrf @method('PUT')
                <div class="filter-group">
                    <label>Mitra Kerjasama</label>
                    <input type="text" name="mitra_kerjasama" id="editMitra" class="filter-input" required>
                </div>
                <div class="filter-group">
                    <label>Tahun</label>
                    <input type="number" name="tahun" id="editTahun" class="filter-input" required>
                </div>
                <div class="filter-group">
                    <label>Jangka Waktu</label>
                    <input type="text" name="jangka_waktu" id="editJangkaWaktu" class="filter-input" required>
                </div>
                <div class="filter-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="editTanggalMulai" class="filter-input" required>
                </div>
                <div class="filter-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="editTanggalSelesai" class="filter-input" required>
                </div>
                <div class="filter-group">
                    <label>Tingkat</label>
                    <select name="tingkat" id="editTingkat" class="filter-select" required>
                        <option value="nasional">Nasional</option>
                        <option value="internasional">Internasional</option>
                    </select>
                </div>
                <div style="margin-top:15px; text-align:right;">
                    <button type="button" class="search-btn" onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="tambah-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Chart data from Laravel
        const chartData = @json(isset($chartData) ? $chartData : []);
        let myChart = null;
        let currentChartType = 'bar';

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            if (chartData.length > 0) {
                renderChart();
                updateStats();
            }
        });

        // Render Chart
        function renderChart() {
            const labels = chartData.map(item => item.tingkat.charAt(0).toUpperCase() + item.tingkat.slice(1));
            const counts = chartData.map(item => parseInt(item.jumlah_program));

            const ctx = document.getElementById('kerjasamaChart').getContext('2d');
            
            if (myChart) {
                myChart.destroy();
            }

            const colors = [
                'rgba(8, 145, 178, 0.7)',
                'rgba(255, 140, 0, 0.7)',
                'rgba(14, 116, 144, 0.7)',
                'rgba(6, 182, 212, 0.7)'
            ];

            const chartConfig = {
                type: currentChartType,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Program',
                        data: counts,
                        backgroundColor: currentChartType === 'pie' ? colors : colors[0],
                        borderColor: '#0891b2',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: currentChartType === 'line'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: currentChartType === 'pie',
                            position: 'right'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const value = context.parsed.y || context.parsed;
                                    return 'Jumlah: ' + value + ' program';
                                }
                            }
                        }
                    },
                    scales: currentChartType !== 'pie' ? {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                callback: function(value) {
                                    return value + ' program';
                                }
                            }
                        }
                    } : {}
                }
            };

            myChart = new Chart(ctx, chartConfig);
        }

        // Update Statistics
        function updateStats() {
            const totalPrograms = chartData.reduce((sum, item) => sum + parseInt(item.jumlah_program), 0);
            
            let nasionalCount = 0;
            let internasionalCount = 0;
            
            chartData.forEach(item => {
                if (item.tingkat === 'nasional') {
                    nasionalCount = parseInt(item.jumlah_program);
                } else if (item.tingkat === 'internasional') {
                    internasionalCount = parseInt(item.jumlah_program);
                }
            });

            let dominantLevel = '-';
            let dominantCount = 0;
            
            if (chartData.length > 0) {
                const dominant = chartData.reduce((max, item) => 
                    parseInt(item.jumlah_program) > parseInt(max.jumlah_program) ? item : max
                , chartData[0]);
                
                dominantLevel = dominant.tingkat.charAt(0).toUpperCase() + dominant.tingkat.slice(1);
                dominantCount = parseInt(dominant.jumlah_program);
            }

            document.getElementById('totalPrograms').textContent = totalPrograms;
            document.getElementById('nasionalCount').textContent = nasionalCount;
            document.getElementById('internasionalCount').textContent = internasionalCount;
            document.getElementById('dominantLevel').textContent = dominantLevel;
            document.getElementById('dominantCount').textContent = dominantCount + ' program';
        }

        // Change Chart Type
        function changeChartType(type) {
            currentChartType = type;
            document.querySelectorAll('.toggle-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            renderChart();
        }

        // Update chart by year filter
        function updateChartByYear() {
            const year = document.getElementById('chartYearFilter').value;
            const url = new URL(window.location.href);
            
            if (year) {
                url.searchParams.set('chart_tahun', year);
            } else {
                url.searchParams.delete('chart_tahun');
            }
            
            window.location.href = url.toString();
        }

        function openModal(element){
            const program = JSON.parse(element.getAttribute('data-program'));
            const tanggalMulai = new Date(program.tanggal_mulai).toLocaleDateString('id-ID', {day: '2-digit', month: '2-digit', year: 'numeric'});
            const tanggalSelesai = new Date(program.tanggal_selesai).toLocaleDateString('id-ID', {day: '2-digit', month: '2-digit', year: 'numeric'});
            let body = `
                <p><b>Mitra Kerjasama:</b> ${program.mitra_kerjasama}</p>
                <p><b>Tahun:</b> ${program.tahun}</p>
                <p><b>Jangka Waktu:</b> ${program.jangka_waktu}</p>
                <p><b>Tanggal Mulai:</b> ${tanggalMulai}</p>
                <p><b>Tanggal Selesai:</b> ${tanggalSelesai}</p>
                <p><b>Tingkat:</b> ${program.tingkat.charAt(0).toUpperCase() + program.tingkat.slice(1)}</p>`;
            document.getElementById('modalBody').innerHTML = body;
            document.getElementById('programModal').style.display = 'flex';
        }

        function closeModal(){ document.getElementById('programModal').style.display='none'; }

        function openEditModal(element){
            const program = JSON.parse(element.getAttribute('data-program'));
            document.getElementById('editForm').action = `/program-kerjasama/${program.id}`;
            document.getElementById('editMitra').value = program.mitra_kerjasama;
            document.getElementById('editTahun').value = program.tahun;
            document.getElementById('editJangkaWaktu').value = program.jangka_waktu;
            document.getElementById('editTanggalMulai').value = program.tanggal_mulai.split(' ')[0];
            document.getElementById('editTanggalSelesai').value = program.tanggal_selesai.split(' ')[0];
            document.getElementById('editTingkat').value = program.tingkat;
            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal(){ document.getElementById('editModal').style.display='none'; }
    </script>
</body>
</html>