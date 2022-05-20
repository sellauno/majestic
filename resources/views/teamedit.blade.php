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
                    <form role="form text-left" action="{{route('updateTeam', ['id' => $team->idTeam])}}" method="POST">
                        @csrf
                        <input type="hidden" name="idProject" value="{{$team->idProject}}">
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Nama</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <select id="idUser" name="idUser" class="form-control">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" <?php if($user->id==$team->idUser) {?> selected <?php } ?>>{{$user->name}} </option>
                                        @endforeach
                                        <!-- <option  selected>Piih yang ini</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Jabatan</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <select id="jabatan" name="jabatan" class="form-control">
                                    <option value="Penanggung Jawab" <?php if($team->jabatan=="Penanggung Jawab") {?> selected <?php } ?>>Penanggung Jawab</option>
                                        <option value="Anggota" <?php if($team->jabatan=="Anggota") {?> selected <?php } ?>>Anggota</option>
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