@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Userlar </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('userIndex')}}">Userlar</a></li>
                        <li class="breadcrumb-item active"><a href="#">Tahrirlash</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-xl-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Qo'shish</h4>

                    <form method="post" action="{{route('userUpdate',$user->id)}}">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Nomi</label>
                            <input value="{{$user->name}}" type="text" class="form-control {{$errors->has('name') ? "parsley-error":"" }}" name="name" >
                            @if($errors->has('name') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('name') }}</li>
                                </ul>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Email</label>
                            <input value="{{$user->email}}"  type="email" class="form-control {{$errors->has('email') ? "parsley-error":"" }}" name="email" >
                            @if($errors->has('email') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('email') }}</li>
                                </ul>
                            @endif
                        </div>
                        <div class="mb-3" >
                            <label class="form-label">Rollar</label>
                            <select name="roles[]" class="select2 form-control select2-multiple " multiple="" >
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}" {{ ($user->hasRole($role->name) ? "selected":'') }}>{{ $role->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Parol</label>
                            <input type="password" class="form-control {{$errors->has('password') ? "parsley-error":"" }}" name="password" >
                            @if($errors->has('password') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('password') }}</li>
                                </ul>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Parolni tasdiqlash</label>
                            <input type="password" class="form-control {{$errors->has('password_confirmation') ? "parsley-error":"" }}" name="password_confirmation" >
                            @if($errors->has('password_confirmation') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('password_confirmation') }}</li>
                                </ul>
                            @endif
                        </div>



                        <div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="{{route('userIndex')}}" class="btn text-muted d-none d-sm-inline-block btn-link">
                                        <i class="mdi mdi-arrow-left me-1"></i>Orqaga</a>
                                </div> <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-end">
                                        <button class="btn btn-success">
                                            <i class="mdi mdi-truck-fast me-1"></i>Saqlash</button>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
@endsection


