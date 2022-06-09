@extends('layouts.layout')

@section('title', 'Tambah Project')

@section('project', 'active')

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
                        <div class="row form-group  mb-6">
                            <div class="col col-md-2"><label>Tanggal Selesai</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" name="tglSelesai" class="form-control" required>
                            </div>
                        </div>


                        <!-- Layanan -->

                        <!-- <div class="row form-group">
                            <div class="col col-md-2"><label>Layanan</label></div>
                            <div class="col col-md-3">
                                <div class="dropdown">
                                    <select id="idKategori" name="idKategori" class="form-control">
                                        @foreach($kategori as $kat)
                                        <option value="{{$kat->idKategori}}">{{$kat->kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" aria-label="Jumlah" required>
                            </div>
                        </div> -->
                        <table id="layanan">
                            <tr><h6>Layanan</h6></tr>
                            <tr>
                                <td>
                                    <div class="dropdown">
                                        <select id="idKategori" name="idKategori[]" class="form-control">
                                            @foreach($kategori as $kat)
                                            <option value="{{$kat->idKategori}}">{{$kat->kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" aria-label="Jumlah" required>
                                </td>
                            </tr>
                        </table>

                        <div class="row form-group">
                            <div id="create-input-buttons">
                                <a class="btn btn-link text-secondary mb-0 btn-tooltip create-input" title="Tambah List">
                                    <i class="fa fa-plus-circle text-xs"></i> Tambah list
                                </a>
                            </div>
                        </div>
                        <!-- <div class="row form-group">
                            <div class="col col-md-2"></div>
                            <div class="col col-md-6 text-end">
                                <div id="create-input-buttons">
                                    <a class="btn btn-link text-secondary mb-0 btn-tooltip create-input" title="Tambah List">
                                        <i class="fa fa-plus-circle text-xs"></i> Tambah list
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        <!-- End Layanan -->

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
<script>
    function createTicketComponent(type) {
        type = type || null;

        var elements = [],
            rootElement = document.createElement('tr');

        elements.push('<tr><td width="25%"><div class="dropdown"><select id="idKategori" name="idKategori[]" class="form-control">@foreach($kategori as $kat)<option value="{{$kat->idKategori}}">{{$kat->kategori}}</option>@endforeach</select></div></td>');
        elements.push('<td><input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" aria-label="Jumlah" required></td></tr>');
   
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