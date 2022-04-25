@extends('layouts.layout')

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
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Nama client</label></div>
                            <div class="col-12 col-md-6">
                                <input type="text" class="form-control" placeholder="Name" aria-label="Name">
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
                                <select id="role" name="role" class="dropdown form-control">
                                    <option value="admin1">Admin Front Office</option>
                                    <option value="admin2">Admin Back Office</option>
                                    <option value="superadmin">Super Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Anggota</label></div>
                            <div class="col-12 col-md-6">
                                
                                <div class="dropdown pe-4">
                                    <button type="button" name="add" id="add" class="btn btn-success btn-xs cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-plus"></i> Tambah Anggota
                                    </button>
                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Start : 10/10/2022</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;"><b> 10 Konten<b></a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Finish : 10/11/2022</a></li>
                                    </ul>
                                </div>
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

@endsection