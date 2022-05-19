@extends('layouts.layout')

@section('title', 'Form Team')

@section('client', 'dashboard')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Form Team</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Edit Team</h5>
                </div>
                <div class="card-body">
                    <form role="form text-left" action="{{route('updateClient', ['id' => $client->idClient])}}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Nama</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <select id="idUser" name="idUser" class="form-control">
                                        @foreach($users as $user)
                                        <option value="{{$user->idUser}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Jabatan</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <select id="jabatan" name="jabatan" class="form-control">
                                        <option value="Penanggung Jawab">Penanggung Jawab</option>
                                        <option value="Anggota">Anggota</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-30 my-4 mb-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection