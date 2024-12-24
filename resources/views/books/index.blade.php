@extends('layouts.app')

@section('content')
    <h1>Books</h1>
    <a href="/books/create" class="btn btn-primary mb-3">Add Book</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Published Year</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->published_year }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
