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
                                <p>Ro'yxatdan o'tish</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div>
                        <a href="index.html">
                            <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                            </span>
                            </div>
                        </a>
                    </div>
                    <div class="p-2">
                        <form class="needs-validation" method="POST" action="{{route('store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" id="useremail" placeholder="Emailingizni kiriting" required>
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Ism</label>
                                <input type="text" class="form-control" value="{{old('name')}}"  name="name" id="username" placeholder="Ismingizni kiriting" required>
                                @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="userpassword" class="form-label">Parol</label>
                                <input type="password" name="password"  class="form-control" id="userpassword" placeholder="Parolni kiriting" required>
                                @error('password')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="userpassword" class="form-label">Parolni tasdiqlash</label>
                                <input type="password" name="password_confirmation" class="form-control" id="userpassword" placeholder="Enter password" required>
                                <div class="invalid-feedback">
                                    Parolni kiriting
                                </div>
                            </div>

                            <div class="mt-4 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Registratsiya</button>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">

                <div>
                    <p>Allaqachon ro'yhadan o'tganmisz? <a href="{{route('login')}}" class="fw-medium text-primary">Kirish</a> </p>

                </div>
            </div>

        </div>
    </div>
@endsection
