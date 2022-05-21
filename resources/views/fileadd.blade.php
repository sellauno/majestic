@extends('layouts.layoutnomenu')

@section('title', 'Form File')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Form File</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="d-flex justify-content-center mb-3">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>File Baru</h5>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" role="form text-left" action="{{route('uploadFile')}}" method="POST">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-2"><label>Nama file</label></div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="namaFile" placeholder="Name" aria-label="Name">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label>Deskripsi</label></div>
                                <div class="col-12 col-md-6">
                                    <input type="file" class="form-control" name="fileUpload" placeholder="Name" aria-label="Name">
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