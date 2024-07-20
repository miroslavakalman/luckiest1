<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@extends('layouts.app')

@section('content')
<body>
<h1 class="note-h1">График изменений настроения</h1>

    <div class="chart-container" style=" margin-top: 8%; position: relative; height:40vh; width:80vw">
        <canvas id="moodChart"></canvas>
    </div>
    <script>
    fetch('{{ route("moods.data") }}')
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('moodChart').getContext('2d');
        const moodChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map(mood => new Date(mood.created_at).toLocaleDateString()),
                datasets: [{
                    label: 'Уровень настроения',
                    data: data.map(mood => mood.mood_level),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Дата'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Уровень настроения'
                        },
                        beginAtZero: true,
                        min: 1,
                        max: 10
                    }
                }
            }
        });
    });
    </script>
</body>
@endsection