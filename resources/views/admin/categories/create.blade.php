@extends('layouts.main')
@section('container')
    <form method="post" action="{{ route('categories.store') }}">
        <div class="form-group">
            @csrf
            <label for="name">Nama :</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
    </form>
@endsection
