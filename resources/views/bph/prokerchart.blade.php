<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart Progress Program Kerja</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Dropdown untuk memilih kementrian -->
    <form method="GET" action="{{ url('/bph/prokerchart') }}">
        <select name="id_kementrian" onchange="this.form.submit()">
            @foreach ($kementrians as $kementrian)
                <option value="{{ $kementrian->id }}" {{ $kementrian->id == $id_kementrian ? 'selected' : '' }}>
                    {{ $kementrian->nama_kementrian }}
                </option>
            @endforeach
        </select>
    </form>

    <canvas id="progressChart" width="400" height="200"></canvas>

    <script>
        const ctx = document.getElementById('progressChart').getContext('2d');
        const progressChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json(array_column($data, 'nama_proker')),
                datasets: [{
                    label: 'Progress (%)',
                    data: @json(array_column($data, 'progress')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    </script>
</body>
</html>
