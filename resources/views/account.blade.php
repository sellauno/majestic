@extends('layouts.layout')

@section('account', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Clients</li>
@endsection

@section('content')
<div class="container-fluid py-4">
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