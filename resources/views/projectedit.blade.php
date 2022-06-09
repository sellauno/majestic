@extends('layouts.layout')

@section('title', 'Edit Project')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Project</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>Edit Project</h5>
                </div>
                <div class="card-body">
                    @foreach($projects as $project)
                    <form role="form text-left" action="{{route('updateProject', ['id' => $project->idProject])}}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="editby{{auth()->user()->id}}">
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Client</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <input type="text" name="namaClient" class="form-control" value="{{$project->namaClient}}" readonly>
                                    <input type="hidden" name="idClient" class="form-control" value="{{$project->idClient}}" readonly>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Harga</label></div>
                            <div class="col-12 col-md-6">
                                <input type="number" name="harga" step="100000" class="form-control" value="{{$project->harga}}" placeholder="Harga" aria-label="Harga" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Tanggal Mulai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" name="tglMulai" class="form-control" value="{{$project->tglMulai}}" placeholder="Name" aria-label="Tanggal Mulai" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Tanggal Selesai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" name="tglSelesai" class="form-control" value="{{$project->tglSelesai}}" placeholder="Name" aria-label="Tanggal Selesai" required>
                            </div>
                        </div>


                        <!-- Layanan -->

                        <table id="layanan">
                            <tr>
                                <h6>Layanan</h6>
                            </tr>
                            @foreach($layanan as $l)
                            <tr>
                                <td>
                                    <input type="hidden" name="idLayanan[]" value="{{$l->idLayanan}}">
                                    <div class="dropdown">
                                        <select id="idKategori" name="idKategori[]" class="form-control">
                                            @foreach($kategori as $kat)
                                            <option value="{{$kat->idKategori}}">{{$kat->kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="jumlah[]" value="{{$l->jumlah}}" class="form-control" placeholder="Jumlah" aria-label="Jumlah" required>
                                </td>
                                <td>
                                    <span><a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{route('deleteLayanan', ['id' => $l->idLayanan])}}"><i class="far fa-trash-alt me-2"></i>Delete</a></span>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                        <div class="row form-group">
                            <div id="create-input-buttons">
                                <a class="btn btn-link text-secondary mb-0 btn-tooltip create-input" title="Tambah List">
                                    <i class="fa fa-plus-circle text-xs"></i> Tambah list
                                </a>
                            </div>
                        </div>
                        <!-- End Layanan -->
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-30 my-4 mb-2">Simpan</button>
                        </div>
                    </form>
                    <br>



                    <!-- TEAM -->
                    <div class="row form-group">
                        <h6>Team</h6>
                    </div>

                    <!-- Table Team -->
                    <div class="table-responsive p-0">
                        <table class="table align-items-center  mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Posisi</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teams as $team)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$team->name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-xs text-secondary">{{$team->jabatan}}</div>
                                    </td>
                                    <td>
                                        <div class="text-xs text-secondary">{{$team->posisi}}</div>
                                    </td>
                                    <td class="align-middle">
                                        <a class="btn btn-link text-dark px-3 mb-0" href="{{route('editTeam', ['id' => $team->idTeam])}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                    </td>
                                    <td class="align-middle">
                                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{route('deleteTeam', ['id' => $team->idTeam])}}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table Team -->
                    <br>
                    <form role="form text-left" action="{{route('addTeam')}}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <h6>Tambah Anggota</h6>
                        </div>
                        <input type="hidden" name="idProject" value="{{$project->idProject}}">
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Nama</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <select id="idUser" name="idUser" class="form-control">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label>Jabatan</label></div>
                            <div class="col-12 col-md-6">
                                <div class="dropdown">
                                    <select id="jabatan" name="jabatan" class="form-control">
                                        <option value="Penanggung Jawab">Penanggung Jawab</option>
                                        <option value="Anggota">Anggota</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-30 my-4 mb-2">Tambah Anggota</button>
                        </div>
                        <!-- END TEAM -->
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
<script>
    function createTicketComponent(type) {
        type = type || null;

        var elements = [],
            rootElement = document.createElement('tr');

        elements.push('<tr><td width="25%"><div class="dropdown"><select id="idKategori" name="idKategoriNew[]" class="form-control">@foreach($kategori as $kat)<option value="{{$kat->idKategori}}">{{$kat->kategori}}</option>@endforeach</select></div></td>');
        elements.push('<td><input type="number" name="jumlahNew[]" class="form-control" placeholder="Jumlah" aria-label="Jumlah" required></td></tr>');

        rootElement.innerHTML = elements.join('');

        return rootElement;
    }


    function createFreeTicketComponent() {
        return createTicketComponent('FREE');
    }


    function onClickCreateTicketButton(event) {
        var button = event.target,
            container = document.querySelector('#layanan'),
            component;

        if (button.classList.contains('free')) {
            component = createFreeTicketComponent();
        } else {
            component = createTicketComponent();
        }

        container.appendChild(component);
    }


    function onClickSaveButton(event) {
        var button = event.target,
            container = document.querySelector('#layanan'),
            component;

        if (button.classList.contains('free')) {
            component = createFreeTicketComponent();
        } else {
            component = createTicketComponent();
        }

        container.appendChild(component);
    }


    var buttonsGroup = document.getElementById('create-input-buttons');
    buttonsGroup.addEventListener('click', onClickCreateTicketButton);

    var buttonSave = document.getElementById('button-save');
    buttonSave.addEventListener('click', onClickSaveButton);
</script>
@endsection