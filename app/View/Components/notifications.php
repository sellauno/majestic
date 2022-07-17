<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Notification;

class notifications extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = auth()->user();
        $unReadCount = Notification::where("idUser", $user->id)->where("isRead", 0)->get()->count();

        return view('components.notifications', ["counts" => $unReadCount]);
    }
}
