<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('btsr/assets/img/logo/logo.png')}}">
    <link rel="icon" type="image/png" href="{{asset('btsr/assets/img/logo/logo.png')}}">
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
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{asset('sweetalert/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('sweetalert/animate.min.css')}}">
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{route('dashboard')}}">
                <img src="{{asset('btsr/assets/img/logo/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Majestic Creative</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('dashboard')}}">
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
                    <a class="nav-link  @yield('client')" href="{{route('allClient')}}">
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
                <li class="nav-item">
                    <a class="nav-link  @yield('account')" href="{{route('acc')}}">
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
                        <span class="nav-link-text ms-1">Account</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Project </a></li>
                        <!-- <li class="breadcrumb-item text-sm text-dark active" aria-current="page"> </li> -->
                    </ol>
                    <h6 class="font-weight-bolder mb-0">{{$project->namaClient}}</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- <h6>{{auth()->user()->name}} &nbsp; -->
                                <span class="nav-link-text ms-1">{{auth()->user()->name}} &nbsp;</span>
                                <i class="fa fa-user cursor-pointer"></i>
                                <!-- </h6> -->
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-0">
                                    <a class="dropdown-item border-radius-md" href="{{route('profile.edit')}}">
                                        Profile
                                    </a>
                                </li>
                                <li class="mb-0">
                                    <a class="dropdown-item border-radius-md" href="{{route('logout')}}">
                                        Logout
                                    </a>
                                </li>
                                <li class="mb-0">
                                    <a class="dropdown-item border-radius-md" href="{{route('change.password')}}">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <!-- Top -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <!-- <div class="card-header pb-0">
                            <h3>{{$project->namaClient}}</h3>
                            <br>
                        </div> -->
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="accordion" id="accordionLink">
                                <div class="accordion-item ">
                                    <h2 class="accordion-header" id="headingOne">
                                        <div class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLink" aria-expanded="true" aria-controls="collapseLink">
                                            <h6>Link</h6>
                                            <form action="{{route('cari')}}" method="POST" class="position-absolute end-3 me-3 select2">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$id}}">
                                                <input type="text" name="cari" placeholder="Cari Kategori .." value="">
                                                <input type="submit" value="CARI">
                                            </form>
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
            <!-- End Top -->

            <!-- Kategori  -->
            <div class="row">
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
                                                            <a class="btn btn-link text-dark text-xxs px-3 mb-0" href="{{route('editKategori', ['id' => $kategoria->id])}}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                        </td>
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
            </div>
            <!-- End Kategori -->

            <!-- To Do List for Each User -->
            @if($myprofile != null)
            <div class="row my-4">
                <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
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
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    @foreach ($checklists as $checklist)
                                    <?php if ($checklist->idUser == auth()->user()->id) { ?>
                                        <tr>
                                            <td>
                                                <div class="timeline-content">
                                                    <h6 class="text-dark text-sm font-weight-bold mb-0">{{$checklist->toDO}}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{$checklist->deadline}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center text-end">
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                                                        </div>
                                                    </div>
                                                    &nbsp;
                                                    <span class="me-2 text-xs font-weight-bold">
                                                        10%
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="timeline-content">
                                                    @foreach ($subchecklist as $sc)
                                                    <?php if ($sc->idChecklist == $checklist->idChecklist) { ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="todocheck" @if($sc->subchecked == true) checked @endif>
                                                            <input type="hidden" name="idProject" value="{{$id}}">
                                                            <input type="hidden" name="idUser" value="{{$user->id}}">
                                                            <label class="custom-control-label <?php if (
                                                                                                    $sc->subdeadline < now()
                                                                                                ) {
                                                                                                    echo "text-danger";
                                                                                                } ?>" for="todocheck">{{$sc->subTodo}}</label>
                                                            <button type="button" style="display:none" class="btn btn-primary" id="confirm">
                                                                Confirm
                                                            </button>
                                                            <p class="text-xs">{{$sc->subdeadline}}
                                                                &nbsp;
                                                                @if($hak == true)
                                                                <a href="{{route('addFile', ['id' => $checklist->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-paperclip text-xs"></i>
                                                                </a>
                                                                <!-- <a href="{{route('editChecklist', ['id' => $checklist->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-pencil text-xs"></i>
                                                                </a> &nbsp; -->
                                                                <a class="btn-block btn-default mb-3" data-bs-toggle="modal" data-bs-target="#editsub-form{{$sc->idSubChecklist}}"><i class="fa fa-pencil text-xs"></i></a> &nbsp;
                                                                <a href="{{route('deleteSubchecklist', ['idProject' => $checklist->idProject, 'id' => $sc->idSubChecklist])}}" class="btn-link text-danger mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-trash text-xs"></i>
                                                                </a>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="modal fade" id="editsub-form{{$sc->idSubChecklist}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body p-0">
                                                                        <div class="card card-plain">
                                                                            <div class="card-header pb-0 text-left">
                                                                                <h6 class="font-weight-bolder text-info text-center text-gradient">Edit Sub Checklist</h6>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <form role="form text-left" action="{{route('updateSubchecklist', ['id' => $sc->idSubChecklist])}}" method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="idProject" value="{{$id}}">
                                                                                    <label>Kegiatan</label>
                                                                                    <div class="input-group-sm mb-3">
                                                                                        <input type="text" class="form-control" placeholder="Kegiatan" name="subTodo" value="{{$sc->subTodo}}">
                                                                                    </div>
                                                                                    <label>Tanggal Start</label>
                                                                                    <div class="input-group-sm mb-3">
                                                                                        <?php $sctglStart = str_replace(' ', 'T', $sc->subtglStart); ?>
                                                                                        <input type="datetime-local" class="form-control" name="subtglStart" value="{{$sctglStart}}">
                                                                                    </div>
                                                                                    <label>Deadline</label>
                                                                                    <div class="input-group-sm mb-3">
                                                                                        <?php $scdeadline = str_replace(' ', 'T', $sc->subdeadline); ?>
                                                                                        <input type="datetime-local" class="form-control" name="subdeadline" value="{{$scdeadline}}">
                                                                                    </div>
                                                                                    <div class="text-center">
                                                                                        <button type="submit" class="btn btn-round bg-gradient-info w-100 mt-4 mb-0">Simpan</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    @endforeach
                                                    <form action="{{route('addSubchecklist')}}" method="POST">
                                                        @csrf
                                                        <table id="tickets{{$checklist->idChecklist}}">
                                                            <input type="hidden" name="idChecklist" value="{{$checklist->idChecklist}}">
                                                            <input type="hidden" name="idUser" value="{{$checklist->idUser}}">
                                                            <input type="hidden" name="idProject" value="{{$id}}">
                                                        </table>
                                                    </form>
                                                    <!-- </div> -->

                                                    <div id="create-ticket-buttons">
                                                        <button class="btn btn-link text-secondary mb-0 " data-bs-toggle="modal" data-bs-target="#addsub-form{{$checklist->idChecklist}}">
                                                            <i class="fa fa-plus-circle text-xs"></i> Tambah Sub list
                                                        </button>
                                                    </div>

                                                    <div class="modal fade" id="addsub-form{{$checklist->idChecklist}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0">
                                                                    <div class="card card-plain">
                                                                        <div class="card-header pb-0 text-left">
                                                                            <h6 class="font-weight-bolder text-info text-center text-gradient">Tambah Sub Checklist</h6>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form role="form text-left" action="{{route('addSubchecklist')}}" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="idProject" value="{{$id}}">
                                                                                <input type="hidden" name="idChecklist" value="{{$checklist->idChecklist}}">
                                                                                <input type="hidden" name="idUser" value="{{$checklist->idUser}}">
                                                                                <label>Kegiatan</label>
                                                                                <div class="input-group-sm mb-3">
                                                                                    <input type="text" class="form-control" placeholder="Kegiatan" name="subTodo">
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
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- <div id="create-ticket-buttons">
                                                        <button class="btn btn-link text-secondary mb-0 " onclick="tambahTicket({{$checklist->idChecklist}})">
                                                            <i class="fa fa-plus-circle text-xs"></i> Tambah Sub list
                                                        </button>
                                                    </div> -->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">

                                            <div class="text-center">
                                                <form action="{{route('addChecklist')}}" method="POST">
                                                    <input type="hidden" name="idUser" value="{{$myprofile->id}}">
                                                    <input type="hidden" name="idProject" value={{$id}}>
                                                    @csrf
                                                    <div class="form-group">
                                                        <table>
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
                                                                <div class="input-group input-group-sm"><button type="submit" class="btn btn-outline-success text-secondary mb-0" data-container="body" data-animation="true"> Tambah List </button></div>
                                                            </td>
                                                        </table>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-none">
                        <div class="card-header pb-0">
                            <h6>Orders overview</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">24%</span> this month
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="ni ni-bell-55 text-success text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="ni ni-html5 text-danger text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="ni ni-cart text-info text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="ni ni-credit-card text-warning text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="ni ni-key-25 text-primary text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step">
                                        <i class="ni ni-money-coins text-dark text-gradient"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- End To Do List for Each User -->

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
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <input type="hidden" name="_token" value="oFAk9ReDpXQmxme8U2le1i2v0l5gfWsTVh5zW1cf">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    @foreach ($checklists as $checklist)
                                                    <?php if ($checklist->idUser == $myprofile->id) { ?>
                                                        <div class="form-check">
                                                            <input type="hidden" name="idProject" value="{{$id}}">
                                                            <input type="hidden" name="idUser" value="{{$myprofile->id}}">
                                                            <!-- <input class="form-check-input" type="checkbox" value="" id="todocheck" onclick="checkedCheckbox()"> -->
                                                            <input class="form-check-input" type="checkbox" id="todocheck" data-id="{{$checklist->idChecklist}} onclick=" document.getElementById('confirm').click();" @if($checklist->checked == true) checked disabled @endif>


                                                            <label class="custom-control-label <?php if (
                                                                                                    $checklist->deadline < now()
                                                                                                ) {
                                                                                                    echo "text-danger";
                                                                                                } ?>" for="todocheck">{{$checklist->toDO}} {{$loop->iteration}}</label>

                                                            <p id="text" style="display:none">Checkbox is CHECKED!</p>
                                                            <button type="button" data-id="{{$checklist->idChecklist}}" style="display:none" class="btn btn-primary" id="confirm">
                                                                Confirm
                                                            </button>
                                                            <p class="text-xs">{{$checklist->deadline}}
                                                                &nbsp;
                                                                <a href="{{route('addFile', ['id' => $checklist->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-paperclip text-xs"></i>
                                                                </a> &nbsp;
                                                                <a href="{{route('editChecklist', ['id' => $checklist->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-pencil text-xs"></i>
                                                                </a> &nbsp;
                                                                <a href="{{route('addFile', ['id' => $checklist->idChecklist])}}" class="btn-link text-danger mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-trash text-xs"></i>
                                                                </a>
                                                            </p>
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
                                            <form action="{{route('addChecklist')}}" method="POST">
                                                <input type="hidden" name="idUser" value="{{$myprofile->id}}">
                                                @csrf
                                                <div class="form-group">
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
                                                </div>
                                            </form>
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
                                @endif
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
                                            <input type="hidden" name="_token" value="oFAk9ReDpXQmxme8U2le1i2v0l5gfWsTVh5zW1cf">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    @foreach ($checklists as $checklist)
                                                    <?php if ($checklist->idUser == $user->id) { ?>
                                                        <div class="form-check">
                                                            <input type="hidden" name="idProject" value="{{$id}}">
                                                            <input type="hidden" name="idUser" value="{{$user->id}}">
                                                            <label class="custom-control-label <?php if (
                                                                                                    $checklist->deadline < now()
                                                                                                ) {
                                                                                                    echo "text-danger";
                                                                                                } ?>" for="todocheck">{{$checklist->toDO}}</label>
                                                            <button type="button" style="display:none" class="btn btn-primary" id="confirm">
                                                                Confirm
                                                            </button>
                                                            <!-- <div class="mb-1">
                                                        <div class="progress-wrapper">
                                                            <div class="progress-info">
                                                                <div class="progress-percentage">
                                                                    <span class="text-sm font-weight-bold">60%</span>
                                                                </div>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                            <p class="text-xs">{{$checklist->deadline}}
                                                                &nbsp;
                                                                @if($hak == true)
                                                                <a href="{{route('addFile', ['id' => $checklist->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-paperclip text-xs"></i>
                                                                </a> &nbsp;
                                                                <a href="{{route('editChecklist', ['id' => $checklist->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-pencil text-xs"></i>
                                                                </a> &nbsp;
                                                                <a href="{{route('addFile', ['id' => $checklist->idChecklist])}}" class="btn-link text-danger mb-1" data-container="body" data-animation="true">
                                                                    <i class="fa fa-trash text-xs"></i>
                                                                </a>
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div>
                                                            @foreach ($subchecklist as $sc)
                                                            <?php if ($sc->idChecklist == $checklist->idChecklist) { ?>
                                                                <div class="form-check">
                                                                    <input type="hidden" name="idProject" value="{{$id}}">
                                                                    <input type="hidden" name="idUser" value="{{$user->id}}">
                                                                    <input type="hidden" name="idChecklist" value="{{$checklist->idChecklist}}">
                                                                    <!-- <input class="form-check-input" type="checkbox" value="" id="todocheck" onclick="checkedCheckbox()"> -->
                                                                    <input class="form-check-input" type="checkbox" value="" id="todocheck" @if($sc->subchecked == true) checked @endif disabled>
                                                                    <label class="custom-control-label text-xs <?php if (
                                                                                                                    $checklist->deadline < now()
                                                                                                                ) {
                                                                                                                    echo "text-danger";
                                                                                                                } ?>" for="todocheck">{{$sc->subTodo}}</label>
                                                                    <button type="button" style="display:none" class="btn btn-primary" id="confirm">
                                                                        Confirm
                                                                    </button>
                                                                </div>
                                                            <?php } ?>
                                                            @endforeach
                                                        </div>
                                                        <form action="{{route('addSubchecklist')}}" method="POST">
                                                            @csrf
                                                            <table id="tickets{{$checklist->idChecklist}}">
                                                                <input type="hidden" name="idChecklist" value="{{$checklist->idChecklist}}">
                                                                <input type="hidden" name="idUser" value="{{$checklist->idUser}}">
                                                                <input type="hidden" name="idProject" value="{{$id}}">
                                                            </table>
                                                        </form>
                                                        <div id="create-ticket-buttons">
                                                            <button class="btn btn-link text-secondary mb-0 " onclick="tambahTicket({{$checklist->idChecklist}})">
                                                                <i class="fa fa-plus-circle text-xs"></i> Tambah Sub list
                                                            </button>
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
                                            @if($hak == true)
                                            <form action="{{route('addChecklist')}}" method="POST">
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
                                            </form>
                                            @endif
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
    </main>
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
    <script src="{{asset('btsr/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/core/soft-ui-dashboard.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('btsr/assets/js/plugins/chartjs.min.js')}}"></script>
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
        });
    </script>
    <!-- <script>
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
    </script> -->
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