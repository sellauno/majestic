<?php
if (auth()->user()->role == 'admin') {
    $extend = 'layouts.layout';
} else if (auth()->user()->role == 'user') {
    $extend = 'layouts.layoutuser';
} ?>

@extends($extend)

@section('title', 'Form Checklist')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Form Checklist</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Checklist</h5>
                </div>
                <div class="card-body">
                    <form role="form text-left" action="{{route('updateChecklist', ['id' => $checklist->idChecklist])}}" method="POST">
                        @csrf
                        <input type="hidden" name="idProject" value="{{$checklist->idProject}}">
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Judul</label></div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" name="todo" value="{{$checklist->toDO}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Start</label></div>
                            <div class="col-12 col-md-6">
                                <input type="datetime-local" name="tglStart" class="form-control" value="{{$checklist->tglStart}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Deadline</label></div>
                            <div class="col-12 col-md-6">
                                <input type="datetime-local" name="deadline" class="form-control" value="{{$checklist->deadline}}">
                            </div>
                        </div>

                        <h6 class="text-sm mt-5">Pembagian Kerja</h6>

                        <!-- Table Checklist -->
                        <div class="table-responsive p-0">
                            <table class="table align-items-center  mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kegiatan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Anggota</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deadline</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!$subtodos->isEmpty())
                                    @foreach($subtodos as $subtodo)
                                    <input type="hidden" name="idsubtodo[]" value="{{$subtodo->idsubtodo}}">
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="text" class="form-control" name="subtodo[]" value="{{$subtodo->subtodo}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <select id="idUser" name="idUser[]" class="form-control">
                                                    <option disabled selected>Pilih Anggota</option>
                                                    @foreach($teams as $team)
                                                    <option value="{{$team->id}}" @if($subtodo->idUser == $team->id) selected @endif >{{$team->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-xs text-secondary">
                                                <input type="datetime-local" name="subtglStart[]" class="form-control" value="{{$subtodo->start}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-xs text-secondary">
                                                <input type="datetime-local" name="subdeadline[]" class="form-control" value="{{$subtodo->deadline}}">
                                            </div>
                                        </td>
                                        <td>
                                            <span><a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{route('deleteSubtodo', ['id' => $subtodo->idsubtodo])}}"><i class="far fa-trash-alt me-2"></i>Delete</a></span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    @foreach($proses as $p)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="text" class="form-control" name="subtodoNew[]" value="{{$p->value}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <select id="idUserNew" name="idUserNew[]" class="form-control">
                                                    <option disabled selected>Pilih Anggota</option>
                                                    @foreach($teams as $team)
                                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-xs text-secondary">
                                                <input type="datetime-local" name="subtglStartNew[]" class="form-control" value="{{$checklist->tglStart}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-xs text-secondary">
                                                <input type="datetime-local" name="subdeadlineNew[]" class="form-control" value="{{$checklist->deadline}}">
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table Checklist -->

                        <div class="text-end">
                            <button type="submit" class="btn bg-gradient-dark w-20 my-4 mb-2">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection