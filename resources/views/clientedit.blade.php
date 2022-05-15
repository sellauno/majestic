@extends('layouts.layout')

@section('title', 'Form Client')

@section('client', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Form Client</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Edit Client</h5>
                </div>
                <div class="card-body">
                    <form role="form text-left" action="{{route('updateClient', ['id' => $client->idClient])}}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Nama client</label></div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" name="namaClient" aria-label="Name" value="{{$client->namaClient}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Deskripsi</label></div>
                            <div class="col-12 col-md-6">
                                <textarea class="form-control" name="deskripsi" aria-label="Deskripsi">{{$client->deskripsi}}</textarea>
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