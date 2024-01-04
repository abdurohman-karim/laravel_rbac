@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-4">
                                <h5 class="text-primary">Hush kelibsiz!</h5>
                                <p>Login parol orqali kiring!</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="auth-logo">
                        <a href="index.html" class="auth-logo-light">
                            <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo-light.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                            </div>
                        </a>

                        <a href="index.html" class="auth-logo-dark">
                            <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                            </div>
                        </a>
                    </div>
                    <div class="p-2">
                        <form class="form-horizontal" method="POST" action="{{route('login_store')}}">
                            @csrf
                            @error('email')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input value="{{old('email')}}"  name="email" type="text" class="form-control" id="username" placeholder="Emailingizni kiriting">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Parol</label>
                                <div class="input-group auth-pass-inputgroup">
                                    <input name="password" type="password" class="form-control" placeholder="Parolni kiriting" aria-label="Password" aria-describedby="password-addon">
                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                </div>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-check">
                                <label class="form-check-label" for="remember-check">
                                    Eslab qo'lish
                                </label>
                            </div>

                            <div class="mt-3 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Kirish</button>
                            </div>



                            <div class="mt-4 text-center">
                                <a href="{{route('reset')}}" class="text-muted"><i class="mdi mdi-lock me-1"></i> Parolni esdan chiqardingizmi?</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">

                <div>
                    <p>Sizda hali registratsiyadan o'tmadingizmi? <a href="{{route('register')}}" class="fw-medium text-primary">Registratsiya</a> </p>

                </div>
            </div>

        </div>
    </div>
@endsection
