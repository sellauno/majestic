@extends('layouts.layout')

@section('title', 'Layanan')

@section('layanan', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Layanan</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 mb-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Jenis Layanan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a class="btn bg-gradient-primary mb-0" href="{{route('addJenisLayanan')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Jenis Layanan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Checklist</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($layanan as $jenis)
                                <tr>
                                    <td width="25%">
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$jenis->kategori}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach($layanan[$loop->iteration - 1]->proses as $proses)
                                        <p class="mb-0 text-sm">{{$loop->iteration}}. {{$proses['value']}} </p>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-link text-dark text-gradient px-2 mb-0" href="{{route('editJenisLayanan', ['id' => $jenis->idKategori])}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                        <a class="btn btn-link text-danger text-gradient px-2 mb-0" href="{{route('deleteJenisLayanan', ['id' => $jenis->idKategori])}}"><i class="far fa-trash-alt me-2"></i>Delete</a>
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