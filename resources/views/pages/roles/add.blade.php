@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Roles </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('roleIndex')}}">Roles</a></li>
                        <li class="breadcrumb-item"><a href="#">Qo'shish</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-xl-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Qo'shish</h4>

                    <form method="post" action="{{route('roleCreate')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">User Name</label>
                            <input type="text" class="form-control {{$errors->has('name') ? "parsley-error":"" }}" name="name" >
                            @if($errors->has('name') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('name') }}</li>
                                </ul>
                            @endif
                         </div>
                        <div class="mb-3" >
                            <label class="form-label">Ruxsatlar</label>
                            <select name="permissions[]" class="select2 form-control select2-multiple " multiple="" >
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="formrow-email-input" class="form-label">Izoh</label>
                            <input type="text" name="title" class="form-control" >

                        </div>
                        <div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="{{route('roleIndex')}}" class="btn text-muted d-none d-sm-inline-block btn-link">
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


