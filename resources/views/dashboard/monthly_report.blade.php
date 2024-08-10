@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Monthly Report</h1>
    <form method="GET" action="{{ route('dashboard.monthly_report') }}">
        <div class="form-group">
            <label for="month">Select Month:</label>
            <input type="month" name="month" id="month" class="form-control" value="{{ $month }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
    @if($month)
        <div class="mt-4">
            <h5>Report for {{ $month }}</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Total Income</th>
                        <th>Total Expenses</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Overall</td>
                        <td>₹{{ number_format($incomes, 2) }}</td>
                        <td>₹{{ number_format($expenses, 2) }}</td>
                        <td>₹{{ number_format($balance, 2) }}</td>

                    </tr>
                    <!-- Add more rows here if needed for specific categories -->
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
