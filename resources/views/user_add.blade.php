@extends('layout.app')
@section('content')

<div class="container mx-auto mt-5">
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <h1 class="text-center">{{ $title_form }}</h1>
    <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data" class="form-signin">
        @csrf
        <input name="name" type="text" id="inputName" class="form-control mb-2" placeholder="Name" required autofocus>
        <input name="email" type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required>
        <input name="password" type="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required>
        <input type="hidden" name="request_submission" value="0">
        <button class="btn btn-lg btn-primary btn-block sign-in-btn mb-2" type="submit">
            Submit
        </button>
    </form>
</div>
@endsection