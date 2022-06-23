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
                    <th scope="col">Username</th>
                    <th scope="col">Waktu Dibuat</th>
                    <th scope="col" style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
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
            Halaman : {{ $users->currentPage() }} / {{ $users->lastPage() }} |

            @if ($users->perPage() > $users->total())
                Data : {{ $users->total() }} / {{ $users->total() }}
            @else
                Data : {{ $users->perPage() }} / {{ $users->total() }}
            @endif 
            <br/>
        </div>    
            <div class='d-flex justify-content-center'>
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
    </div>
@endsection
