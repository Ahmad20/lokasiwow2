@extends('layouts.main')
@section('container')
    <div class="container">
        <h1 class="mb-3">Profile page</h1>
        <form method="post">
            @csrf
            <label>
                <span>Enter your username</span>
                <input type="hidden" name="old-username" value="{{ session('username') }}" />
                <input placeholder="Username" value="{{ session('username') }}" name="new-username" />
            </label>
            <button class="btn btn-primary" type="submit" formaction="/profile/edit">Change username</button>
            <button class="btn btn-primary" type="submit" formaction="/profile/delete">Delete profile</button>
        </form>

    </div>
@endsection
@section('greeting')
    <a href="/profile" style='text-decoration:none; color:white'>
        <p class="mb-0 me-2">
            @if (session()->has('username'))
                Hello, {{ session('username') }}
            @endif
        </p>
    </a>
@endsection
