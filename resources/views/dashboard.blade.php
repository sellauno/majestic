@extends('layouts.layout')

@section('title', 'Dashboard')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<div class="container-fluid py-4">
  @if(session()->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="alert-text"><strong>Gagal!</strong> Data digunakan tidak dapat dihapus!</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Projects</h6>
            </div>
            <!-- <div class="col-6 text-end">
              <a class="btn bg-gradient-primary mb-0" href="{{route('addProject')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Project</a>
            </div> -->
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Layanan</th>
                  <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tiktok</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Feeds</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stories</th> -->
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($projects as $project)
                <tr>
                  <td>
                    <a href="{{route('project', ['id' => $project->idProject])}}">
                      <div class="d-flex px-2">
                        <!-- <div>
                        <img src="{{asset('btsr/assets/img/small-logos/logo-spotify.svg')}}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                      </div> -->
                        <div class="my-auto">
                          <h6 class="mb-0 text-sm">{{$project->namaClient}}</h6>
                        </div>
                      </div>
                    </a>
                  </td>
                  <td>
                    @foreach($layanan as $l)
                    @if($l->idProject == $project->idProject)
                    <span class="text-xs font-weight-bold mb-0">{{$l->kategori}} : </span>
                    <span class="text-xs mb-0">{{$l->jumlah}}</span><br>
                    @endif
                    @endforeach
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold">
                        {{$project->progres}}%
                      </span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="{{$project->progres}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->progres}}%;"></div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle">
                    <?php if ($loop->iteration != 1 && ($loop->iteration == count($projects) || $loop->iteration == count($projects) - 1)) { ?>
                      <div class="dropup">
                      <?php } else { ?>
                        <div class="dropdown">
                        <?php } ?>

                        <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a class="dropdown-item border-radius-md" href="{{route('editProject', ['id' => $project->idProject])}}"><i class="fa fa-pencil text-xs"></i> Edit</a></li>
                          <li><a class="dropdown-item border-radius-md text-danger text-gradient" href="{{route('deleteProject', ['id' => $project->idProject])}}"><i class="fa fa-trash text-xs"></i> Delete</a></li>
                        </ul>
                        @if($project->progres == 100)
                        <button class="btn btn-outline-success text-success mb-0 cursor-pointer" id="confirm-{{$project->idProject}}" data-bs-toggle="modal" data-bs-target="#modal-notification-{{$project->idProject}}">
                          <i class="fa fa-exclamation-circle text-xs"></i> Selesai
                        </button>
                        <div class="modal fade" id="modal-notification-{{$project->idProject}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                          <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="py-3 text-center">
                                  <i class="ni ni-bell-55 ni-3x"></i>
                                  <h4 class="text-gradient text-danger mt-4">Tandai {{$project->namaClient}} selesai?</h4>
                                  <p>Project yang sudah ditandai selesai tidak dapat di edit lagi</p>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <a href="{{route('finishProject', ['id' => $project->idProject])}}" class="btn btn-info">Ya</a>
                                <button type="button" class="btn btn-danger ml-auto" data-bs-dismiss="modal">Cancel</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
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
</div>
@endsection