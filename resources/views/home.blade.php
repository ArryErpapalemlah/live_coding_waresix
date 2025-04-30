@extends('layout.app')
@section('content')

<div class="container mx-auto mt-5">
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center">Welcome to the Home Page</h1>
    <p class="text-center">This is a simple home page.</p>
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('add_usr') }}" class="btn btn-primary">Tambah User</a>

    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('edit_usr', $user->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('user.store') }}" method="POST" style="display:inline-block;">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('logout.action') }}" class="btn btn-danger">Logout</a>
    </div>
</div>

@endsection