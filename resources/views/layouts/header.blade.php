<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Marketpalce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />

    {{-- custom css file --}}
    <link rel="stylesheet" href="{{ asset('assets/main.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('signup.page') }}">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.page') }}">Login</a>
                        </li>
                    @endguest

                    {{-- for auth users --}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">All Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.create') }}">Create Product</a>
                        </li>
                    @endauth
                </ul>

                @auth
                    <div class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-danger my-2 my-sm-0" href="{{ route('logout') }}">Logout</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4">
