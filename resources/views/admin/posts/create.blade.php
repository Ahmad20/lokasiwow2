@extends('layouts.main')
@section('container')
    <form method="post" action="{{ route('post.store') }}">
        <div class="form-group">
            @csrf
            <input type="hidden" name="image_link">
            <input type="hidden" name="rating_count">
            <label for="title">Nama :</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" />
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label for="location">Lokasi :</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" />
            @error('location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label for="rating_score">Rating :</label>
            <input type="text" class="form-control @error('rating_score') is-invalid @enderror" name="rating_score" />
            @error('rating_score')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Wisata</button>
    </form>
@endsection
