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
        <h1>Admin Post</h1>
        <button class="btn btn-success" onclick="window.location.href='{{ route('post.create') }}';">Tambah item</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Rating</th>
                    <th scope="col" colspan="2" style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->post_id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->location }}</td>
                        <td>{{ $post->rating_score }}</td>
                        <td class="hideextra">
                            <button class="btn btn-warning me-2"
                                onclick="window.location.href='{{ route('post.edit', $post->post_id) }}';">Edit</button>
                        </td>
                        <td>
                            <form action="{{ route('post.destroy', $post->post_id) }}" method="post">
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
            Halaman : {{ $posts->currentPage() }} / {{ $posts->lastPage() }} |

            @if ($posts->perPage() > $posts->total())
                Data : {{ $posts->total() }} / {{ $posts->total() }}
            @else
                Data : {{ $posts->perPage() }} / {{ $posts->total() }}
            @endif 
            <br/>
        </div>    
            <div class='d-flex justify-content-center'>
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
    </div>
@endsection
