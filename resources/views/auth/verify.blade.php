@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-4">
                                <h5 class="text-primary">Parolni tiklash</h5>
                                <p>Parolni osson tiklang!</p>
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
                        {{--                        <div class="alert alert-success text-center mb-4" role="alert">--}}
                        {{--                            Enter your Email and instructions will be sent to you!--}}
                        {{--                        </div>--}}
                        <form class="form-horizontal" action="index.html">

                            <div class="mb-3">
                                <label for="useremail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="useremail" placeholder="Emailingizni kiriting">
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Tiklash</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-5 text-center">
                <p>Esladingizmi? <a href="{{route('login')}}" class="fw-medium text-primary">Kirish</a> </p>
            </div>

        </div>
    </div>
@endsection
