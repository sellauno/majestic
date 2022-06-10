@extends('layouts.layout')

@section('title', $project->namaClient)

@section('layanan', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Project</a></li>
@endsection

@section('content')
<div class="container-fluid py-4">

    <!-- Keterangan -->

    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <!-- <div class="d-flex flex-column h-100"> -->

                        <div class="col-lg-6">
                            <h5 class="font-weight-bolder">{{$project->namaClient}}</h5>
                            <p class="mb-1 text-bold">{{$project->tglMulai}} - {{$project->tglSelesai}}</p>
                            <!-- <p class="mb-5">{{$project->tglMulai}} - {{$project->tglSelesai}}</p> -->
                        </div>
                        <div class="text-end">
                            <div class="progress-wrapper">
                                <div class="progress-info">
                                    <div class="progress-percentage">
                                        <span class="text-sm font-weight-bold">{{$project->progres}}%</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$project->progres}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->progres}}%;"></div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Keterangan -->

    <!-- Layanan -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Layanan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Layanan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($layanan as $l)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">{{$l->kategori}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$l->jumlah}}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0">
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Layanan -->

    <!-- Checklist -->
    <!-- <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>To Do List</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">KateGori</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">To do list</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Anggota</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($layanan as $l)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3">
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">{{$l->kategori}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{$l->jumlah}}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="me-2 text-xs font-weight-bold">60%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-link text-secondary mb-0">
                                            <i class="fa fa-ellipsis-v text-xs"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Checklist -->

    <!-- Accordion -->
    <div class="row">
        <div class="col-12">
            <div class="card  mb-4">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Checklist</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="accordion" id="accordionExample">
                        @foreach($layanan as $l)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$l->idLayanan}}" aria-expanded="true" aria-controls="collapseOne">
                                    {{$l->kategori}}
                                </div>
                            </h2>
                            <div id="collapseOne-{{$l->idLayanan}}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <input type="hidden" name="_token" value="oFAk9ReDpXQmxme8U2le1i2v0l5gfWsTVh5zW1cf">
                                    <div class="row">
                                        @foreach($checklists as $checklist)
                                        @if($checklist->idLayanan == $l->idLayanan)
                                        <div class="d-flex px-2">
                                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                                            <h6 class="text-dark text-sm mt-1">{{$checklist->toDO}}</h6>
                                        </div>
                                        <div class="table-responsive p-0 mb-4">
                                            <table class="table align-items-center justify-content-center mb-0">
                                                <thead>
                                                    <th class="text-xs">To do</th>
                                                    <th class="text-xs">Anggota</th>
                                                    <th class="text-xs">Start</th>
                                                    <th class="text-xs">Deadline</th>
                                                </thead>
                                                <tbody>
                                                    <!-- @foreach($jenis[$loop->index] as $proses)
                                                    <tr>
                                                        <td class="text-xs px-4">{{$proses->value}} </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                    @endforeach -->
                                                    @foreach($subchecklist as $sc)
                                                    @if($sc->idChecklist == $checklist->idChecklist)
                                                    <tr>
                                                        <td class="text-xs px-4">{{$sc->subTodo}} </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center mb-5"><i class="fas fa-arrow-up"></i></button> Buat To do List
                                        <!-- <ul class="list-group">
                                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-0 border-radius-lg">
                                                <div class="d-flex align-items-center">
                                                    <p class="text-sm">{{$proses->value}}</p>
                                                </div>
                                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                    + $ 2,000
                                                </div>
                                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                    + $ 2,000
                                                </div>
                                            </li>
                                        </ul> -->
                                        @endif
                                        @endforeach
                                        <!-- <div class="table-responsive p-0">
                                            <table class="table align-items-center justify-content-center mb-0">
                                                <tbody>
                                                    @foreach($checklists as $checklist)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex px-3">
                                                                <div class="my-auto">
                                                                    <h6 class="mb-0 text-sm">{{$checklist->toDO}}</h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            @foreach($jenis[$loop->iteration -1] as $proses)
                                                            <div class="d-flex px-3">
                                                                <div class="my-auto">
                                                                    <p class="mb-0 text-sm">{{$proses->value}} </p>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Accordion -->

    <div class="col-md-5 mt-4">
        <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="mb-0">Your Transaction's</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <i class="far fa-calendar-alt me-2"></i>
                        <small>23 - 30 March 2020</small>
                    </div>
                </div>
            </div>
            <div class="card-body pt-4 p-3">
                <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                                <span class="text-xs">27 March 2020, at 12:30 PM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                            - $ 2,500
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                <span class="text-xs">27 March 2020, at 04:30 AM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 2,000
                        </div>
                    </li>
                </ul>
                <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                <ul class="list-group">
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                                <span class="text-xs">26 March 2020, at 13:45 PM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 750
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                                <span class="text-xs">26 March 2020, at 12:30 PM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 1,000
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                                <span class="text-xs">26 March 2020, at 08:30 AM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            + $ 2,500
                        </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-exclamation"></i></button>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                                <span class="text-xs">26 March 2020, at 05:00 AM</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                            Pending
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

<script>
    function createTicketComponent($idCheck) {

        var elements = [],
            rootElement = document.createElement('tr')
        elements.push('<tr><div class="input-group input-group-sm text-xxs">Kegiatan</div></tr><tr><div class="input-group input-group-sm"><input class="form-control" type="text" name="subTodo"></div></tr>');
        elements.push('<tr><div class="input-group input-group-sm text-xxs">Tanggal Mulai</div></tr><tr><div class="input-group input-group-sm"><input class="form-control" type="datetime-local" name="subtglStart"></div></tr>');
        elements.push('<tr><div class="input-group input-group-sm text-xxs">Deadline</div></tr><tr><div class="input-group input-group-sm"><input class="form-control" type="datetime-local" name="subdeadline"></div></tr>');
        elements.push('<tr><div class="input-group input-group-sm"><button type="submit" class="btn btn-outline-success text-secondary mb-1" data-container="body" data-animation="true"> Save </button></div></tr>');

        rootElement.innerHTML = elements.join('');

        return rootElement;
    }

    function createFreeTicketComponent() {
        return createTicketComponent('FREE');
    }

    function tambahTicket($idCheck) {
        $table = '#tickets' + $idCheck;
        container = document.querySelector($table),
            component = createTicketComponent($idCheck);

        container.appendChild(component);
    }

    function onClickCreateTicketButton(event, $idCheck) {
        $table = '#tickets'.$idCheck;
        var button = event.target,
            container = document.querySelector('#tickets4'),
            component = createTicketComponent($idCheck);

        container.appendChild(component);
    }


    function onClickSaveButton(event) {
        var button = event.target,
            container = document.querySelector('#tickets4'),
            component;

        if (button.classList.contains('free')) {
            component = createFreeTicketComponent();
        } else {
            component = createTicketComponent();
        }

        container.appendChild(component);
    }


    var buttonsGroup = document.getElementById('create-ticket-buttons');
    // buttonsGroup.addEventListener('click', onClickCreateTicketButton);

    var buttonSave = document.getElementById('button-save');
    buttonSave.addEventListener('click', onClickSaveButton);
</script>
@endsection