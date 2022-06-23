@extends('layouts.main')
@section('container')
    <form method="post" action="{{ route('categories.update', $categories->category_id) }}">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <label for="name">Nama :</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $categories->name }}"/>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ubah Kategori</button>
    </form>
@endsection
