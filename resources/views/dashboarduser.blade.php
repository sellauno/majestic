@extends('layouts.layout')

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
            <div class="col-6 text-end">
              <a class="btn bg-gradient-primary mb-0" href="{{route('addProject')}}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Project</a>
            </div>
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
                <input class="form-check-input" type="checkbox" value="" id="todocheck" onclick="document.getElementById('confirm').click();">


                <label class="custom-control-label <?php if (
                                                      $checklist->deadline < now()
                                                    ) {
                                                      echo "text-danger";
                                                    } ?>" for="todocheck">{{$checklist->toDO}}</label>

                <p id="text" style="display:none">Checkbox is CHECKED!</p>
                <button type="button" style="display:none" class="btn btn-primary" id="confirm">
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
    $("#basic").click(function() {
      Swal.fire('Ini adalah sweetalert Basic');
    });

    $("#animate").click(function() {
      Swal.fire({
        title: 'Custom animation with Animate.css',
        animation: false,
        customClass: 'animated tada'
      })
    });

    $("#iconText").click(function() {
      Swal.fire(
        'Ini adalah judulnya',
        'Ini adalah teksnya',
        'success'
      )
    });

    $("#withFooter").click(function() {
      Swal.fire({
        type: 'error',
        title: 'Oops...',
        text: 'Something went wrong!',
        footer: '<a href="https://dewankomputer.com/">Why do I have this issue?</a>'
      });
    });

    $("#tallImage").click(function() {
      Swal.fire({
        imageUrl: 'https://placeholder.pics/svg/300x1500',
        imageHeight: 1500,
        imageAlt: 'A tall image'
      })
    });

    $("#customHtml").click(function() {
      Swal.fire({
        title: '<strong>HTML <u>example</u></strong>',
        type: 'info',
        html: 'You can use <b>bold text</b>, ' +
          '<a href="//github.com">links</a> ' +
          'and other HTML tags',
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
        cancelButtonAriaLabel: 'Thumbs down',
      })
    });

    $("#kananAtas").click(function() {
      Swal.fire({
        position: 'top-end',
        type: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      })
    });

    $("#kananBawah").click(function() {
      Swal.fire({
        position: 'bottom-end',
        type: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      })
    });

    $("#kiriBawah").click(function() {
      Swal.fire({
        position: 'bottom-start',
        type: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      })
    });

    $("#kiriAtas").click(function() {
      Swal.fire({
        position: 'top-start',
        type: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      })
    });

    $("#confirm").click(function() {
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
        }
      })
    });

    $("#confirm2").click(function() {
      const swalWithBootstrapButtons = Swal.mixin({
        confirmButtonClass: 'btn btn-success',
        cancelButtonClass: 'btn btn-danger',
        buttonsStyling: false,
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    });

    $("#image").click(function() {
      Swal.fire({
        title: 'Sweet!',
        text: 'Modal with a custom image.',
        imageUrl: 'https://unsplash.it/400/200',
        imageWidth: 400,
        imageHeight: 200,
        imageAlt: 'Custom image',
        animation: false
      })
    });

    $("#custom").click(function() {
      Swal.fire({
        title: 'Custom width, padding, background.',
        width: 600,
        padding: '3em',
        background: '#fff url(trees.png)',
        backdrop: `
				    rgba(0,0,123,0.4)
				    url("nyan-cat.gif")
				    center left
				    no-repeat
				  `
      })
    });

    $("#timer").click(function() {
      let timerInterval
      Swal.fire({
        title: 'Auto close alert!',
        html: 'I will close in <strong></strong> seconds.',
        timer: 2000,
        onBeforeOpen: () => {
          Swal.showLoading()
          timerInterval = setInterval(() => {
            Swal.getContent().querySelector('strong')
              .textContent = Swal.getTimerLeft()
          }, 100)
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        if (
          result.dismiss === Swal.DismissReason.timer
        ) {
          console.log('I was closed by the timer')
        }
      })
    });

    $("#ajax").click(function() {
      Swal.fire({
        title: 'Submit your Github username',
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Look up',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
          return fetch(`//api.github.com/users/${login}`)
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText)
              }
              return response.json()
            })
            .catch(error => {
              Swal.showValidationMessage(
                `Request failed: ${error}`
              )
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        if (result.value) {
          Swal.fire({
            title: `${result.value.login}'s avatar`,
            imageUrl: result.value.avatar_url
          })
        }
      })
    });

    $("#chain").click(function() {
      Swal.mixin({
        input: 'text',
        confirmButtonText: 'Next &rarr;',
        showCancelButton: true,
        progressSteps: ['1', '2', '3']
      }).queue([{
          title: 'Question 1',
          text: 'Chaining swal2 modals is easy'
        },
        'Question 2',
        'Question 3'
      ]).then((result) => {
        if (result.value) {
          Swal.fire({
            title: 'All done!',
            html: 'Your answers: <pre><code>' +
              JSON.stringify(result.value) +
              '</code></pre>',
            confirmButtonText: 'Lovely!'
          })
        }
      })
    });

    $("#mixin").click(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: 'success',
        title: 'Signed in successfully'
      })
    });

    $("#animateDemo").click(function() {
      var animasi = $('#animasi').val();

      Swal.fire({
        title: 'Custom animation with Animate.css',
        animation: false,
        customClass: 'animated ' + animasi
      })
    });
  });
</script>
@endsection