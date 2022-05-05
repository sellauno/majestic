@extends('layouts.layout')

@section('title', 'Form Client')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Form Client</li>
@endsection

@section('content')
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
    </div>
</div>
<script>
    document.getElementById("inlineCheckbox3").disabled = true;
</script>
@endsection