@extends('layouts.main')

@section('container')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Dash</th>
                    <th scope="col">Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Admin Panel Post</td>
                    <td><a href="/post">Link</a></td>
                </tr>
                <tr>
                    <td>Admin Panel Blog</td>
                    <td><a href="/blogs">Link</a></td>
                </tr>
                <tr>
                    <td>Admin Panel Comment</td>
                    <td><a href="/comments">Link</a></td>
                </tr>
                <tr>
                    <td>Admin Panel Category</td>
                    <td><a href="/categories">Link</a></td>
                </tr>
                <tr>
                    <td>Admin Panel Location</td>
                    <td><a href="/location">Link</a></td>
                </tr>
                <tr>
                    <td>Admin Panel User</td>
                    <td><a href="/users">Link</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
