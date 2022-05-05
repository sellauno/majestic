@extends('layouts.layout')

@section('title', 'Dashboard')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <div class="row">
          <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Projects</h6>
          </div>
          <div class="col-6 text-end">
            <a class="btn bg-gradient-primary mb-0" href="{{route('addProject')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Project</a>
          </div>
        </div>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <!-- <div class="table-responsive p-0"> -->
        <table class="table align-items-center justify-content-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reels</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tiktok</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Feeds</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stories</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <a href="{{route('readClient')}}">
                  <div class="d-flex px-2">
                    <div>
                      <img src="{{asset('btsr/assets/img/small-logos/logo-spotify.svg')}}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                    </div>
                    <div class="my-auto">
                      <h6 class="mb-0 text-sm">Spotify</h6>
                    </div>
                  </div>
                </a>
              </td>
              <td>
                <div class="dropdown">
                  <div class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" data-color="dark" aria-haspopup="true" aria-expanded="false">
                    <p class="text-sm font-weight-bold mb-0">5</p>
                  </div>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">1 http://localhost:8000/dashboard</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">2 http://localhost:8000/dashboard</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">3 http://localhost:8000/dashboard</a></li>
                  </ul>
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <div class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" data-color="dark" aria-haspopup="true" aria-expanded="false">
                    <p class="text-sm font-weight-bold mb-0">5</p>
                  </div>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">1 http://localhost:8000/dashboard</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">2 http://localhost:8000/dashboard</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">3 http://localhost:8000/dashboard</a></li>
                  </ul>
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <div class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" data-color="dark" aria-haspopup="true" aria-expanded="false">
                    <p class="text-sm font-weight-bold mb-0">5</p>
                  </div>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">1 http://localhost:8000/dashboard</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">2 http://localhost:8000/dashboard</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">3 http://localhost:8000/dashboard</a></li>
                  </ul>
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <div class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" data-color="dark" aria-haspopup="true" aria-expanded="false">
                    <p class="text-sm font-weight-bold mb-0">5</p>
                  </div>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">1 http://localhost:8000/dashboard</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">2 http://localhost:8000/dashboard</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">3 http://localhost:8000/dashboard</a></li>
                  </ul>
                </div>
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
                <div class="dropdown float-lg-end pe-4">
                  <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-exclamation-circle text-xs"></i>
                  </button>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Start : 10/10/2022</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;"><b> 10 Konten<b></a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Finish : 10/11/2022</a></li>
                  </ul>
                  <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!-- <i class="fa fa-exclamation-circle text-xs"></i> -->
                    Action
                  </button>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;"><i class="fa fa-pencil text-xs"></i> Edit</a></li>
                    <li><a class="dropdown-item border-radius-md text-danger text-gradient" href="javascript:;"><i class="fa fa-trash text-xs"></i> Delete</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex px-2">
                  <div>
                    <img src="{{asset('btsr/assets/img/small-logos/logo-invision.svg')}}" class="avatar avatar-sm rounded-circle me-2" alt="invision">
                  </div>
                  <div class="my-auto">
                    <h6 class="mb-0 text-sm">Invision</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="me-2 text-xs font-weight-bold">100%</span>
                  <div>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="align-middle">
                <div class="dropdown float-lg-end pe-4">
                  <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-exclamation-circle text-xs"></i>
                  </button>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex px-2">
                  <div>
                    <img src="{{asset('btsr/assets/img/small-logos/logo-jira.svg')}}" class="avatar avatar-sm rounded-circle me-2" alt="jira">
                  </div>
                  <div class="my-auto">
                    <h6 class="mb-0 text-sm">Jira</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="me-2 text-xs font-weight-bold">30%</span>
                  <div>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30" style="width: 30%;"></div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="align-middle">

                <div class="dropdown float-lg-end pe-4">
                  <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-exclamation-circle text-xs"></i>
                  </button>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex px-2">
                  <div>
                    <img src="{{asset('btsr/assets/img/small-logos/logo-slack.svg')}}" class="avatar avatar-sm rounded-circle me-2" alt="slack">
                  </div>
                  <div class="my-auto">
                    <h6 class="mb-0 text-sm">Slack</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="me-2 text-xs font-weight-bold">0%</span>
                  <div>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: 0%;"></div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="align-middle">

                <div class="dropdown float-lg-end pe-4">
                  <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-exclamation-circle text-xs"></i>
                  </button>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex px-2">
                  <div>
                    <img src="{{asset('btsr/assets/img/small-logos/logo-webdev.svg')}}" class="avatar avatar-sm rounded-circle me-2" alt="webdev">
                  </div>
                  <div class="my-auto">
                    <h6 class="mb-0 text-sm">Webdev</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="me-2 text-xs font-weight-bold">80%</span>
                  <div>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80" style="width: 80%;"></div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="align-middle">

                <div class="dropdown float-lg-end pe-4">
                  <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-exclamation-circle text-xs"></i>
                  </button>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex px-2">
                  <div>
                    <img src="{{asset('btsr/assets/img/small-logos/logo-xd.svg')}}" class="avatar avatar-sm rounded-circle me-2" alt="xd">
                  </div>
                  <div class="my-auto">
                    <h6 class="mb-0 text-sm">Adobe XD</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">5</p>
              </td>
              <td class="align-middle text-center">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="me-2 text-xs font-weight-bold">100%</span>
                  <div>
                    <div class="progress">
                      <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                  </div>
                </div>
              </td>
              <td class="align-middle">

                <div class="dropdown float-lg-end pe-4">
                  <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-exclamation-circle text-xs"></i>
                  </button>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <!-- </div> -->
      </div>
    </div>
  </div>
</div>
@endsection