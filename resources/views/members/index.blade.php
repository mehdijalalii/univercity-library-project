@extends('layouts.app')

@section('content')
    <h1>Members</h1>
    <a href="/members/create" class="btn btn-primary mb-3">Add Member</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->phone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
