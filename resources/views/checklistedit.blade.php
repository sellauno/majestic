@if(auth()->user()->role == 'admin')
@extends('layouts.layout')
@endif

@if(auth()->user()->role == 'user')
@extends('layouts.layoutuser')
@endif

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
                    <h5>Edit Checklist</h5>
                </div>
                <div class="card-body">
                    <form role="form text-left" action="{{route('updateChecklist', ['id' => $checklist->idChecklist])}}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-2"><label>To do</label></div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" name="todo" value="{{$checklist->toDO}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Start</label></div>
                            <div class="col-12 col-md-3">
                                <input type="datetime-local" name="tglStart" class="form-control" value="{{$checklist->tglStart}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Deadline</label></div>
                            <div class="col-12 col-md-3">
                                <input type="datetime-local" name="deadline" class="form-control" value="{{$checklist->deadline}}">
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