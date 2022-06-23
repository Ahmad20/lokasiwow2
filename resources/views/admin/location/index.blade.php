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
        <h1>Admin Location</h1>
        <button class="btn btn-success" onclick="window.location.href='{{ route('location.create') }}';">Tambah
            item</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col" colspan="2" style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($location as $current)
                    <tr>
                        <td>{{ $current->location_id }}</td>
                        <td>{{ $current->title }}</td>
                        <td class="d-flex">
                            <div>
                                <button class="btn btn-warning me-2"
                                    onclick="window.location.href='{{ route('location.edit', $current->location_id) }}';">Edit</button>
                            </div>
                            <form action="{{ route('location.destroy', $current->location_id) }}" method="post">
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
            {{ $location->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
