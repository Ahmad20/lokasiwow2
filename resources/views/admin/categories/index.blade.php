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
        <h1>Admin Kategori</h1>
        <button class="btn btn-success" onclick="window.location.href='{{ route('categories.create') }}';">Tambah item</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Waktu Dibuat</th>
                    <th scope="col" colspan="2" style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->category_id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td class="hideextra">
                            <button class="btn btn-warning me-2"
                                onclick="window.location.href='{{ route('categories.edit', $category->category_id) }}';">Edit</button>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->category_id) }}" method="post">
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
