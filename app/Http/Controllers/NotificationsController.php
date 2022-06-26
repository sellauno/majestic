<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;

class NotificationsController extends Controller
{
    public function read(Request $req)
    {
        $html = '';
        $notif = Notification::where("idUser", auth()->user()->id)->orderBy("created_at", 'DESC')->offset(0)->limit(10)->get();
        foreach ($notif as $key => $item) {
            $html .= '    
                <li class="mb-2 '.($item->isRead == "0" ? "bg-lavender " : "").'">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                        <div class="d-flex py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="text-sm font-weight-normal mb-1">
                                    <span class="font-weight-bold">'.($item->isRead == "0" ? "New " : "").'</span>
                                    '. $item->notif .'
                                </h6>
                                <p class="text-xs text-secondary mb-0 ">
                                    <i class="fa fa-clock me-1" aria-hidden="true"></i>
                                    ' . date("d M Y H:i:s", strtotime($item->created_at)) . '
                                </p>
                            </div>
                        </div>
                    </a>
                </li>';
        }

        if (empty($html)) {
            $html = '
                <li class="mb-2">
                    <a class="dropdown-item border-radius-md text-center" href="javascript:;">
                        <h6 class="text-sm font-weight-normal mb-1 text-secondary ">
                            Empty
                        </h6>
                    </a>
                </li>
            ';
        }

        Notification::where("idUser", auth()->user()->id)->update(['isRead' => 1]);

        return ["data" => $notif, "html" => $html];
    }
}
