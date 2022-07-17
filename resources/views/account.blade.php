@extends('layouts.layout')

@section('account', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Clients</li>
@endsection

@section('content')
<div class="container-fluid py-4">

    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Gagal!</strong> Data akun digunakan tidak dapat dihapus!</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">User Table</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center  mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Posisi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                @foreach($user as $users)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$users->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-xs text-secondary">{{$users->role}}</div>
                                    </td>
                                    <td>
                                        <div class="text-xs text-secondary">{{$users->posisi}}</div>
                                    </td>
                                    <td>
                                        <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                            <li><a class="dropdown-item border-radius-md" href="{{route('editAccount', ['id' => $users->id])}}"><i class="fa fa-pencil text-xs"></i> Edit</a></li>
                                            @if($users->role=='admin' && $admin>1)
                                            <li><a class="dropdown-item border-radius-md text-danger text-gradient" href="{{route('deleteAccount', ['id' => $users->id])}}"><i class="fa fa-trash text-xs"></i> Delete</a></li>
                                            @endif
                                            @if($users->role=='user')
                                            <li><a class="dropdown-item border-radius-md text-danger text-gradient" href="{{route('deleteAccount', ['id' => $users->id])}}"><i class="fa fa-trash text-xs"></i> Delete</a></li>
                                            @endif
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection