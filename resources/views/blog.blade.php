@extends('layouts.main')
@section('container')
    <section class="container mt-3">
        <div class="container-fluid">
            <div class="row gx-2">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="google.com" target="_blank" style="text-decoration: none">
                        <div class="card">
                            <img src="https://placeholder.pics/svg/300x200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Judl</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis excepturi natus illo voluptatibus ducimus! Autem omnis nam suscipit obcaecati magni laboriosam. Expedita quia at magnam nobis nulla accusantium sunt tenetur.</p>
                                <p style="font-size: 12px; color: gray;" class="mb-0">Updated 7000 years ago</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('greeting')
    <p class="mb-0 me-2">Hello, julius</p>
@endsection
