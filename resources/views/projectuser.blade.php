@extends('layouts.layoutuser')

@section('title', $project->namaClient)

@section('project', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Project</a></li>
@endsection

@section('content')
<div class="container-fluid py-4">

    <!-- Link -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="accordion" id="accordionLink">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <div class="accordion-button collapsed {{$cari}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLink" aria-expanded="true" aria-controls="collapseLink">
                                <h6>Link</h6>
                                    <form action="{{route('cari')}}" method="POST" class="position-absolute end-3 me-3 select2">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <!-- <form method="post" action="{{route('cari')}}"> -->
                                            <div class="input-group">
                                            <span class="input-group-text text-body">
                                                <i class="fas fa-search" aria-hidden="true"></i>
                                            </span>
                                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                        <div class="input-group">
                                            <span class="input-group-text text-body">
                                                <i class="fas fa-search" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" name="cari" style="padding-left:35px !important" class="form-control" placeholder="Type here...">
                                            </div>
                                        </div>
                            
                                    </form>
                                   
                        </div>
                        </h2>
                        <div id="collapseLink" class="accordion-collapse collapse {{$cari}}" aria-labelledby="headingLink" data-bs-parent="#accordionLink">
                            <div class="accordion-body">
                                <table class="table align-items-center mb-0 text-xs">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Upload</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Link</th>
                                            <th>User</th>
                                        </tr>
                                    </thead>
                                    @foreach($links as $link)
                                    <tr>
                                        <td>{{$link->tglUpload}}</td>
                                        <td>{{$link->kategori}}</td>
                                        <td>{{$link->judul}}</td>
                                        <td>
                                            <!-- {{$link->link}} -->
                                            <input type="text" id="copy_{{ $link->link }}" value="{{ $link->link }}" readonly>
                                            <button value="copy" onclick="copyToClipboard('copy_{{ $link->link }}')">Copy!</button>
                                        </td>
                                        <td>{{$link->name}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                                <form action="{{route('createLink')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <table id="links" class="mb-2">
                                            <input type="hidden" name="idProject" value={{$id}}>
                                            <input type="hidden" name="idUser" value={{$id}}>
                                            <td>
                                                <div class="input-group input-group-sm"><input class="form-control" type="datetime-local" name="tglUpload"></div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <select id="kategori" name="kategori" class="dropdown form-control" placeholder="Pilih Kategori">
                                                        <option value="reels" id="inlineCheckbox1">Reels</option>
                                                        <option value="tiktok" id="inlineCheckbox2">Tiktok</option>
                                                        <option value="feeds" id="inlineCheckbox3">Feeds</option>
                                                        <option value="stories" id="inlineCheckbox4">Stories</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm"><input class="form-control" type="text" placeholder="Judul" name="judul"></div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm"><input class="form-control" type="text" placeholder="Link" name="link"></div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <select id="idUser" name="idUser" class="form-control select2">
                                                        @if($myprofile != null)
                                                        <option value="{{$myprofile->id}}">{{$myprofile->name}}</option>
                                                        @endif
                                                        @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm"><button type="submit" class="btn btn-outline-success text-secondary mb-0" data-container="body" data-animation="true"> Save </button></div>
                                            </td>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Link -->

    @if($myprofile != null)
    <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4 ">
            <div class="card h-100 shadow-none">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>{{$myprofile->name}}</h6>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <p class="text-xs font-weight-bold mb-0">{{$myprofile->jabatan}}</p>
                            <p class="text-xs text-secondary mb-0">{{$myprofile->posisi}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-5 pb-2">
                    <div>
                        @foreach ($subtodos as $subtodo)
                        <?php if ($subtodo->idUser == $myprofile->id) { ?>
                            <div class="form-check">
                                <input type="hidden" name="idProject" value="{{$id}}">
                                <input type="hidden" name="idsubtodo" id="idsubtodo" value="{{$subtodo->idsubtodo}}">
                                <input type="hidden" name="idUser" value="{{$myprofile->id}}">
                                <input type="hidden" name="idChecklist" value="{{$subtodo->idChecklist}}">
                                <input class="form-check-input" type="checkbox" data-id="{{$subtodo->idsubtodo}}" onclick="document.getElementById('confirm-{{$subtodo->idsubtodo}}').click(); this.checked=!this.checked;" @if($subtodo->checked == true) checked disabled @endif>
                                <label class="custom-control-label text-xs <?php if (
                                                                                $subtodo->deadline < now()
                                                                            ) {
                                                                                echo "text-danger";
                                                                            } ?>" for="todocheck">{{$subtodo->toDO}} {{$subtodo->subtodo}} </label>
                                <!-- Modal Confirm Check -->
                                <button type="button" style="display:none" id="confirm-{{$subtodo->idsubtodo}}" data-bs-toggle="modal" data-bs-target="#modal-notification-{{$subtodo->idsubtodo}}">Notification</button>
                                <div class="modal fade" id="modal-notification-{{$subtodo->idsubtodo}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">??</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="py-3 text-center">
                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                    <h4 class="text-gradient text-danger mt-4">Tandai tugas {{$subtodo->toDO}} {{$subtodo->subtodo}} selesai?</h4>
                                                    <p>Seluruh anggota dalam proyek dapat melihat tugas ini telah selesai</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="{{route('checked', ['id' => $subtodo->idsubtodo])}}" class="btn btn-info">Ya</a>
                                                <button type="button" class="btn btn-danger ml-auto" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal Confirm Check -->

                                <!-- <script type="text/javascript">
                                    function confirm($id) {
                                        Swal.fire({
                                            title: 'Tandai tugas selesai?',
                                            text: "Seluruh anggota dalam proyek dapat melihat tugas ini telah selesai",
                                            type: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ya'
                                        }).then((result) => {
                                            if (result.value) {
                                                Swal.fire(
                                                    'Berhasil!'.$idChecklist,
                                                    'Tugas selesai',
                                                    'success'
                                                )
                                                window.location = "/checked/" + $id;
                                            }
                                        })
                                    };
                                </script> -->

                                <p class="text-xs">{{$subtodo->deadline}} {{$subtodo->idChecklist}}
                                    &nbsp;
                                    <a href="{{route('addFile', ['id' => $subtodo->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                        <i class="fa fa-paperclip text-xs"></i>
                                    </a> &nbsp;
                                </p>
                            </div>
                        <?php } ?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-none">
                <div class="card-header pb-0">
                    <h6>Komentar</h6>
                    <!-- <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">24%</span> this month
                            </p> -->
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach($komentar as $komen)
                        @if($komen->iduser == $myprofile->id)
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{$komen->name}}</h6>
                                <p class="mb-0 text-xs">{{$komen->body}}</p>
                                <span class="text-secondary font-weight-bold text-xxs mt-1 mb-0">{{$komen->created_at}}</span>
                            </div>
                            <!-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a> -->
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <!-- <div class="timeline timeline-one-side">
                        @foreach($komentar as $komen)
                        @if($komen->iduser == $myprofile->id)
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="ni ni-bell-55 text-success text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">{{$komen->name}}</h6>

                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{$komen->body}}</p>
                                <span class="text-secondary font-weight-bold text-xxs mt-1 mb-0">{{$komen->created_at}}</span>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Teams Accordion -->
    <div class="row">
        <div class="col-12">
            <div class="card  mb-4">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Teams</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="accordion" id="accordionExample">
                        @foreach($users as $user)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$user->id}}" aria-expanded="true" aria-controls="collapseOne">
                                    {{$user->name}}
                                    <div class="ms-auto text-end position-absolute end-3 me-3">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->jabatan}}</p>
                                        <p class="text-xs text-secondary mb-0">{{$user->posisi}}</p>
                                    </div>
                                </div>
                            </h2>
                            <div id="collapseOne-{{$user->id}}" class="accordion-collapse collapse show bg-gray-100 " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <input type="hidden" name="_token" value="oFAk9ReDpXQmxme8U2le1i2v0l5gfWsTVh5zW1cf">
                                    <div class="row my-4">
                                        <div class="col-lg-8 col-md-6 mb-md-0 mb-4 ">
                                            <div class="card h-100 shadow-none">
                                                <div class="card-header pb-0">
                                                    <h6>To Do List</h6>
                                                </div>
                                                <div class="card-body px-5 pb-2">
                                                    <div>
                                                        @foreach ($subtodos as $subtodo)
                                                        <?php if ($subtodo->idUser == $user->id) { ?>
                                                            <div class="form-check">
                                                                <input type="hidden" name="idProject" value="{{$id}}">
                                                                <input type="hidden" name="idsubtodo" id="idsubtodo" value="{{$subtodo->idsubtodo}}">
                                                                <input type="hidden" name="idUser" value="{{$user->id}}">
                                                                <input type="hidden" name="idChecklist" value="{{$subtodo->idChecklist}}">
                                                                <!-- <input class="form-check-input" type="checkbox" value="" id="todocheck" onclick="checkedCheckbox()"> -->
                                                                <input class="form-check-input" type="checkbox" data-id="{{$subtodo->idsubtodo}}" onclick="confirm({{$subtodo->idsubtodo}})" @if($subtodo->checked == true) checked @endif disabled>
                                                                <label class="custom-control-label text-xs <?php if (
                                                                                                                $subtodo->deadline < now()
                                                                                                            ) {
                                                                                                                echo "text-danger";
                                                                                                            } ?>" for="todocheck">{{$subtodo->toDO}} {{$subtodo->subtodo}} </label>
                                                                <button type="button" style="display:none" class="btn btn-primary" id="confirm">
                                                                    Confirm
                                                                </button>
                                                                <p class="text-xs">{{$subtodo->deadline}}
                                                            </div>
                                                        <?php } ?>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="card h-100 shadow-none">
                                                <div class="card-header pb-0">
                                                    <h6>Komentar</h6>
                                                </div>
                                                <div class="card-body p-3">
                                                    <ul class="list-group">
                                                        @foreach($komentar as $komen)
                                                        @if($komen->iduser == $user->id)
                                                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                                            <div class="d-flex align-items-start flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{$komen->name}}</h6>
                                                                <p class="mb-0 text-xs">{{$komen->body}}</p>
                                                                <span class="text-secondary font-weight-bold text-xxs mt-1 mb-0">{{$komen->created_at}}</span>
                                                            </div>
                                                            <!-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:;">Reply</a> -->
                                                        </li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
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
    <!-- End Teams Accordion -->

    <!-- Table Files -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="mb-2">Files</h6>
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-icons" role="tab" aria-controls="preview" aria-selected="true">
                                    <i class="ni ni-badge text-sm me-2"></i> File
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-icons" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-album-2 text-sm me-2"></i> Gambar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-icons" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-button-play text-sm me-2"></i> Video
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body px-4 pt-0 pb-2 text-center">
                    <div class="nav-wrapper position-relative">
                        <ul class="nav nav-pills nav-fill p-1">
                            <li class="nav-item">
                                <!-- <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-icons" role="tab" aria-controls="preview" aria-selected="true">
                                    <i class="ni ni-badge text-sm me-2"></i> File
                                </a> -->
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        @foreach($file as $f)
                                        <tr>
                                            <td>
                                                <!-- <span class="text-xs font-weight-bold"></span> -->
                                                <a href="{{$f->url}}" target="_blank" class="text-xs font-weight-bold">{{$f->namaFile}}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        @foreach($gambar as $f)
                                        <tr>
                                            <td>
                                                <!-- <span class="text-xs font-weight-bold"></span> -->
                                                <a href="{{$f->url}}" target="_blank" class="text-xs font-weight-bold">{{$f->namaFile}}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        @foreach($video as $f)
                                        <tr>
                                            <td>
                                                <!-- <span class="text-xs font-weight-bold"></span> -->
                                                <a href="{{$f->url}}" target="_blank" class="text-xs font-weight-bold">{{$f->namaFile}}</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Table Files -->

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
<script>
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }
</script>
<script src="{{asset('sweetalert/jquery.min.js.download')}}"></script>
<script src="{{asset('sweetalert/bootstrap.min.js.download')}}"></script>
<script src="{{asset('sweetalert/sweetalert2.min.js.download')}}"></script>
<script>
    $(document).ready(function() {
        // $(document).on('click', '.todocheck', function(e){
        //     e.preventDefault();
        //     var idtodo = $('#idsubtodo').val();

        //     $.ajax({
        //         type : "POST",
        //         url: "/checked/"+idtodo,
        //         data: idtodo,
        //         success: function (response){
        //             // console.log(response);

        //         }
        //     })

        $("#todocheck").live("click", function() {
            var id = parseInt($(this).val(), 10);
            var idtodo = $('#idsubtodo').val();

            var checked = true;
            if ($(this).is(":checked")) {
                checked = false;
            } else {
                checked = true;
            }

            $.ajax({
                type: "GET",
                url: "/checked/" + idtodo,
                success: function(response) {
                    // console.log(response);

                }
            })
        });
    });
</script>
@endsection