<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"
        type="text/css">
    <title>Lokasiwow</title>
</head>

<body style="background-color: #F4F1F1;">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #051334;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bolder fs-3" href="/">LokasiWow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/page') }}">Tempat favorit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categories">Kategori</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center text-light">
                    {{-- <p class="mb-0 me-2">Hello, Guest</p> --}}
                    @yield('greeting')
                    @yield('button')
                    {{-- <button type="button" class="btn me-1" style="background-color: #FF9E53;"
                        onclick="location.href='{{ url('login') }}'">Login</button>
                    <button type="button" class="btn btn-warning me-1"
                        onclick="location.href='{{ url('register') }}'">Register</button> --}}
                </div>
            </div>
        </div>
    </nav>

    @yield('container')

    <footer class="mt-2">
        <p class="text-center" style="color: gray;">2022 Copyright LokasiWow | All rights reserved</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @yield('script')
</body>

</html>
