@extends('layout.app')
@section('content')

<div class="container mx-auto mt-5">
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action={{ route('login.process') }} enctype="multipart/form-data" class="form-signin">
        @csrf
        <div class="img-container d-flex justify-content-center mb-4">
            <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        </div>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block sign-in-btn" type="submit">
            Sign in
        </button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>
</div>
@endsection