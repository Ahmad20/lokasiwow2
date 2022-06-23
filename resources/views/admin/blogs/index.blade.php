@extends('layouts.main')
<style>
    .hideextra {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>
@section('container')
    <div class="container">
        @if (session()->has('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if (session()->has('failed'))
            <p class="alert alert-danger">{{ session('failed') }}</p>
        @endif
        <h1>Admin Blog</h1>
        <button class="btn btn-success" onclick="window.location.href='{{ route('blogs.create') }}';">Tambah item</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col" style="width: 700px">Content</th>
                    <th scope="col" colspan="2" style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->blog_id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->content }}</td>
                        <td class="hideextra">
                            <button class="btn btn-warning me-2"
                                onclick="window.location.href='{{ route('blogs.edit', $blog->blog_id) }}';">Edit</button>
                        </td>
                        <td>
                            <form action="{{ route('blogs.destroy', $blog->blog_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class='d-flex justify-content-center'>
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
