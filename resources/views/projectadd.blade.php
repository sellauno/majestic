@extends('layouts.layout')

@section('title', 'Form Client')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Form Client</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Client Baru</h5>
                </div>
                <div class="card-body">
                    <form role="form text-left">
                        @csrf
                        <!-- <div class="row form-group">
                            <div class="col col-md-2"><label>Client</label></div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" placeholder="Name" aria-label="Name">
                            </div>
                        </div> -->
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Client</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <select id="role" name="role" class="form-control">
                                        @foreach($clients as $client)
                                        <option value="{{$client->idClient}}">{{$client->namaClient}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"></div>
                            <div class="col-12 col-md-6">
                                <!-- <h6><a href="{{route('addClient')}}"><i class="fas fa-plus"></i> Tambah Client Baru</a></h6> -->
                                <label class="custom-control-label"><a href="{{route('addClient')}}"><i class="fas fa-plus"></i> Tambah Client Baru</a></h6></label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Tanggal Mulai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" class="form-control" placeholder="Name" aria-label="Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Tanggal Selesai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" class="form-control" placeholder="Name" aria-label="Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Reels</label></div>
                            <div class="col-12 col-md-2">
                                <input type="number" class="form-control" placeholder="0" aria-label="Name">
                            </div>
                            <div class="col col-md-2"><label>Tiktok</label></div>
                            <div class="col-12 col-md-2">
                                <input type="number" class="form-control" placeholder="0" aria-label="Name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Feeds</label></div>
                            <div class="col-12 col-md-2">
                                <input type="number" class="form-control" placeholder="0" aria-label="Name">
                            </div>
                            <div class="col col-md-2"><label>Stories</label></div>
                            <div class="col-12 col-md-2">
                                <input type="text" class="form-control" placeholder="0" aria-label="Name">
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <h6>Team</h6>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Penanggung Jawab</label></div>
                            <div class="col-12 col-md-6 nav-item">
                                <select id="role" name="idPJ" class="dropdown form-control">
                                    <!-- <option value="1" id="inlineCheckbox1">1</option>
                                    <option value="2" id="inlineCheckbox2">2</option>
                                    <option value="3" id="inlineCheckbox3">3</option> -->
                                    <!-- @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" id = "inlineCheckbox{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach -->
                                </select>
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
                                <!-- @foreach($employees as $employee)
                                <div class="form-check  mb-0">
                                    <input class="form-check-input" name="idUser[]" value="{{$employee->idUser}}" type="checkbox" value="" id="fcustomCheck1">
                                    <label class="custom-control-label" for="customCheck1">{{$employee->name}}</label>
                                </div>
                                @endforeach -->

                                <!-- TOMBOL + Tambah Anggota -->
                                <!-- <div class="dropdown pe-4">
                                    <button type="button" name="add" id="add" class="btn btn-success btn-xs cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-plus"></i> Tambah Anggota
                                    </button>
                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                        @foreach($employees as $employee)
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">{{$employee->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn bg-gradient-dark w-30 my-4 mb-2">Simpan</button>
                        </div>
                    </form>
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