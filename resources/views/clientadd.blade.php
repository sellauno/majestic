@extends('layouts.layout')

@section('title', 'Form Client')

@section('client', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Form Client</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="d-flex justify-content-center mb-3">
            <div class="col-lg-10 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Client Baru</h5>
                    </div>
                    <div class="card-body">
                        <form role="form text-left" action="{{route('createClient')}}" method="POST">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-4"><label>Nama client</label></div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="namaClient" placeholder="Name" aria-label="Name"  required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-4"><label>Deskripsi</label></div>
                                <div class="col-12 col-md-6">
                                    <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" aria-label="Deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn bg-gradient-dark w-30 my-4 mb-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection