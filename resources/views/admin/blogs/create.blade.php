@extends('layouts.main')
@section('container')
    <div class="container mt-3">
        <form method="post" action="{{ route('blogs.store') }}">
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

            <div class="form-group mb-2">
                <label for="content">Isi Blog :</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content"></textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Blog</button>
        </form>
    </div>
@endsection
