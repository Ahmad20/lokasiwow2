@extends('layouts.main')
@section('container')
    <form method="post" action="{{ route('post.update', $posts->post_id) }}">
    <div class="form-group">
            @csrf
            @method('PATCH')
            <input type="hidden" name="image_link" value="{{$posts->image_link}}">
            <input type="hidden" name="rating_count" value="{{$posts->rating_count}}">
            <label for="title">Nama :</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$posts->title}}" />
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label for="location">Lokasi :</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$posts->location}}"/>
            @error('location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <label for="rating_score">Rating :</label>
            <input type="text" class="form-control @error('rating_score') is-invalid @enderror" name="rating_score" value="{{$posts->rating_score}}"/>
            @error('rating_score')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Ubah Info Wisata</button>
    </form>
@endsection
