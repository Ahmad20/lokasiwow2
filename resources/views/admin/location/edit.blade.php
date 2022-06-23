@extends('layouts.main')
@section('container')
    <div class="container my-2">
        <form method="post" action="{{ route('location.update', $location->location_id) }}">
            <div class="form-group mb-2">
                @csrf
                @method('PATCH')
                <label for="title">Judul:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name=" title"
                    value="{{ $location->title }}" />
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ubah Blog</button>
        </form>
    </div>
@endsection
