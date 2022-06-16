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
                            <input type="hidden" name="idProject" value="{{$todo->idProject}}">
                            <input type="hidden" name="idUser" value="{{$todo->idUser}}">
                            <input type="hidden" name="idChecklist" value="{{$todo->idChecklist}}">
                            <div class="row form-group">
                                <div class="col col-md-2"><label>Judul</label></div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="judul" placeholder="Judul" aria-label="Judul" value="{{$todo->toDO}}" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label>Kategori</label></div>
                                <div class="col-12 col-md-6">
                                    <select id="kategori" name="kategori" class="dropdown form-control" required>
                                    <option value="" disabled selected hidden>Pilih Kategori</option>
                                        <option value=" file" id="inlineCheckbox2">File</option>
                                        <option value="gambar" id="inlineCheckbox3">Gambar</option>
                                        <option value="video" id="inlineCheckbox2">Video</option>
                                        <!-- <option value="reels" id="inlineCheckbox1">Reels</option>
                                        <option value="feeds" id="inlineCheckbox3">Feeds</option>
                                        <option value="stories" id="inlineCheckbox4">Stories</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label>File</label></div>
                                <div class="col-12 col-md-6">
                                    <input type="file" class="form-control" name="fileUpload" placeholder="File" aria-label="File">
                                    <p class="text-xs">Jika file terlalu besar (lebih dari 5MB), upload file ke folder di bawah sesuai dengan kategori. Salin link file, kemudian masukkan ke dalam form di bawah</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label>Folder</label></div>
                                <div class="col-12 col-md-8">
                                    <div class="input-group">
                                        <a href="{{$file}}" target="_blank"><button class="btn btn-outline-primary mb-0" type="button">File</button></a>
                                        <a href="{{$gambar}}" target="_blank"><button class="btn btn-outline-primary mb-0" type="button">Gambar</button></a>
                                        <a href="{{$video}}" target="_blank"><button class="btn btn-outline-primary mb-0" type="button">Video</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label>Link File</label></div>
                                <div class="col-12 col-md-8">
                                    <input type="url" class="form-control" name="linkFile" placeholder="Link File">
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