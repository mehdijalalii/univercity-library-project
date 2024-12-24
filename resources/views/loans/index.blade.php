@extends('layouts.app')

@section('content')
    <h1>Loans</h1>
    <a href="/loans/create" class="btn btn-primary mb-3">Add Loan</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Member</th>
            <th>Book</th>
            <th>Borrowed At</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($loans as $loan)
            <tr>
                <td>{{ $loan->id }}</td>
                <td>{{ $loan->member->name }}</td>
                <td>{{ $loan->book->title }}</td>
                <td>{{ $loan->created_at }}</td>
                <td>{{ $loan->is_returned ? "Returned" : 'Not Returned' }}</td>
                <td>
                    @if (!$loan->is_returned)
                        <form action="{{ route('loans.return', $loan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-success">Mark as Returned</button>
                        </form>
                    @else
                        Already Returned
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
