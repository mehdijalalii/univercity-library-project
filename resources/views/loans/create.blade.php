@extends('layouts.app')

@section('content')
    <h1>Create Loan</h1>

    <form action="/loans" method="POST">
        @csrf

        <div class="mb-3">
            <label for="member_id" class="form-label">Member</label>
            <select class="form-control @error('member_id') is-invalid @enderror" id="member_id" name="member_id" required>
                <option value="">Select Member</option>
                @foreach($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->name }}
                    </option>
                @endforeach
            </select>
            @error('member_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Book</label>
            <select class="form-control @error('book_id') is-invalid @enderror" id="book_id" name="book_id" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
            @error('book_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Create Loan</button>
    </form>
@endsection
