<?php
if (auth()->user()->role == 'admin') {
    $extend = 'layouts.layout';
} else if (auth()->user()->role == 'user') {
    $extend = 'layouts.layoutuser';
} ?>

@extends($extend)

@section('title', $project->namaClient)

@section('dashboard', 'active')

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
                                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLink" aria-expanded="true" aria-controls="collapseLink">
                                    <h6>Link</h6>
                                    <form action="{{route('cari')}}" method="POST" class="position-absolute end-3 me-3 select2">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$id}}">
                                        <div class="input-group">
                                            <span class="input-group-text text-body">
                                                <i class="fas fa-search" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="form-control" name="cari" placeholder="Type here...">
                                            <!-- <button class="btn btn-outline-primary mb-0" type="submit" value="CARI">Cari</button> -->
                                        </div>
                                        <input type="submit" value="CARI">
                                    </form>
                                    <!-- <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i> -->
                                </div>
                            </h2>
                            <div id="collapseLink" class="accordion-collapse collapse" aria-labelledby="headingLink" data-bs-parent="#accordionLink">
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
    </div>
    <!-- End Link -->

    <!-- Kategori  -->
    <!-- <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="accordion" id="accordionKategori">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKategori" aria-expanded="true" aria-controls="collapseKategori">
                                            <h6>Kategori</h6>
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
                                        </div>
                                    </h2>
                                    <div id="collapseKategori" class="accordion-collapse collapse" aria-labelledby="headingKategori" data-bs-parent="#accordionKategori">
                                        <div class="accordion-body">
                                            <table class="table align-items-center mb-0 text-xs">
                                                <thead>
                                                    <tr>
                                                        <th>Kategori</th>
                                                        <th>Jumlah</th>
                                                    </tr>
                                                </thead>
                                                @foreach($kategori as $kategoria)
                                                <tbody>
                                                    <tr>
                                                        <td>{{$kategoria->kategori}}</td>
                                                        <td>{{$kategoria->jumlah}}</td>
                                                        <td>
                                                            <a class="btn btn-link text-danger text-xxs text-gradient px-3 mb-0" href="{{route('deleteKategori', ['id' => $kategoria->id])}}"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
                                            </table>
                                            <form action="{{route('createKategori')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <table id="kategori" class="mb-2">
                                                        <input type="hidden" value="{{$id}}" name="idProject">
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
                                                            <div class="input-group input-group-sm"><input class="form-control" type="text" placeholder="Jumlah" name="jumlah"></div>
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
            </div> -->
    <!-- End Kategori -->

    <!-- Teams Accordion -->
    <div class="row">
        <div class="col-12">
            <div class="card  mb-4">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Teams</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="accordion" id="accordionExample">
                        @if($myprofile != null)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{$myprofile->name}}
                                    <div class="ms-auto text-end position-absolute end-3 me-3">
                                        <p class="text-xs font-weight-bold mb-0">{{$myprofile->jabatan}}</p>
                                        <p class="text-xs text-secondary mb-0">{{$myprofile->posisi}}</p>
                                    </div>
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show bg-blue" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <input type="hidden" name="_token" value="oFAk9ReDpXQmxme8U2le1i2v0l5gfWsTVh5zW1cf">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                @foreach ($subtodos as $subtodo)
                                                <?php if ($subtodo->idUser == $myprofile->id) { ?>
                                                    <div class="form-check">
                                                        <input type="hidden" name="idProject" value="{{$id}}">
                                                        <input type="hidden" name="idsubtodo" id="idsubtodo" value="{{$subtodo->idsubtodo}}">
                                                        <input type="hidden" name="idUser" value="{{$myprofile->id}}">
                                                        <input type="hidden" name="idChecklist" value="{{$subtodo->idChecklist}}">
                                                        <!-- <input class="form-check-input" type="checkbox" value="" id="todocheck" onclick="checkedCheckbox()"> -->
                                                        <input class="form-check-input" type="checkbox" data-id="{{$subtodo->idsubtodo}}" onclick="confirm({{$subtodo->idsubtodo}})" @if($subtodo->checked == true) checked @endif>
                                                        <label class="custom-control-label text-xs <?php if (
                                                                                                        $subtodo->deadline < now()
                                                                                                    ) {
                                                                                                        echo "text-danger";
                                                                                                    } ?>" for="todocheck">{{$subtodo->subtodo}} </label>
                                                        <button type="button" style="display:none" class="btn btn-primary" id="confirm">
                                                            Confirm
                                                        </button>
                                                        <script type="text/javascript">
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
                                                        </script>
                                                        <p class="text-xs">{{$subtodo->deadline}}
                                                            &nbsp;
                                                            @if($hak == true)
                                                            <a href="{{route('addFile', ['id' => $subtodo->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                <i class="fa fa-paperclip text-xs"></i>
                                                            </a> &nbsp;
                                                            <!-- <a href="{{route('editChecklist', ['id' => $subtodo->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                        <i class="fa fa-pencil text-xs"></i>
                                                                    </a> &nbsp;
                                                                    <a href="{{route('addFile', ['id' => $subtodo->idChecklist])}}" class="btn-link text-danger mb-1" data-container="body" data-animation="true">
                                                                        <i class="fa fa-trash text-xs"></i>
                                                                    </a> -->
                                                            @endif
                                                        </p>
                                                    </div>
                                                <?php } ?>
                                                @endforeach
                                            </div>
                                            <!-- <form action="{{route('addSubchecklist')}}" method="POST">
                                                        @csrf
                                                        <table id="tickets{{$subtodo->idChecklist}}">
                                                            <input type="hidden" name="idChecklist" value="{{$subtodo->idChecklist}}">
                                                            <input type="hidden" name="idUser" value="{{$myprofile->id}}">
                                                            <input type="hidden" name="idProject" value="{{$id}}">
                                                        </table>
                                                    </form>
                                                    <div id="create-ticket-buttons">
                                                        <button class="btn btn-link text-secondary mb-0 " onclick="tambahTicket({{$subtodo->idChecklist}})">
                                                            <i class="fa fa-plus-circle text-xs"></i> Tambah Sub list
                                                        </button>
                                                    </div> -->
                                        </div>
                                        <!-- komentar -->
                                        @if($hak == true)
                                        <div class="col-6">
                                            <form method="post" action="{{ route('post.store') }}">
                                                <input type="hidden" name="iduser" value="{{$myprofile->id}}">
                                                <input type="hidden" name="name" value="{{$myprofile->name}}">
                                                <input type="hidden" name="komentator" value="{{auth()->user()->id}}">
                                                @csrf
                                                <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                                                <button type="submit" class="btn btn-primary mb-3 mt-1">Simpan</button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    <form action="{{route('addChecklist')}}" method="POST">
                                        <input type="hidden" name="idUser" value="{{$myprofile->id}}">
                                        @csrf
                                        <!-- <div class="form-group">
                                                    <table>
                                                        <input type="hidden" name="idProject" value={{$id}}>
                                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            <div class="input-group input-group-sm">Tambah List &nbsp;</div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-sm"><input class="form-control" type="text" name="toDO"></div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-sm"><input class="form-control" type="datetime-local" name="tglStart"></div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-sm"><input class="form-control" type="datetime-local" name="deadline"></div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-sm"><button type="submit" class="btn btn-outline-success text-secondary mb-0" data-container="body" data-animation="true"> Save </button></div>
                                                        </td>

                                                    </table>
                                                </div> -->
                                    </form>
                                </div>
                            </div>

                        </div>
                        @endif
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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                @foreach ($subtodos as $subtodo)
                                                <?php if ($subtodo->idUser == $user->id) { ?>
                                                    <div class="form-check">
                                                        <input type="hidden" name="idProject" value="{{$id}}">
                                                        <input type="hidden" name="idUser" value="{{$user->id}}">
                                                        <input type="hidden" name="idChecklist" value="{{$subtodo->idChecklist}}">
                                                        <!-- <input class="form-check-input" type="checkbox" value="" id="todocheck" onclick="checkedCheckbox()"> -->
                                                        <input class="form-check-input" type="checkbox" value="" @if($subtodo->checked == true) checked @endif disabled>
                                                        <label class="custom-control-label text-xs <?php if (
                                                                                                        $subtodo->deadline < now()
                                                                                                    ) {
                                                                                                        echo "text-danger";
                                                                                                    } ?>" for="todocheck">{{$subtodo->subtodo}} {{$subtodo->toDO}}</label>
                                                        <button type="button" style="display:none" class="btn btn-primary" id="confirm">
                                                            Confirm
                                                        </button>
                                                        <p class="text-xs">{{$subtodo->deadline}}
                                                            &nbsp;
                                                            @if($hak == true)
                                                            <a href="{{route('addFile', ['id' => $subtodo->idsubtodo])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                <i class="fa fa-paperclip text-xs"></i>
                                                            </a> &nbsp;
                                                            <!-- <a href="{{route('editChecklist', ['id' => $subtodo->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                        <i class="fa fa-pencil text-xs"></i>
                                                                    </a> &nbsp;
                                                                    <a href="{{route('addFile', ['id' => $subtodo->idChecklist])}}" class="btn-link text-danger mb-1" data-container="body" data-animation="true">
                                                                        <i class="fa fa-trash text-xs"></i>
                                                                    </a> -->
                                                            @endif
                                                        </p>
                                                    </div>
                                                <?php } ?>
                                                @endforeach
                                            </div>
                                            <!-- <form action="{{route('addSubchecklist')}}" method="POST">
                                                        @csrf
                                                        <table id="tickets{{$subtodo->idChecklist}}">
                                                            <input type="hidden" name="idChecklist" value="{{$subtodo->idChecklist}}">
                                                            <input type="hidden" name="idUser" value="{{$user->id}}">
                                                            <input type="hidden" name="idProject" value="{{$id}}">
                                                        </table>
                                                    </form>
                                                    <div id="create-ticket-buttons">
                                                        <button class="btn btn-link text-secondary mb-0 " onclick="tambahTicket({{$subtodo->idChecklist}})">
                                                            <i class="fa fa-plus-circle text-xs"></i> Tambah Sub list
                                                        </button>
                                                    </div> -->
                                        </div>
                                        <!-- komentar -->
                                        @if($hak == true)
                                        <div class="col-6">
                                            <form method="post" action="{{ route('post.store') }}">
                                                <input type="hidden" name="iduser" value="{{$user->id}}">
                                                <input type="hidden" name="name" value="{{$user->name}}">
                                                <input type="hidden" name="komentator" value="{{auth()->user()->id}}">
                                                @csrf
                                                <label for="exampleFormControlTextarea1" class="form-label">Komentar</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
                                                <button type="submit" class="btn btn-primary mb-3 mt-1">Simpan</button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    @if($hak == true)
                                    <!-- <form action="{{route('addChecklist')}}" method="POST">
                                                <input type="hidden" name="idUser" value="{{$user->id}}">
                                                @csrf
                                                <div class="form-group">
                                                    <table>
                                                        <input type="hidden" name="idProject" value={{$id}}>
                                                        <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            <div class="input-group input-group-sm">Tambah List</div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-sm"><input class="form-control" type="text" name="toDO"></div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-sm"><input class="form-control" type="datetime-local" name="deadline"></div>
                                                        </td>
                                                        <td>
                                                            <div class="input-group input-group-sm"><button type="submit" class="btn btn-outline-success text-secondary mb-0" data-container="body" data-animation="true"> Save </button></div>
                                                        </td>

                                                    </table>
                                                </div>
                                            </form> -->
                                    @endif
                                    <div class="card mb-4">
                                        <div class="card-header pb-0">
                                            <h6>Komentar</h6>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <tbody>
                                                        @foreach($komentar as $komen)
                                                        @if($komen->iduser == $user->id)
                                                        <tr>
                                                            <td width="15%" class="align-middle text-center">
                                                                <span class="text-secondary text-xs font-weight-bold">{{$komen->created_at}}</span>
                                                            </td>
                                                            <td width="20%" class="justify-content-end">
                                                                <p class="text-xs font-weight-bold mb-0">{{$komen->name}}</p>

                                                            </td>
                                                            <td width="65%" class="justify-content-end">
                                                                <p class="text-xs font-weight-bold mb-0">{{$komen->body}}</p>

                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
                    <h6>Files</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2 text-center">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-icons" role="tab" aria-controls="preview" aria-selected="true">
                                    <i class="ni ni-badge text-sm me-2"></i> File
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-icons" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-laptop text-sm me-2"></i> Video
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-icons" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-laptop text-sm me-2"></i> Story
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-icons" role="tab" aria-controls="code" aria-selected="false">
                                    <i class="ni ni-laptop text-sm me-2"></i> Reels
                                </a>
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
<script type="text/javascript">
    // function checksubtodo($id) {
    //     Swal.fire({
    //         title: 'Tandai tugas selesaii?',
    //         text: "Seluruh anggota dalam proyek dapat melihat tugas ini telah selesaiiii!" + $id,
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Ya'
    //     }).then((result) => {
    //         if (result.value) {
    //             window.location = "/checked/".$id;
    //         }
    //     })
    // }
    $(document).ready(function() {
        $("#confirm").click(function($id) {
            Swal.fire({
                title: 'Tandai tugas selesai?',
                text: "Notifikasi akan muncul melalui email Anda dan Penanggung Jawab Project!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Berhasil!',
                        'Notifikasi telah terkirim',
                        'success'
                    )
                    window.location = "/send-mail/".$id;
                }
            })
        });

        $("#checkedSubtodo").click(function($id) {
            Swal.fire({
                title: 'Tandai tugas selesai?',
                text: "Seluruh anggota dalam proyek dapat melihat tugas ini telah selesai!" + $id,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.value) {
                    window.location = "/checked/".$id;
                }
            })
        });
    });
</script>
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