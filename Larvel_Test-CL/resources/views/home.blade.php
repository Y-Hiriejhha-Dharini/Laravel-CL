@extends('master.master')
@section('content')

<div class="bg">
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Purchase Site</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{session('user')['username']}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <section class="container btn-adm text-center">
        <div>
            <a href="zoneform" class="btn btn-primary btn-lg box text-wrap" role="button">Zone</a>
            <a href="regionform" class="btn btn-primary btn-lg box text-wrap" role="button">Region</a>
            <a href="territoryform" class="btn btn-primary btn-lg box text-wrap" role="button">Territory</a>
            <a href="userform" class="btn btn-primary btn-lg box text-wrap" role="button">Users</a>
            <a href="productform" class="btn btn-primary btn-lg box text-wrap" role="button">Products</a>
        </div>
        <div class="mt-2 text-center">
            <a href="poform" class="btn btn-primary btn-lg box text-wrap" role="button">Purchase Orders</a>
            <a href="poviewform" class="btn btn-primary btn-lg box text-wrap" role="button">Purchase Orders Views</a>
        </div>
    </section>
</div>
@endsection