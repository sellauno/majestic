@extends('layouts.layout')

@section('title', 'Tambah Jenis Layanan')

@section('layanan', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark" aria-current="page">Layanan</li>
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Jenis Layanan</li>
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="d-flex justify-content-center mb-3">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Data Baru</h5>
                    </div>
                    <div class="card-body">
                        <form role="form text-left" action="{{route('createJenisLayanan')}}" method="POST">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-2"><label>Kategori Layanan</label></div>
                                <div class="col-12 col-md-6">
                                    <input type="text" class="form-control" name="kategori" placeholder="Nama Layanan" aria-label="Layanan" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2"><label>Checklist Pengerjaan</label></div>
                                <div class="col-12 col-md-6">
                                    <table id="proses">
                                        <td><input type="text" class="form-control" name="proses[]" placeholder="Tahap Pengerjaan" aria-label="Tahap Pengerjaan" required></td>
                                    </table>
                                    <div id="create-input-buttons">
                                        <a class="btn btn-link text-secondary mb-0 btn-tooltip create-input" title="Tambah List">
                                            <i class="fa fa-plus-circle text-xs"></i> Tambah list
                                        </a>
                                    </div>
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

<script>
    function createTicketComponent(type) {
        type = type || null;

        var elements = [],
            rootElement = document.createElement('tr');

        elements.push('<td><input type="text" class="form-control" name="proses[]" placeholder="Nama Layanan" aria-label="Layanan" required></td>');

        rootElement.innerHTML = elements.join('');

        return rootElement;
    }


    function createFreeTicketComponent() {
        return createTicketComponent('FREE');
    }


    function onClickCreateTicketButton(event) {
        var button = event.target,
            container = document.querySelector('#proses'),
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
            container = document.querySelector('#proses'),
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