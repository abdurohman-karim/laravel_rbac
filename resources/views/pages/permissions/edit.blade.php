@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Permisson </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{route('permissionIndex')}}">Permissions</a></li>
                        <li class="breadcrumb-item"><a href="#">Tahrirlash</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-xl-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Tahrirlash</h4>

                    <form method="post" action="{{route('permissionUpdate',$permission->id)}}">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label ">Nomi</label>
                            <input value="{{ old('name',$permission->name) }}" type="text" class="form-control {{$errors->has('name') ? "parsley-error":"" }}" name="name" >
                            @if($errors->has('name') || 1)
                                <ul class="parsley-errors-list filled"  aria-hidden="false">
                                    <li class="parsley-required">{{ $errors->first('name') }}</li>
                                </ul>
                            @endif


                        </div>
                        <div class="mb-3">
                            <label for="formrow-email-input" class="form-label">Izoh</label>
                            <input value="{{ old('title',$permission->title) }}" type="text" name="title" class="form-control" >

                        </div>
                        <div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <a href="{{route('permissionIndex')}}" class="btn text-muted d-none d-sm-inline-block btn-link">
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


