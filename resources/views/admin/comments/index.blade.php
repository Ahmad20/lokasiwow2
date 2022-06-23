@extends('layouts.main')
@section('container')
    <div class="container">
        @if (session()->has('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if (session()->has('failed'))
            <p class="alert alert-danger">{{ session('failed') }}</p>
        @endif
        <h1>Admin Comment</h1>
        {{-- Komen ditambahkan lewat postingan --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Post ID</th>
                    <th scope="col">Text</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->post_id }}</td>
                        <td>{{ $comment->comment_text }}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td>
                            <form action="{{ route('comments.destroy', $comment->comment_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
