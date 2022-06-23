@extends('layouts.main')
@section('container')
    <div class="container mt-3">
        <form method="post" action="{{ route('location.store') }}">
            <div class="form-group mb-2">
                @csrf
                <label for="title">Judul:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name=" title" />
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah Blog</button>
        </form>
    </div>
@endsection
