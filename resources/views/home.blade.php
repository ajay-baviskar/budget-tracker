@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <!-- Summary Card -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Summary</h5>
            <p>Total Income: ₹{{ number_format($incomes, 2) }}</p>
            <p>Total Expenses: ₹{{ number_format($expenses, 2) }}</p>
            <p>Balance: ₹{{ number_format($balance, 2) }}</p>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Income vs Expenses</h5>
            <canvas id="pieChart"></canvas>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('pieChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Income', 'Expenses'],
            datasets: [{
                label: 'Income vs Expenses',
                data: [{{ $incomes }}, {{ $expenses }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ₹' + tooltipItem.raw.toFixed(2);
                        }
                    }
                }
            }
        }
    });
});
</script>
@endsection
