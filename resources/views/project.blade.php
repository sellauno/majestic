<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('btsr/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('btsr/assets/img/favicon.png')}}">
    <title>
        Majestic Creative
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('btsr/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('btsr/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('btsr/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('btsr/assets/css/soft-ui-dashboard.css?v=1.0.5')}}" rel="stylesheet" />

</head>

<body>
    <!-- Sidebar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html " target="_blank">
                <img src="{{asset('btsr/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Majestic Creative</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  active" href="{{route('dashboard')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                                <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('allClient')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                                                <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Clients</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @yield('register')" href="{{route('register')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                                                <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Registration</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- End Sidebar -->

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Top -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h3>{{$project->namaClient}}</h3>
                            <br>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="accordion" id="accordionLink">
                                <div class="accordion-item bg-gray-100">
                                    <h2 class="accordion-header" id="headingOne">
                                        <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLink" aria-expanded="true" aria-controls="collapseLink">
                                            <h6>Link</h6>
                                            <i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0 me-3" aria-hidden="true"></i>
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
                                                    <td>{{$link->link}}</td>
                                                    <td>{{$link->name}}</td>
                                                </tr>
                                                @endforeach
                                            </table>
                                            <form action="{{route('createLink')}}" method="POST">
                                                @csrf
                                                <div id="create-ticket-buttons">
                                                <button class="btn btn-link text-secondary mb-0 btn-tooltip create-ticket" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah List" data-container="body" data-animation="true">
                                                    <i class="fa fa-plus-circle text-xs"></i>
                                                </button>
                                            </div>
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
        </div>
        <section class="form-box">
        <form action="{{route('addChecklist')}}" class="col-md-5" enctype="multipart/form-data">
          <div class="form-group">
          <label for="photo">Attach a photograph</label>
            <input type="file" name="photo" id="photo" class="form-control-file" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">Submit</button>
          </div>
        </form>
      </section>
        <!-- Teams Accordion -->
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Teams</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="accordion" id="accordionExample">
                        @foreach($users as $user)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{$user->name}}
                                    <div class="ms-auto text-end position-absolute end-3 me-3">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->jabatan}}</p>
                                        <p class="text-xs text-secondary mb-0">{{$user->posisi}}</p>
                                    </div>
                                </div>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form enctype="multipart/form-data" action="addfile" method="POST">
                                        <input type="hidden" name="_token" value="oFAk9ReDpXQmxme8U2le1i2v0l5gfWsTVh5zW1cf">
                                        <div class="row">
                                            <div class="col-md-4">
                                                @foreach ($checklists as $checklist)
                                                <?php if ($checklist->idUser == $user->id) { ?>
                                                    <div class="form-check">
                                                        <input type="hidden" name="idProject" value="{{$id}}">
                                                        <input type="hidden" name="idUser" value="{{$user->id}}">
                                                        <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1">
                                                        <label class="custom-control-label <?php if (
                                                                                                $checklist->deadline < now()
                                                                                            ) {
                                                                                                echo "text-danger";
                                                                                            } ?>" for="customCheck1">{{$checklist->toDO}} </label>
                                                        <span class="text-xs">{{$checklist->deadline}}</span>
                                                        &nbsp;
                                                        <input type="file" id="file" name="linkfile" style="display:none;">
                                                        <a class="btn-link text-secondary mb-0 btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan file" data-container="body" data-animation="true" onclick="document.getElementById('file').click();">
                                                            <i class="fa fa-paperclip text-xs"></i>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                                @endforeach

                                            </div>
                                            <div class="col-6">
                                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <button type="submit" class="btn btn-primary mb-3 mt-1">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="{{route('addChecklist')}}" method="POST">
                                        <input type="hidden" name="idUser" value="{{$user->id}}">
                                        @csrf
                                        <div class="form-group">
                                            <table id="tickets">

                                            </table>
                                        </div>
                                    </form>
                                    <div id="create-ticket-buttons">
                                        <button class="btn btn-link text-secondary mb-0 btn-tooltip create-ticket" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah List" data-container="body" data-animation="true">
                                            <i class="fa fa-plus-circle text-xs"></i> Tambah list
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card mb-4">
                                        <div class="card-header pb-0">
                                            <h6>Authors table</h6>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="15%" class="align-middle text-center">
                                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                            </td>
                                                            <td width="85%" class="justify-content-end">
                                                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                                                <p class="text-xs text-secondary mb-0">Organization</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                                                <p class="text-xs text-secondary mb-0">Organization</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @foreach($users as $user)
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{$user->name}}
                                    <div class="ms-auto text-end position-absolute end-3 me-3">
                                        <p class="text-xs font-weight-bold mb-0">{{$user->jabatan}}</p>
                                        <p class="text-xs text-secondary mb-0">{{$user->posisi}}</p>
                                    </div>
                                </div>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <form enctype="multipart/form-data" action="addfile" method="POST">
                                        <input type="hidden" name="_token" value="oFAk9ReDpXQmxme8U2le1i2v0l5gfWsTVh5zW1cf">
                                        <div class="row">
                                            <div class="col-md-4">
                                                @foreach ($checklists as $checklist)
                                                <div class="form-check">
                                                    <input type="hidden" name="idProject" value={{$id}}>
                                                    <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1">
                                                    <label class="custom-control-label <?php if (
                                                                                            $checklist->deadline < now()
                                                                                        ) {
                                                                                            echo "text-danger";
                                                                                        } ?>" for="customCheck1">{{$checklist->toDO}} </label>
                                                    <span class="text-xs">{{$checklist->deadline}}</span>
                                                    &nbsp;
                                                    <input type="file" id="file" name="linkfile" style="display:none;">
                                                    <a class="btn-link text-secondary mb-0 btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan file" data-container="body" data-animation="true" onclick="document.getElementById('file').click();">
                                                        <i class="fa fa-paperclip text-xs"></i>
                                                    </a>
                                                </div>
                                                @endforeach

                                            </div>
                                            <div class="col-6">
                                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <button type="submit" class="btn btn-primary mb-3 mt-1">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="addchecklist" method="POST">
                                        <input type="hidden" name="_token" value="oFAk9ReDpXQmxme8U2le1i2v0l5gfWsTVh5zW1cf">
                                        <div class="form-group">
                                            <table id="tickets">
                                            </table>
                                        </div>
                                    </form>
                                    <div id="create-ticket-buttons">
                                        <button class="btn btn-link text-secondary mb-0 btn-tooltip create-ticket" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah List" data-container="body" data-animation="true">
                                            <i class="fa fa-plus-circle text-xs"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseTwo" class="accordion-collapse collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="card mb-4">
                                        <div class="card-header pb-0">
                                            <h6>Authors table</h6>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="15%" class="align-middle text-center">
                                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                            </td>
                                                            <td width="85%" class="justify-content-end">
                                                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                                                <p class="text-xs text-secondary mb-0">Organization</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-center">
                                                                <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                                                            </td>
                                                            <td>
                                                                <p class="text-xs font-weight-bold mb-0">Manager</p>
                                                                <p class="text-xs text-secondary mb-0">Organization</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        @endforeach
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Teams Accordion -->

        <!-- Teams -->
        <!-- <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Teams</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">Ismi</h6>
                                <form enctype="multipart/form-data" action="{{route('addFile')}}" method="POST">
                                    @csrf
                                    @foreach($checklists as $checklist)
                                    <div class="form-check">
                                        <input type="hidden" name="idProject" value={{$id}}>
                                        <input class="form-check-input" type="checkbox" value="" id="fcustomCheck1">
                                        <label class="custom-control-label <?php if (
                                                                                $checklist->deadline < now()
                                                                            ) {
                                                                                echo "text-danger";
                                                                            } ?>" for="customCheck1"> {{$checklist->toDO}}</label>
                                        <span class="text-xs">{{$checklist->deadline}}</span>
                                        &nbsp;
                                        <input type="file" id="file" name="linkfile" style="display:none;">
                                        <a class="btn-link text-secondary mb-0 btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambahkan file" data-container="body" data-animation="true" onclick="document.getElementById('file').click();">
                                            <i class="fa fa-paperclip text-xs"></i>
                                        </a>
                                    </div>
                                    @endforeach
                                </form>
                                <form action="{{route('addChecklist')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <table id="tickets">
                                        </table>
                                    </div>
                                </form>
                                <div id="create-ticket-buttons">
                                    <button class="btn btn-link text-secondary mb-0 btn-tooltip create-ticket" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah List" data-container="body" data-animation="true">
                                        <i class="fa fa-plus-circle text-xs"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="ms-auto text-end">
                                <p class="text-xs font-weight-bold mb-0">Penanggung Jawab</p>
                                <p class="text-xs text-secondary mb-0">Creative Director</p>
                                <br>
                                <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <!-- End Teams -->

        <!-- Table Files -->
        <div class="container-fluid py-4">
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
        </div>
        <!-- End Table Files -->

    </main>
    <script src="{{asset('btsr/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/core/soft-ui-dashboard.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/plugins/chartjs.min.js')}}"></script>
    <script>
        function createTicketComponent(type) {
            type = type || null;

            var elements = [],
                rootElement = document.createElement('tr'),
                price = type === 'FREE' ? 0 : '';

            elements.push('<input type="hidden" name="idProject" value={{$id}}>');
            elements.push('<td><div class="input-group input-group-sm"><input class="form-control" type="text" name="toDO"></div></td>');
            elements.push('<td><div class="input-group input-group-sm"><input class="form-control" type="datetime-local" name="deadline"></div></td>');
            elements.push('<td><div class="input-group input-group-sm"><button type="submit" class="btn btn-outline-success text-secondary mb-0" data-container="body" data-animation="true"> Save </button></div></td>');

            rootElement.innerHTML = elements.join('');

            return rootElement;
        }


        function createFreeTicketComponent() {
            return createTicketComponent('FREE');
        }


        function onClickCreateTicketButton(event) {
            var button = event.target,
                container = document.querySelector('#tickets'),
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
                container = document.querySelector('#tickets'),
                component;

            if (button.classList.contains('free')) {
                component = createFreeTicketComponent();
            } else {
                component = createTicketComponent();
            }

            container.appendChild(component);
        }


        var buttonsGroup = document.getElementById('create-ticket-buttons');
        buttonsGroup.addEventListener('click', onClickCreateTicketButton);

        var buttonSave = document.getElementById('button-save');
        buttonSave.addEventListener('click', onClickSaveButton);
    </script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('btsr/assets/js/soft-ui-dashboard.min.js?v=1.0.5')}}"></script>
</body>

</html>