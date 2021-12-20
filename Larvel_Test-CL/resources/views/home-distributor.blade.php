@extends('master.master')
@section('content')

<div>
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
            <a href="poform" class="btn btn-success btn-lg box-dist text-wrap" tabindex="-1" role="button">Purchase Orders</a>
            <a href="poviewform" class="btn btn-success btn-lg box-dist text-wrap" tabindex="-1" role="button">Purchase Orders Views</a>
        </div>
    </section>
</div>
@endsection