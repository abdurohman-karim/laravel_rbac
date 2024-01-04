@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Profile</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('profile')}}">Profil</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel" aria-labelledby="v-pills-shipping-tab">
                                <div>
                                    <h4 class="card-title">Profil ma'lumoti</h4>
                                    @if(session('success'))
                                        <div id="liveAlertPlaceholder"><div><div class="alert alert-success alert-dismissible" role="alert">Muvofiqiyatli tahrirlandi!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div></div>
                                    @endif
                                    <p class="card-title-desc"></p>
                                    <form method="post" enctype="multipart/form-data" action="{{route('profile_store')}}">
                                        @csrf
                                        <div class="form-group row mb-4">
                                            <label for="billing-name" class="col-md-2 col-form-label">Ism</label>
                                            <div class="col-md-10">
                                                <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" id="billing-name" placeholder="Enter your name">
                                            </div>
                                            @error('name')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-email-address" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" value="{{auth()->user()->email}}" name="email" class="form-control" id="billing-email-address" placeholder="Enter your email">
                                            </div>
                                            @error('email')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-phone" class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input type="password" name="password" class="form-control" id="billing-phone" placeholder="Parolni kiriting..">
                                            </div>
                                            @error('password')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-address" class="col-md-2 col-form-label">Passwordni tasdiqlash</label>
                                            <div class="col-md-10">
                                                <input type="password" name="password_confirmation"  class="form-control" id="billing-phone" placeholder="Parolni kiriting..">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="billing-address" class="col-md-2 col-form-label">Rasm tanlang:</label>
                                            <div class="col-md-10">
                                                <div class="mt-3">
                                                    <label for="formFile" class="form-label">Chiroyli tushgan rasmizi kiritin :)</label>
                                                    <input name="old_image" type="hidden" value="{{auth()->user()->photo_profile}}">
                                                    <input name="photo_profile" class="form-control" type="file" id="formFile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <a href="{{route('home')}}" class="btn text-muted d-none d-sm-inline-block btn-link">
                                                    <i class="mdi mdi-arrow-left me-1"></i> Orqoga</a>
                                            </div> <!-- end col -->
                                            <div class="col-sm-6">
                                                <div class="text-end">
                                                    <button class="btn btn-success">
                                                        <i class="mdi mdi-truck-fast me-1"></i>Saqlash</button>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
