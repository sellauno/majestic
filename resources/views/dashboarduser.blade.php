@extends('layouts.layoutuser')

@section('title', 'Dashboard')

@section('dashboard', 'active')

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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Reels</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tiktok</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Feeds</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stories</th>
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
                    <div class="dropdown">
                      <div class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" data-color="dark" aria-haspopup="true" aria-expanded="false">
                        <p class="text-sm font-weight-bold mb-0">{{$project->reels}}</p>
                      </div>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <?php $no = 0; ?>
                        @foreach($reels as $reel)
                        <?php $no++;
                        if ($reel->idProject == $project->idProject) { ?>
                          <li><a class="dropdown-item border-radius-md" href="{{$reel->link}}">{{$no}}. {{$reel->link}} </a></li>
                        <?php } ?>
                        @endforeach
                      </ul>
                    </div>
                  </td>
                  <td>
                    <div class="dropdown">
                      <div class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" data-color="dark" aria-haspopup="true" aria-expanded="false">
                        <p class="text-sm font-weight-bold mb-0">{{$project->tiktok}}</p>
                      </div>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <?php $no = 0; ?>
                        @foreach($tiktoks as $tiktok)
                        <?php $no++;
                        if ($tiktok->idProject == $project->idProject) { ?>
                          <li><a class="dropdown-item border-radius-md" href="{{$tiktok->link}}">{{$no}}. {{$tiktok->link}} </a></li>
                        <?php } ?>
                        @endforeach
                      </ul>
                    </div>
                  </td>
                  <td>
                    <div class="dropdown">
                      <div class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" data-color="dark" aria-haspopup="true" aria-expanded="false">
                        <p class="text-sm font-weight-bold mb-0">{{$project->feeds}}</p>
                      </div>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <?php $no = 0; ?>
                        @foreach($feeds as $feed)
                        <?php $no++;
                        if ($feed->idProject == $project->idProject) { ?>
                          <li><a class="dropdown-item border-radius-md" href="{{$feed->link}}">{{$no}}. {{$feed->link}} </a></li>
                        <?php } ?>
                        @endforeach
                      </ul>
                    </div>
                  </td>
                  <td>
                    <div class="dropdown">
                      <div class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" data-color="dark" aria-haspopup="true" aria-expanded="false">
                        <p class="text-sm font-weight-bold mb-0">{{$project->stories}}</p>
                      </div>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <?php $no = 0; ?>
                        @foreach($stories as $story)
                        <?php $no++;
                        if ($story->idProject == $project->idProject) { ?>
                          <li><a class="dropdown-item border-radius-md" href="{{$story->link}}">{{$no}}. {{$story->link}} </a></li>
                        <?php } ?>
                        @endforeach
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
                    <?php if ($loop->iteration == count($projects)) { ?>
                      <div class="dropup">
                      <?php } else { ?>
                        <div class="dropdown">
                        <?php } ?>
                        <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-exclamation-circle text-xs"></i>
                        </button>
                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable1">
                          <li><a class="dropdown-item border-radius-md" href="javascript:;">Start : 10/10/2022</a></li>
                          <li><a class="dropdown-item border-radius-md" href="javascript:;"><b> 10 Konten<b></a></li>
                          <li><a class="dropdown-item border-radius-md" href="javascript:;">Finish : 10/11/2022</a></li>
                        </ul>
                        <button class="btn btn-link text-secondary mb-0 cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <!-- <i class="fa fa-exclamation-circle text-xs"></i> -->
                          Action
                        </button>
                        <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a class="dropdown-item border-radius-md" href="{{route('editProject', ['id' => $project->idProject])}}"><i class="fa fa-pencil text-xs"></i> Edit</a></li>
                          <li><a class="dropdown-item border-radius-md text-danger text-gradient" href="{{route('deleteProject', ['id' => $project->idProject])}}"><i class="fa fa-trash text-xs"></i> Delete</a></li>
                        </ul>
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

<div class="container-fluid py-4">
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
                <input class="form-check-input" type="checkbox" id="confirm" onclick="confirm({{$checklist->idChecklist}})" @if($checklist->checked == true) checked disabled @endif>
                <label class="custom-control-label <?php if (
                                                      $checklist->deadline < now()
                                                    ) {
                                                      echo "text-danger";
                                                    } ?>" for="todocheck">{{$checklist->toDO}}</label>
                <p id="text" style="display:none">Checkbox is CHECKED!</p>
                <a data-id="{{$checklist->idChecklist}}" type="button" style="display:none" class="btn btn-primary" id="confirm">
                    Confirm
                </a>
                <script type="text/javascript">
                    function confirm($id) {
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
                            'Berhasil!'.$idChecklist,
                            'Notifikasi telah terkirim',
                            'success'
                          )
                          window.location = "/send-mail/"+$id;
                        }
                      })
                    };
                  // $(document).ready(function() {
                  //   $("#confirm").click(function($id) {
                  //     var idChecklist = $(this).data('id');
                  //     Swal.fire({
                  //       title: 'Tandai tugas selesai?',
                  //       text: "Notifikasi akan muncul melalui email Anda dan Penanggung Jawab Project!",
                  //       type: 'warning',
                  //       showCancelButton: true,
                  //       confirmButtonColor: '#3085d6',
                  //       cancelButtonColor: '#d33',
                  //       confirmButtonText: 'Ya'
                  //     }).then((result) => {
                  //       if (result.value) {
                  //         Swal.fire(
                  //           'Berhasil!'.$idChecklist,
                  //           'Notifikasi telah terkirim',
                  //           'success'
                  //         )
                  //         window.location = "/send-mail/".$id;
                  //       }
                  //     })
                  //   });
                  // });
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