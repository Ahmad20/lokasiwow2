@extends('layout.main')
@section('container')

<div class="container">

  <h1>Admin panel user</h1>
  <button class="btn btn-success">Tambah item</button>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama user</th>
        <th scope="col">Button</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Test</td>
        <td><button class="btn btn-warning me-2">Edit</button><button class="btn btn-danger">Delete</button></td>
      </tr>
    </tbody>
  </table>
</div>

@endsection