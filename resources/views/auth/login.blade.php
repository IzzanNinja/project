
@extends('layouts.app')

@section('content')

<!-- login.blade.php -->

@if (session('registration_success'))
    <div class="alert alert-success">
        {{ session('registration_success') }}
    </div>
@endif

<!-- Rest of your login page content -->



<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 text-center">
                <div class="card" style="background-color: gold; border-radius: 1rem;">
                    <div class="card-body">
<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

                <!-- Insert your logo here -->
                <img src="http://10.71.97.88:3006/images/doalogo.gif" alt="Logo" class="img-fluid mb-3" style="max-width: 200px;">
            </div>
            <h2 class="fw-bold mb-2 ">eBajak</h2>
                <p class="text-black-50 mb-5">Sistem Subsidi Petani</p>

                <div class="form-outline form-white mb-4"{{ __('E-Mail Address') }}>
                {{-- <input type="email" id="typeEmailX" class="form-control form-control-lg" /> --}}
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label class="form-label" for="typeEmailX">No Kad Pengenalan</label>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-outline form-white mb-4"{{ __('Password') }}>
                {{-- <input type="password" id="typePasswordX" class="form-control form-control-lg" /> --}}
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <label class="form-label" for="typePasswordX">Kata Laluan </label>@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Ingatkan Saya') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                </div><button class="btn btn-outline-dark btn-lg px-5 mb-3" type="submit">Log Masuk</button>
                <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="#!">Lupa kata laluan? sila klik sini</a></p>

                <p class="mb-0">Untuk pengguna baru sila daftar dahulu <a href="http://ebajak.test/register" class="btn btn-outline-light btn-lg px-5 btn-danger" onclick="openNewPage()">Daftar</a></p>
                </div>
            </div>
            <div>
                <div class="container" style="text-align: center;">
                <!-- Insert your footer logo here -->
                <img src="http://10.71.97.88:3006/images/logojpkn.png" alt="Footer Logo" style="max-width: 200px;">
                <div><span>&copy; {{ date('Y') }}© 2020 - 2023 Hak Cipta terpelihara Jabatan Perkhidmatan Komputer Negeri Sabah</span></div>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>


@endsection
