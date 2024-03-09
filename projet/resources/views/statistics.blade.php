@extends('layout.layout')

@section('content')
    <div class="bg-dark" style="background:url('BGstat.jpg') no-repeat center center fixed; background-size: cover">
        <div class="container text-center mt-5">
            <div class="card mt-4">
                <h1 class="bold">Statistiques</h1>

                <div class="card-body text-center">
                    <p class="mb-1">Nombre d'utilisateurs :</p>
                    <h1 class="mb-4">{{ $userCount }}</h1>
                    <p class="mb-1">Nombre d'événements :</p>
                    <h1>{{ $eventCount }}</h1>
                </div>
            </div>

            <!-- Chart.js Chart -->
            <canvas id="statisticsChart" ></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js code to create a bar chart
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('statisticsChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Utilisateurs', 'Événements'],
                    datasets: [{
                        label: 'Nombre',
                        data: [{{ $userCount }}, {{ $eventCount }}],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection