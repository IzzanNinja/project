@extends('layouts.app')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <section class="vh-100 bg-image" style="background-image: url('{{ asset('img/padionlykabur.jpg') }}'); background-size: cover;">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Daftar Pengguna Baru</h2>

                                    <div class="form-group">
                                        <label for="nokp" class="col-md-4 col-form-label text-md-right">{{ __('Kad Pengenalan') }}</label>
                                        <div class="input-group">
                                            <input id="nokp" type="text" class="form-control @error('nokp') is-invalid @enderror" name="nokp" value="{{ old('nokp') }}" required autofocus>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-primary" onclick="checkNOKP()">Check</button>
                                            </div>
                                        </div>
                                        @error('nokp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>



                                    <div id="user-info" style="display: none;">
                                        <div class="form-outline mb-4">
                                            <input id="name" type="text" class="form-control" name="name" required>
                                            <label class="form-label" for="name">Nama Penuh</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input id="email" type="email" class="form-control" name="email" required>
                                            <label class="form-label" for="email">Email Anda</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input id="password" type="password" class="form-control" name="password" required>
                                            <label class="form-label" for="password">Kata Laluan</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            <label class="form-label" for="password-confirm">Ulang Kata Laluan</label>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button id="register-btn" type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" style="display: none;">Daftar</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Sudah Daftar? <a href="{{ route('login') }}" button type="button" class="btn btn-link btn-outline-primary">Log Masuk disini</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <script>
       function checkNOKP() {
    var nokp = document.getElementById('nokp').value;

    // Send an AJAX request to check if NOKP exists
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.exists) {
                    // Existing NOKP found, show user info and enable registration button
                    document.getElementById('user-info').style.display = 'block';
                    document.getElementById('register-btn').style.display = 'block';
                    alert('No Kad Pengenalan sudah wujud. Sila daftar nama, email dan kata laluan baru.');

                } else {
                    // NOKP not found, hide user info and disable registration button
                    document.getElementById('user-info').style.display = 'block';
                    document.getElementById('register-btn').style.display = 'block';
                    alert('No Kad Pengenalan belum wujud. Sila daftar pengguna baru.');
                }
            } else {
                console.log('Error: ' + xhr.status);
            }
        }
    };

    // Get the CSRF token value from the page
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    xhr.open('GET', '/check-nokp/' + nokp);
    // Set the CSRF token in the request headers
    xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
    xhr.send();
}

    </script>

@endsection
