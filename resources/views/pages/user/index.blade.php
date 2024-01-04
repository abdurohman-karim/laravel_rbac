@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Userlar</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="#">Userlar</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box me-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            @can('user.add')
                                <div class="text-sm-end">
                                    <a href="{{route('userAdd')}}" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="bx bx-user-plus"></i> Qo'shish</a>
                                </div>
                            @endcan()
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-editable table-nowrap align-middle table-edits">
                            <thead>
                            <tr style="cursor: pointer;">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Rollar</th>
                                <th>Ruxsatlar</th>
                                <th>Amallar</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr style="cursor: pointer;">
                                    <td>#{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td >{{$user->email}}</td>
                                    <td  class=" btn-group-sm">
                                        @foreach($user->roles as $role)
                                            <button type="button" class="btn btn-{{random()}} btn-rounded waves-effect waves-light ">{{$role->name}}</button>
                                        @endforeach
                                    </td>
                                    <td class="btn-group btn-group-sm">
                                        @foreach($user->getAllPermissions() as $permission)
                                            <button type="button" class="btn btn-{{random()}} btn-rounded waves-effect waves-light ">{{$permission->name}}</button>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('role.delete')
                                            <form method="post" action="{{route('userDestroy',$user->id)}}">
                                                @csrf
                                                @can('role.edit')
                                                    <a href="{{ route('userEdit',$user->id) }}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                @endcan
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button  onclick="return myFunction()" class="btn btn-outline-danger btn-sm edit" title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>

                                        @endcan()
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{--                    <ul class="pagination pagination-rounded justify-content-end mb-2">--}}
                    {{--                        {!! $permissions->links() !!}--}}
                    {{--                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
