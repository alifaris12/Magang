<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Penelitian dan Pengabdian</title>
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
            <h1>Daftar Program Penelitian dan Pengabdian</h1>
            <div style="display:flex; gap:10px; flex-wrap:wrap;">
                <a href="{{ route('user.dashboard') }}" class="back-btn">⬅ Kembali ke Dashboard</a>
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
                <h2>📊 Grafik Pendapatan Dana per Skema</h2>
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
                <canvas id="danaChart"></canvas>
            </div>
            <div class="chart-stats">
                <div class="stat-card">
                    <div class="stat-label">Total Dana</div>
                    <div class="stat-value" id="totalDana">Rp 0</div>
                    <div class="stat-subtitle">Berdasarkan filter</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Rata-rata per Skema</div>
                    <div class="stat-value" id="averageDana">Rp 0</div>
                    <div class="stat-subtitle">Berdasarkan data tersedia</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Skema Tertinggi</div>
                    <div class="stat-value" id="highestSkema">-</div>
                    <div class="stat-subtitle" id="highestAmount">Rp 0</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Total Program</div>
                    <div class="stat-value" id="totalPrograms">{{ isset($programs) ? $programs->total() : 0 }}</div>
                    <div class="stat-subtitle">Program terdaftar</div>
                </div>
            </div>
        </div>

        <!-- Filter -->
        <div class="filter-section">
            <form method="GET" action="{{ route('user.daftar.program') }}">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="per_page">Per Halaman</label>
                        <select name="per_page" id="per_page" class="filter-select">
                            <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page') == '25' ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>100</option>
                            <option value="200" {{ request('per_page') == '200' ? 'selected' : '' }}>200</option>
                            <option value="500" {{ request('per_page') == '500' || !request('per_page') ? 'selected' : '' }}>500</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="skema">Skema</label>
                        <select name="skema" id="skema" class="filter-select">
                            <option value="">Semua Skema</option>
                            @isset($skemas)
                                @foreach($skemas as $skema)
                                    <option value="{{ $skema }}" {{ request('skema') == $skema ? 'selected' : '' }}>
                                        {{ ucfirst($skema) }}
                                    </option>
                                @endforeach
                            @endisset
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
                               placeholder="Cari judul, ketua, atau kata kunci..." value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="search-btn">🔍 Filter</button>
                </div>
            </form>
        </div>

        <!-- Tabel -->
        <div class="table-container">
            @isset($programs)
                @forelse($programs as $program)
                    @if($loop->first)
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Kategori</th>
                                    <th>Skema</th>
                                    <th>Judul</th>
                                    <th>Ketua</th>
                                    <th>Dana</th>
                                    <th>Anggota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                    @endif
                    <tr>
                        <td>{{ ($programs->currentPage() - 1) * $programs->perPage() + $loop->iteration }}</td>
                        <td>{{ $program->tahun }}</td>
                        <td>{{ $program->kategori }}</td>
                        <td>{{ $program->skema }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($program->judul, 60) }}</td>
                        <td>{{ $program->ketua }}</td>
                        <td style="color:#059669;font-weight:600;">Rp {{ number_format($program->dana,0,',','.') }}</td>
                        <td>{{ $program->anggota ?? '-' }}</td>
                        <td>
                            <a href="javascript:void(0)" data-program='@json($program)'
                               onclick="openModal(this)" class="action-btn btn-view">👁</a>
                        </td>
                    </tr>
                    @if($loop->last)
                            </tbody>
                        </table>
                    @endif
                @empty
                    <div class="empty-state">
                        <h3>📋 Belum Ada Program</h3>
                        <p>Belum ada program penelitian atau pengabdian yang terdaftar.</p>
                    </div>
                @endforelse
            @endisset
        </div>

        <!-- Pagination -->
        @if(isset($programs) && $programs->hasPages())
            <div class="pagination-wrapper">
                <span class="pagination-info">
                    Menampilkan {{ $programs->firstItem() }} sampai {{ $programs->lastItem() }} dari {{ $programs->total() }} hasil
                </span>
                {{ $programs->links() }}
            </div>
        @endif
    </div>

    <!-- Modal Detail -->
    <div id="programModal" class="modal" onclick="if(event.target === this) closeModal()">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Program</h2>
                <button class="close-btn" onclick="closeModal()">×</button>
            </div>
            <div id="modalBody"></div>
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
            const labels = chartData.map(item => item.skema);
            const amounts = chartData.map(item => parseFloat(item.total_dana));

            const ctx = document.getElementById('danaChart').getContext('2d');
            
            if (myChart) {
                myChart.destroy();
            }

            const colors = [
                'rgba(8, 145, 178, 0.7)',
                'rgba(14, 116, 144, 0.7)',
                'rgba(6, 182, 212, 0.7)',
                'rgba(34, 211, 238, 0.7)',
                'rgba(103, 232, 249, 0.7)',
                'rgba(255, 140, 0, 0.7)',
                'rgba(255, 154, 86, 0.7)'
            ];

            const chartConfig = {
                type: currentChartType,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Dana (Rp)',
                        data: amounts,
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
                                    return 'Dana: Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    scales: currentChartType !== 'pie' ? {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + (value / 1000000).toFixed(0) + 'M';
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
            const totalDana = chartData.reduce((sum, item) => sum + parseFloat(item.total_dana), 0);
            const avgDana = chartData.length > 0 ? totalDana / chartData.length : 0;
            
            let highestSkema = '-';
            let highestAmount = 0;
            
            if (chartData.length > 0) {
                const highest = chartData.reduce((max, item) => 
                    parseFloat(item.total_dana) > parseFloat(max.total_dana) ? item : max
                , chartData[0]);
                
                highestSkema = highest.skema;
                highestAmount = parseFloat(highest.total_dana);
            }

            document.getElementById('totalDana').textContent = 'Rp ' + totalDana.toLocaleString('id-ID');
            document.getElementById('averageDana').textContent = 'Rp ' + Math.round(avgDana).toLocaleString('id-ID');
            document.getElementById('highestSkema').textContent = highestSkema;
            document.getElementById('highestAmount').textContent = 'Rp ' + highestAmount.toLocaleString('id-ID');
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

        // Modal Functions
        function openModal(element){
            const program = JSON.parse(element.getAttribute('data-program'));
            let body = `
                <p><b>Judul:</b> ${program.judul}</p>
                <p><b>Ketua:</b> ${program.ketua}</p>
                <p><b>Anggota:</b> ${program.anggota ?? '-'}</p>
                <p><b>Tahun:</b> ${program.tahun}</p>
                <p><b>Kategori:</b> ${program.kategori}</p>
                <p><b>Skema:</b> ${program.skema}</p>
                <p><b>Dana:</b> Rp ${new Intl.NumberFormat('id-ID').format(program.dana)}</p>`;
            document.getElementById('modalBody').innerHTML = body;
            document.getElementById('programModal').style.display = 'flex';
        }

        function closeModal(){ 
            document.getElementById('programModal').style.display='none'; 
        }
    </script>
</body>
</html>