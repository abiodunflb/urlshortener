<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .wrapper{
            height: 100vh;
        }

        .bg{
            background: #ff00ec;
        }

        .c-btn{
            background:#865283;
        }

        .form-control{
            width: 50% !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg">

    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex w-100 wrapper flex-column justify-content-center align-items-center">
                <h1 class="text-white text-center">URL SHORTENER WITH LARAVEL 8 BY AFOLABI ABIODUN</h1>
                @error('url')

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @enderror
                <form action="{{route('urlshortener.store')}}" method="POST" class="form">
                    @csrf
                    <div class="d-flex">
                        <input type="text" name="url" placeholder="Paste Url" class="form-control">
                        <button type="submit" class="btn btn-danger mx-2">Shorten Link</button>
                    </div>




                </form>
                @if(Session('success'))
                <p class="text-danger my-3 text-center">{!! Session('success') !!}</p>

                @endif
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
