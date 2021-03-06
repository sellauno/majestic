@extends('layouts.layoutuser')

@section('title', 'Dashboard')

@section('project', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<div class="container-fluid py-4">
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
                    <a href="{{route('projectUser', ['id' => $project->idProject])}}">
                      <div class="d-flex px-2">
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
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Selesai</h6>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Layanan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Completion</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($projectsfinish as $ps)
                <tr>
                  <td>
                    <a href="{{route('detailProject', ['id' => $ps->idProject])}}">
                      <div class="d-flex px-2">
                        <div class="my-auto">
                          <h6 class="mb-0 text-sm">{{$ps->namaClient}}</h6>
                        </div>
                      </div>
                    </a>
                  </td>
                  <td>
                    @foreach($layanan as $l)
                    @if($l->idProject == $ps->idProject)
                    <span class="text-xs font-weight-bold mb-0">{{$l->kategori}} : </span>
                    <span class="text-xs mb-0">{{$l->jumlah}}</span><br>
                    @endif
                    @endforeach
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold">
                        {{$ps->progres}}%
                      </span>
                      <div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="{{$ps->progres}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$ps->progres}}%;"></div>
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
</div>
<script src="{{asset('sweetalert/jquery.min.js.download')}}"></script>
<script src="{{asset('sweetalert/bootstrap.min.js.download')}}"></script>
<script src="{{asset('sweetalert/sweetalert2.min.js.download')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // $("#confirm").click(function() {
    //   var idChecklist = $(this).data('id');
    //   Swal.fire({
    //     title: 'Tandai tugas selesai?',
    //     text: "Notifikasi akan muncul melalui email Anda dan Penanggung Jawab Project!",
    //     type: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Ya'
    //   }).then((result) => {
    //     if (result.value) {
    //       Swal.fire(
    //         'Berhasil!',
    //         'Notifikasi telah terkirim',
    //         'success'
    //       )
    //       window.location = "/send-mail/".$idChecklist;
    //     }
    //   })
    // });
  });
</script>
@endsection