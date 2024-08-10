@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Incomes</h1>
    <a href="{{ route('incomes.create') }}" class="btn btn-primary mb-3">Add Income</a>
    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incomes as $income)
                <tr>
                    <td>{{ $income->description }}</td>
                    <td>₹{{ number_format($income->amount, 2) }}</td>
                    <td>{{ $income->date }}</td>
                    <td>{{ $income->category->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
