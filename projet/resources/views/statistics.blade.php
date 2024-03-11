@extends('layout.layout')

@section('content')
    @if ($role['isAdmin'])
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
                <canvas id="statisticsChart"></canvas>
            </div>
        </div>
    @else



            <div class="overflow-x-auto">
                <h1 class="font-bold m-12">ticket Requests :</h1>
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Event Title</th>
                            <th class="px-4 py-2">Place</th>
                            <th class="px-4 py-2">Start Date</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Number of Tickets</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reference)
                            <tr>
                                <td class="border px-4 py-2">{{ $reference->event->title }}</td>
                                <td class="border px-4 py-2">{{ $reference->event->place }}</td>
                                <td class="border px-4 py-2">{{ $reference->event->start_date }}</td>
                                <td class="border px-4 py-2">{{ $reference->event->price }}</td>
                                <td class="border px-4 py-2">{{ $reference->tickets }}</td>
                                <td class="border px-4 py-2">
                                    {{-- Add your action here --}}
                                    {{-- Example: Approve button --}}
                                    <a href="{{ route('approve.event', $reference->event_id) }}">
                                        <button type="button"
                                            class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Approve</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
    @endif

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Chart.js code to create a bar chart
        document.addEventListener('DOMContentLoaded', function() {
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
