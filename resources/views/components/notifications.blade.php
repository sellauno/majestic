<li class="nav-item dropdown pe-2 d-flex align-items-center">
    <a href="javascript:;" class="nav-link text-body p-0 notifications" id="dropdownMenuButton" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fa fa-bell cursor-pointer" aria-hidden="true"></i>
        <span class="badge">{{ $count ? $count : ""}}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" id="dropdown-notification"
        aria-labelledby="dropdownMenuButton">
    </ul>
</li>

<script>
    const getNotifications = () => {
        let _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: "/notifications/read",
            data: {
                _token: _token
            },
            dataType: "JSON",
            beforeSend: () => {
                $("#dropdown-notification").html('<li class="mb-2"><a class="dropdown-item border-radius-md text-center" href="javascript:;"><i class="fa fa-spin fa-refresh text-center text-secondary"></i></a></li>');
            },
            success: (resp) => {
                $("#dropdown-notification").html(resp.html)
                $("#dropdownMenuButton .badge").html("")
            },
            error: (xhr) => {
                $("#dropdown-notification").html('<li class="mb-2"><a class="dropdown-item border-radius-md text-center" href="javascript:;">Failled get notifications</a></li>');
            }
        });
    }

    $(".notifications").click(function() {
        getNotifications()
    })
</script>
