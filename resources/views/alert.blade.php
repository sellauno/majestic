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

    <link rel="stylesheet" href="{{asset('sweetalert/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('sweetalert/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('sweetalert/all.css')}}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('sweetalert/animate.min.css')}}">
    <style type="text/css">
        .btn {
            width: 100%;
        }
    </style>
</head>

<body class="" style="padding-right: 0px;">
    <!-- Image and text -->
    <nav class="navbar navbar-dark bg-primary" aria-hidden="true">
        <a class="navbar-brand" href="https://demo.dewankomputer.com/php/dewan-sweetalert/index.php" style="color: #fff;">
            Dewan Komputer
        </a>
    </nav>
    <div class="container" aria-hidden="true">
        <h2 align="center" style="margin: 30px;">SweetAlert</h2>
        <hr>
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="basic">
                    Basic
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="iconText">
                    Icon &amp; Text
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="withFooter">
                    Footer
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="confirm">
                    Confirm
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="confirm2">
                    Custom Confirm
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="customHtml">
                    Custom HTML
                </button>
            </div>
        </div>
        <hr>

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="tallImage">
                    Gambar Panjang
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="image">
                    Gambar
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="custom">
                    Gambar Custom
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="chain">
                    Chain
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="timer">
                    Auto Close
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="ajax">
                    Github Ajax
                </button>
            </div>
        </div>
        <hr>

        <div class="row" style="margin-bottom: 30px;">
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="kananAtas">
                    Kanan Atas
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="kananBawah">
                    Kanan Bawah
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="kiriAtas">
                    Kiri Atas
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="kiriBawah">
                    Kiri Bawah
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="mixin">
                    Mixin
                </button>
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-primary" id="animate">
                    Animasi Tada
                </button>
            </div>
        </div>
        <hr>
        <!-- DEMO ANIMATE.CSS -->
        <h3 align="center" style="margin: 30px;">Demo Animate.css</h3>
        <div align="center">
            <div class="row">
                <div class="col-sm-1 offset-sm-4">
                    <label>Animasi</label>
                </div>
                <div class="col-sm-2">
                    <select class="form-control" id="animasi">
                        <optgroup label="Attention Seekers">
                            <option value="bounce">bounce</option>
                            <option value="flash">flash</option>
                            <option value="pulse">pulse</option>
                            <option value="rubberBand">rubberBand</option>
                            <option value="shake">shake</option>
                            <option value="swing">swing</option>
                            <option value="tada">tada</option>
                            <option value="wobble">wobble</option>
                            <option value="jello">jello</option>
                        </optgroup>
                        <optgroup label="Bouncing Entrances">
                            <option value="bounceIn" selected="">bounceIn</option>
                            <option value="bounceInDown">bounceInDown</option>
                            <option value="bounceInLeft">bounceInLeft</option>
                            <option value="bounceInRight">bounceInRight</option>
                            <option value="bounceInUp">bounceInUp</option>
                        </optgroup>
                        <optgroup label="Fading Entrances">
                            <option value="fadeIn">fadeIn</option>
                            <option value="fadeInDown">fadeInDown</option>
                            <option value="fadeInDownBig">fadeInDownBig</option>
                            <option value="fadeInLeft">fadeInLeft</option>
                            <option value="fadeInLeftBig">fadeInLeftBig</option>
                            <option value="fadeInRight">fadeInRight</option>
                            <option value="fadeInRightBig">fadeInRightBig</option>
                            <option value="fadeInUp">fadeInUp</option>
                            <option value="fadeInUpBig">fadeInUpBig</option>
                        </optgroup>
                        <optgroup label="Flippers">
                            <option value="flipInX">flipInX</option>
                            <option value="flipInY">flipInY</option>
                        </optgroup>
                        <optgroup label="Lightspeed">
                            <option value="lightSpeedIn">lightSpeedIn</option>
                        </optgroup>
                        <optgroup label="Rotating Entrances">
                            <option value="rotateIn">rotateIn</option>
                            <option value="rotateInDownLeft">rotateInDownLeft</option>
                            <option value="rotateInDownRight">rotateInDownRight</option>
                            <option value="rotateInUpLeft">rotateInUpLeft</option>
                            <option value="rotateInUpRight">rotateInUpRight</option>
                        </optgroup>
                        <optgroup label="Sliding Entrances">
                            <option value="slideInUp">slideInUp</option>
                            <option value="slideInDown">slideInDown</option>
                            <option value="slideInLeft">slideInLeft</option>
                            <option value="slideInRight">slideInRight</option>
                        </optgroup>
                        <optgroup label="Zoom Entrances">
                            <option value="zoomIn">zoomIn</option>
                            <option value="zoomInDown">zoomInDown</option>
                            <option value="zoomInLeft">zoomInLeft</option>
                            <option value="zoomInRight">zoomInRight</option>
                            <option value="zoomInUp">zoomInUp</option>
                        </optgroup>
                        <optgroup label="Specials">
                            <option value="rollIn">rollIn</option>
                        </optgroup>
                    </select>
                </div>
                <div class="col-sm-2" valign="bottom">
                    <button type="button" class="btn btn-primary" id="animateDemo">
                        Tampilkan
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <hr>
        <div class="text-center">© 2022 Copyright:
            <a href="https://dewankomputer.com/"> Dewan Komputer</a>
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
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
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
        <!-- {{asset('sweetalert/')}} -->
        <script src="{{asset('btsr/assets/js/core/popper.min.js')}}"></script>
        <script src="{{asset('btsr/assets/js/core/bootstrap.min.js')}}"></script>
        <script src="{{asset('btsr/assets/js/core/soft-ui-dashboard.min.js')}}"></script>
        <script src="{{asset('btsr/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('btsr/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
        <script src="{{asset('btsr/assets/js/plugins/chartjs.min.js')}}"></script>
        
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
    </div>
</body>

</html>