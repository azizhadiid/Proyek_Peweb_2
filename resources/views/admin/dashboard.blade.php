@extends('admin.templates.mainAdminlayout')

@section('title', 'Dashboard')

@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="row">
        <!-- Orderan Masuk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 border-start border-4 border-primary">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-uppercase text-primary fw-bold mb-1">Orderan Masuk</div>
                        <div class="h5 fw-bold text-gray-800">{{ $pendingOrdersCount > 0 ? $pendingOrdersCount : 'Tidak ada' }}</div>
                    </div>
                    <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                </div>
            </div>
        </div>

        <!-- Total Pendapatan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 border-start border-4 border-warning">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-uppercase text-warning fw-bold mb-1">Total Pendapatan</div>
                        <div class="h5 fw-bold text-gray-800">{{ $totalPendapatan > 0 ? 'Rp' . number_format($totalPendapatan, 0, ',', '.') : 'Rp0' }}</div>
                    </div>
                    <i class="fas fa-wallet fa-2x text-warning"></i>
                </div>
            </div>
        </div>

        <!-- Produk Terlaris -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 border-start border-4 border-success">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-uppercase text-success fw-bold mb-1">Produk Terlaris</div>
                        <div class="h5 fw-bold text-gray-800"> {{ $produkTerlaris ? $produkTerlaris->nama_produk . ' (' . $produkTerlaris->total_terjual . ' terjual)' : 'Belum ada penjualan' }}</div>
                    </div>
                    <i class="fas fa-box-open fa-2x text-success"></i>
                </div>
            </div>
        </div>

        <!-- Stok Kritis -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 border-start border-4 border-danger">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs text-uppercase text-danger fw-bold mb-1">Stok Kritis</div>
                        <div class="h6 fw-bold text-danger">{{ $produkKritisTerendah ? $produkKritisTerendah->nama_produk . ' (Stok: ' . $produkKritisTerendah->stok . ')' : 'Semua stok aman' }}</div>
                    </div>
                    <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Penjualan Perbulan -->
        <div class="col-xl-6 mb-4">
            <div class="card shadow h-100 border-start border-4 border-info">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <div class="fw-bold text-info">
                        <i class="fas fa-chart-line me-2"></i> Penjualan Perbulan
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button id="prevYear" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <select id="yearSelect" class="form-select form-select-sm" style="width: auto;">
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                        </select>
                        <button id="nextYear" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myBarsChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>

        <!-- Laporan Harian -->
        <div class="col-xl-6 mb-4">
            <div class="card shadow h-100 border-start border-4 border-info">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <div class="fw-bold text-info">
                        <i class="fas fa-chart-pie me-2"></i> Laporan Harian
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button id="prevDay" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <input type="date" id="dateSelect" class="form-control form-control-sm" style="width: auto;">
                        <button id="nextDay" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myPieChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('myPieChart').getContext('2d');
        let currentDate = "{{ $tanggal }}"; // Data awal dari controller

        // Fungsi bantu untuk nama hari
        function getNamaHari(dateString) {
            const hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const d = new Date(dateString);
            return hari[d.getDay()];
        }

        // Plugin teks tengah yang akan update saat data berubah
        const centerText = {
            id: 'centerText',
            beforeDraw(chart) {
                const { width, height, ctx } = chart;
                ctx.restore();

                const fontSizeDate = (height / 250).toFixed(2);
                const fontSizeDay = (height / 200).toFixed(2);

                const dateLabel = new Date(currentDate).toLocaleDateString('id-ID');
                const dayLabel = getNamaHari(currentDate);

                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';

                ctx.fillStyle = '#4e73df';
                ctx.font = `${fontSizeDate}em Inter, sans-serif`;
                ctx.fillText(dateLabel, width / 2, height / 2 - 10);

                ctx.fillStyle = '#888';
                ctx.font = `${fontSizeDay}em Inter, sans-serif`;
                ctx.fillText(dayLabel, width / 2, height / 2 + 20);

                ctx.save();
            }
        };

        // Ambil data awal dari Blade
        const initialData = @json($distribusiOlahan);

        const chartData = {
            labels: initialData.map(item => item.jenis_olahan),
            datasets: [{
                data: initialData.map(item => item.total),
                backgroundColor: ['#3B82F6', '#EF4444', '#F59E0B', '#10B981'],
                borderColor: '#FFFFFF',
                borderWidth: 3,
                hoverOffset: 8
            }]
        };

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        boxWidth: 20,
                        padding: 15,
                        font: {
                            size: 14,
                            family: 'Inter, sans-serif'
                        },
                        color: '#333'
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            const label = context.label || '';
                            return label ? `${label}: ${context.parsed}` : '';
                        }
                    },
                    backgroundColor: 'rgba(0,0,0,0.7)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#ccc',
                    borderWidth: 1,
                    cornerRadius: 4,
                },
                title: {
                    display: true,
                    text: `Distribusi Penjualan per Jenis Olahan`,
                    font: {
                        size: 18,
                        weight: 'bold',
                        family: 'Inter, sans-serif'
                    },
                    color: '#333',
                    padding: { top: 10, bottom: 20 }
                }
            },
            animation: {
                animateRotate: true,
                animateScale: true
            }
        };

        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: chartData,
            options: chartOptions,
            plugins: [centerText]
        });

        // Fungsi untuk load data AJAX dan update grafik
        function fetchAndUpdateChart(date) {
            fetch(`/admin/distribusi-olahan?tanggal=${date}`)
                .then(response => response.json())
                .then(data => {
                    currentDate = date;
                    myChart.data.labels = data.map(item => item.jenis_olahan);
                    myChart.data.datasets[0].data = data.map(item => item.total);
                    myChart.update();
                });
        }

        // Event: input tanggal
        document.getElementById('dateSelect').value = currentDate;
        document.getElementById('dateSelect').addEventListener('change', function () {
            fetchAndUpdateChart(this.value);
        });

        // Event: tombol hari sebelumnya
        document.getElementById('prevDay').addEventListener('click', function () {
            const date = new Date(currentDate);
            date.setDate(date.getDate() - 1);
            const formatted = date.toISOString().split('T')[0];
            document.getElementById('dateSelect').value = formatted;
            fetchAndUpdateChart(formatted);
        });

        // Event: tombol hari berikutnya
        document.getElementById('nextDay').addEventListener('click', function () {
            const date = new Date(currentDate);
            date.setDate(date.getDate() + 1);
            const formatted = date.toISOString().split('T')[0];
            document.getElementById('dateSelect').value = formatted;
            fetchAndUpdateChart(formatted);
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById("myBarsChart").getContext("2d");

        const gradientPemasukan = ctx.createLinearGradient(0, 0, 0, 300);
        gradientPemasukan.addColorStop(0, '#b9fbc0');
        gradientPemasukan.addColorStop(1, '#2a9d8f');

        const gradientPajak = ctx.createLinearGradient(0, 0, 0, 300);
        gradientPajak.addColorStop(0, '#a0c4ff');
        gradientPajak.addColorStop(1, '#3a86ff');

        const gradientLaba = ctx.createLinearGradient(0, 0, 0, 300);
        gradientLaba.addColorStop(0, '#fff3b0');
        gradientLaba.addColorStop(1, '#ffb703');

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: [],
                        backgroundColor: gradientPemasukan,
                        borderRadius: { topLeft: 10, topRight: 10 },
                    },
                    {
                        label: 'Pajak',
                        data: [],
                        backgroundColor: gradientPajak,
                        borderRadius: { topLeft: 10, topRight: 10 },
                    },
                    {
                        label: 'Laba',
                        data: [],
                        backgroundColor: gradientLaba,
                        borderRadius: { topLeft: 10, topRight: 10 },
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Penjualan Perbulan (Rp)'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => 'Rp' + value.toLocaleString('id-ID')
                        }
                    }
                }
            }
        });

        function loadChartData(year) {
            fetch(`/admin/chart/penjualan-bulanan?year=${year}`)
                .then(res => res.json())
                .then(data => {
                    chart.data.datasets[0].data = data.map(item => item.pemasukan);
                    chart.data.datasets[1].data = data.map(item => item.pajak);
                    chart.data.datasets[2].data = data.map(item => item.laba);
                    chart.update();
                });
        }

        const yearSelect = document.getElementById('yearSelect');
        yearSelect.addEventListener('change', () => {
            loadChartData(yearSelect.value);
        });

        document.getElementById('prevYear').addEventListener('click', () => {
            yearSelect.value = parseInt(yearSelect.value) - 1;
            loadChartData(yearSelect.value);
        });

        document.getElementById('nextYear').addEventListener('click', () => {
            yearSelect.value = parseInt(yearSelect.value) + 1;
            loadChartData(yearSelect.value);
        });

        // Inisialisasi pertama kali
        loadChartData(yearSelect.value);
    });
</script>

@endsection
