@extends('layouts.layout')

@section('title', 'Edit Project')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Project</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Project Baru</h5>
                </div>
                <div class="card-body">
                    @foreach($projects as $project)
                    <form role="form text-left" action="{{route('updateProject', ['id' => $project->idProject])}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="New Project!">
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Client</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <input type="text" name="namaClient" class="form-control" value="{{$project->namaClient}}" readonly>
                                    <input type="hidden" name="idClient" class="form-control" value="{{$project->idClient}}" readonly>
                                    <!-- <option value="{{$project->idClient}}">{{$project->namaClient}}</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Tanggal Mulai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" name="tglMulai" class="form-control" value="{{$project->tglMulai}}" placeholder="Name" aria-label="Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Tanggal Selesai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" name="tglSelesai" class="form-control" value="{{$project->tglSelesai}}" placeholder="Name" aria-label="Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Reels</label></div>
                            <div class="col-12 col-md-2">
                                <input type="number" name="reels" class="form-control" value="{{$project->reels}}" placeholder="0" aria-label="Name">
                            </div>
                            <div class="col col-md-2"><label>Tiktok</label></div>
                            <div class="col-12 col-md-2">
                                <input type="number" name="tiktok" class="form-control" value="{{$project->tiktok}}" placeholder="0" aria-label="Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Feeds</label></div>
                            <div class="col-12 col-md-2">
                                <input type="number" name="feeds" class="form-control" value="{{$project->feeds}}" placeholder="0" aria-label="Name">
                            </div>
                            <div class="col col-md-2"><label>Stories</label></div>
                            <div class="col-12 col-md-2">
                                <input type="text" name="stories" class="form-control" value="{{$project->stories}}" placeholder="0" aria-label="Name">
                            </div>
                        </div>
                        <br>

                        <!-- TEAM -->
                        <div class="row form-group">
                            <h6>Team</h6>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label>Penanggung Jawab</label></div>
                            <div class="col-12 col-md-6 nav-item">
                                <div class="dropdown">
                                    <select id="idPJ" name="idPJ" class="form-control">
                                        <option value="2">2</option>
                                        <option value="1" @if($project->idPJ==null){{'selected'}} @endif>1</option>
                                        <option value="3">3</option>
                                        @foreach($employees as $employee)
                                        <!-- <option value="{{$employee->id}}" id="inlineCheckbox{{$employee->id}}" @if($project->idPJ==$employee->id){{'selected'}} @endif >{{$employee->name}}</option> -->
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Anggota</label></div>
                            <div class="col-12 col-md-6">

                                <div class="form-check  mb-0">
                                    <input class="form-check-input" id="inlineCheckbox1" name="idUser[]" value="1" type="checkbox" value="" id="fcustomCheck1">
                                    <label class="custom-control-label" for="customCheck1">1</label>
                                </div>
                                <div class="form-check  mb-0">
                                    <input class="form-check-input" id="inlineCheckbox2" name="idUser[]" value="2" type="checkbox" value="" id="fcustomCheck1">
                                    <label class="custom-control-label" for="customCheck1">2</label>
                                </div>
                                <div class="form-check  mb-0">
                                    <input class="form-check-input" id="inlineCheckbox3" name="idUser[]" value="3" type="checkbox" value="" id="fcustomCheck1">
                                    <label class="custom-control-label" for="customCheck1">3</label>
                                </div>
                                @foreach($employees as $employee)
                                <div class="form-check  mb-0">
                                    <input class="form-check-input" name="idUser[]" value="{{$employee->idUser}}" type="checkbox" value="" id="fcustomCheck1">
                                    <label class="custom-control-label" for="customCheck1">{{$employee->name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- END TEAM -->

                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-30 my-4 mb-2">Simpan</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#inlineCheckbox1").click(function() {
        $(":checkbox").not(this).prop("disabled", this.checked);
    });

    $(function() {
        if ($('#inlineCheckbox1').is(":checked"))
            $(":checkbox").not($('#inlineCheckbox1')).prop("disabled", true);
    })
</script>
@endsection