@extends('layouts.app')

@section('content')
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

            // Check if nokp is not empty
            if (nokp.trim() !== '') {
                // Existing NOKP found, show user info and enable registration button
                document.getElementById('user-info').style.display = 'block';
                document.getElementById('register-btn').style.display = 'block';
            } else {
                // NOKP is empty, hide user info and disable registration button
                document.getElementById('user-info').style.display = 'none';
                document.getElementById('register-btn').style.display = 'none';
                alert('Please provide a valid NOKP.');
            }
        }
    </script>


        {{-- // function checkNOKP() {
        //     var nokp = document.getElementById('nokp').value;

        //     // Simulate NOKP check
        //     if (nokpExists(nokp)) {
        //         // Existing NOKP found, show user info and enable registration button
        //         document.getElementById('user-info').style.display = 'block';
        //         document.getElementById('register-btn').style.display = 'block';
        //     } else {
        //         // NOKP not found, hide user info and disable registration button
        //         document.getElementById('user-info').style.display = 'none';
        //         document.getElementById('register-btn').style.display = 'none';
        //         alert('NOKP not found. Please provide a valid NOKP.');
        //     }
        // }

        // // Function to check if NOKP exists (Replace with your own logic)
        // function nokpExists(nokp) {
        //     // Simulate NOKP existence check
        //     // Replace this with your own logic to check NOKP on the server-side
        //     var existingNOKPs = ['1234567890', '9876543210', '5678901234'];
        //     return existingNOKPs.includes(nokp);
        // } --}}

@endsection
