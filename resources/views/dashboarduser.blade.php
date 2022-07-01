@extends('layouts.layoutuser')

@section('title', 'Dashboard')

@section('dashboard', 'active')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<div class="container-fluid py-4">
  <!-- <div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-2">
      <div class="card h-100 shadow-none">
        <div class="card-header pb-0">
          <h6>Projects</h6>
        </div>
        <div class="card-body px-1 pb-2">
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

    <div class="col-lg-4 col-md-6">
      <div class="card h-100 shadow-none">
        <div class="card-header pb-0">
          <h6>Komentar</h6>
        </div>
        <div class="card-body p-3">
          <ul class="list-group">
            @foreach($komentar as $komen)
            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
              <div class="d-flex align-items-start flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{$komen->name}}</h6>
                <p class="mb-0 text-xs">{{$komen->body}}</p>
                <span class="text-secondary font-weight-bold text-xxs mt-1 mb-0">{{$komen->created_at}}</span>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div> -->

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">To Do List</h6>
        </div>
        <div class="card-body pt-4 p-3">
          <ul class="list-group">
            @foreach($projects as $project)
            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
              <div class="d-flex flex-column">
                <h6 class="mb-3 text-sm">{{$project->namaClient}}</h6>
                @foreach($checklists as $checklist)
                <?php if ($project->idProject == $checklist->idProject) { ?>
                  <!-- <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Stone Tech Zone</span></span> -->
                  <div class="form-check">
                    <input type="hidden" name="idProject" value="{{$project->idProject}}">
                    <input type="hidden" name="idUser" value="{{$idUser}}">
                    <!-- <input class="form-check-input" type="checkbox" value="" id="todocheck" onclick="checkedCheckbox()"> -->
                    <input class="form-check-input" type="checkbox" id="confirm" onclick="confirm({{$checklist->idsubtodo}}); this.checked=!this.checked;" @if($checklist->checked == true) checked disabled @endif>
                    <label class="custom-control-label <?php if (
                                                          $checklist->deadline < now()
                                                        ) {
                                                          echo "text-danger";
                                                        } ?>" for="todocheck">{{$checklist->subtodo}}</label>
                    <p id="text" style="display:none">Checkbox is CHECKED!</p>
                    <a data-id="{{$checklist->idChecklist}}" type="button" style="display:none" class="btn btn-primary" id="confirm">
                      Confirm
                    </a>
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
                    <p class="text-xs">{{$checklist->deadline}}
                      &nbsp;
                      <a href="{{route('addFile', ['id' => $checklist->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                        <i class="fa fa-paperclip text-xs"></i>
                      </a> &nbsp;
                      <!-- <a href="{{route('editChecklist', ['id' => $checklist->idChecklist])}}" class="btn-link text-secondary mb-1" data-container="body" data-animation="true">
                    <i class="fa fa-pencil text-xs"></i>
                  </a> &nbsp;
                  <a href="{{route('addFile', ['id' => $checklist->idChecklist])}}" class="btn-link text-danger mb-1" data-container="body" data-animation="true">
                    <i class="fa fa-trash text-xs"></i>
                  </a> -->
                    </p>
                  </div>
                <?php } ?>
                @endforeach
              </div>
            </li>
            @endforeach
          </ul>
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