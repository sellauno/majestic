@extends('layouts.layout')

@section('title', 'Tambah Project')

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
                    <form role="form text-left" action="{{route('createProject')}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="new">
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Client</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <select id="idClient" name="idClient" class="form-control">
                                        @foreach($clients as $client)
                                        <option value="{{$client->idClient}}">{{$client->namaClient}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row form-group">
                            <div class="col col-md-2"></div>
                            <div class="col-12 col-md-6">
                               <label class="custom-control-label"><a href="{{route('addClient')}}"><i class="fas fa-plus"></i> Tambah Client Baru</a></h6></label>
                            </div>
                        </div> -->
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Harga</label></div>
                            <div class="col-12 col-md-6">
                                <input type="number" name="harga" step="100000" class="form-control" placeholder="Harga" aria-label="Harga" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Tanggal Mulai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" name="tglMulai" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Tanggal Selesai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" name="tglSelesai" class="form-control" required>
                            </div>
                        </div>
                        <table class="table align-items-center mb-0 text-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Kategori</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                @foreach($clients as $client)
                                                <tr>
                                                    <td>{{$client->kategori}}</td>
                                                    <td>{{$client->tglUpload}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                <form action="{{route('createProject')}}" method="POST">
                                @csrf
                                 <div class="form-group">
                                    <table id="links" class="mb-2">
                                    <td>
                                         <div class="input-group input-group-sm">
                                              <select id="kategori" name="kategori" class="dropdown form-control" placeholder="Pilih Kategori">
                                                  <option value="reels" id="inlineCheckbox1">Reels</option>
                                                  <option value="tiktok" id="inlineCheckbox2">Tiktok</option>
                                                  <option value="feeds" id="inlineCheckbox3">Feeds</option>
                                                  <option value="stories" id="inlineCheckbox4">Stories</option>
                                                  <option value="stories" id="inlineCheckbox4">Adsense</option>
                                                  <option value="stories" id="inlineCheckbox4">Endorse</option>
                                                  <option value="stories" id="inlineCheckbox4">Buzzer</option>
                                     </select>
                                </div>
                                </td>
                                             <td>
                                                <div class="input-group input-group-sm"><input class="form-control" type="text" placeholder="Judul" name="judul"></div>
                                            </td>
                                            <td>
                                                            <div class="input-group input-group-sm"><button type="submit" class="btn btn-outline-success text-secondary mb-0" data-container="body" data-animation="true"> Save </button></div>
                                                        </td>
                                                    </table>
                                                </div>
                                            </form>
                        <br>

                        <!-- TEAM -->
                        <div class="row form-group">
                            <h6>Team</h6>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-2"><label>Penanggung Jawab</label></div>
                            <div class="col-12 col-md-6 nav-item">
                                <div class="dropdown">
                                    <select name="idPJ[]" class="dropdown form-control select2" multiple>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Anggota</label></div>
                            <div class="col-12 col-md-6 nav-item">
                                <div class="dropdown">
                                    <select name="anggota[]" class="form-control select2" multiple>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- END TEAM -->

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-30 my-4 mb-2">Simpan</button>
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