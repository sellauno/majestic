@extends('layouts.layout')

@section('title', $project->namaClient)

@section('project', 'active')

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
                                            <span class="me-2 text-xs font-weight-bold">{{$l->presentase}}%</span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="{{$l->presentase}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$l->presentase}}%;"></div>
                                                </div>
                                            </div>
                                        </div>
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
                                            <a href="{{route('editChecklist', ['id' => $checklist->idChecklist])}}" class="btn btn-link mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class=" fas fa-pencil-alt me-2"></i>Edit</a>
                                            <!-- <a class="btn btn-link mb-0 me-3 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#editchecklist{{$checklist->idChecklist}}"><i class=" fas fa-pencil-alt me-2"></i>Edit</a> -->
                                            <div class="progress-wrapper">
                                                <div class="progress-info">
                                                    <div class="progress-percentage">
                                                        <span class="text-sm font-weight-bold">{{$checklist->presentase}}%</span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{$checklist->presentase}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$checklist->presentase}}%;"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editchecklist{{$checklist->idChecklist}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <div class="card card-plain">
                                                            <div class="card-header pb-0 text-left">
                                                                <h6 class="font-weight-bolder text-info text-center text-gradient">Edit Checklist</h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <!-- <form role="form text-left" action="{{route('editChecklist', ['id' => $checklist->idChecklist])}}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="idProject" value="{{$l->idProject}}">
                                                                    <label>Judul</label>
                                                                    <div class="input-group-sm mb-3">
                                                                        <input type="text" class="form-control" placeholder="Judul" name="toDO" value="{{$checklist->toDO}}">
                                                                    </div>
                                                                    <div class="row form-group">
                                                                        <label>Tanggal Start</label>
                                                                        <div class="input-group-sm mb-3">
                                                                            <input type="datetime-local" class="form-control" name="tglStart">
                                                                        </div>
                                                                        <label>Deadline</label>
                                                                        <div class="input-group-sm mb-3">
                                                                            <input type="datetime-local" class="form-control" name="deadline">
                                                                        </div>
                                                                    </div>
                                                                    <label>Tanggal Start</label>
                                                                    <div class="input-group-sm mb-3">
                                                                        <input type="datetime-local" class="form-control" name="subtglStart">
                                                                    </div>
                                                                    <label>Deadline</label>
                                                                    <div class="input-group-sm mb-3">
                                                                        <input type="datetime-local" class="form-control" name="subdeadline">
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <button type="submit" class="btn btn-round bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                                                                    </div>
                                                                </form> -->
                                                                <!-- <form>
                                                                <h6 class="text-sm">Layanan</h6>
                                                                    <div class="input-group-sm">
                                                                        <label for="example-text-input" class="form-control-label">Judul</label>
                                                                        <input class="form-control" type="text" name="toDO" value="{{$checklist->toDO}}">
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-sm">
                                                                                <label for="example-search-input" class="form-control-label">Start</label>
                                                                                <input class="form-control" name="tglStart" type="datetime-local">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-sm">
                                                                                <label class="form-control-label">Deadline</label>
                                                                                <input class="form-control" name="deadline" type="datetime-local">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="text-sm">To Do List</h6>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-sm">
                                                                                <label class="form-control-label">Start</label>
                                                                                <input class="form-control" name="tglStart" type="datetime-local">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-sm">
                                                                                <label class="form-control-label">Deadline</label>
                                                                                <input class="form-control" name="deadline" type="datetime-local">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-sm">
                                                                                <label class="form-control-label">Start</label>
                                                                                <input class="form-control" name="tglStart" type="datetime-local">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="input-group-sm">
                                                                                <label class="form-control-label">Deadline</label>
                                                                                <input class="form-control" name="deadline" type="datetime-local">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->

                                        <div class="table-responsive px-4 p-0 mb-3">
                                            <table class="table align-items-center justify-content-center mb-0">
                                                <!-- <thead>
                                                    <th class="text-xs">To do</th>
                                                    <th class="text-xs">Anggota</th>
                                                    <th class="text-xs">Start</th>
                                                    <th class="text-xs">Deadline</th>
                                                </thead> -->
                                                <tbody>
                                                    @foreach($subtodos as $subtodo)
                                                    @if($subtodo->idChecklist == $checklist->idChecklist)
                                                    <tr>
                                                        <td class="text-xs px-4">{{$subtodo->subtodo}} </td>
                                                        <td class="text-xs px-4">{{$subtodo->name}} </td>
                                                        <td class="text-xs px-4">{{$subtodo->start}} </td>
                                                        <td class="text-xs px-4">{{$subtodo->deadline}} </td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- <div class="d-flex px-2">
                                            <a class="btn btn-link mb-3" href="javascript:;">Reply</a>
                                        </div> -->
                                        <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center mb-5"><i class="fas fa-arrow-up"></i></button> Buat To do List -->
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