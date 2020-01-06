<?php

namespace App\Providers;

use App\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $countNotice = 0;
//        $notifications = Notification::all();
//        foreach ($notifications as $notify) {
//            dd(Auth::user());
//        if (json_decode($notify->data)->receive ==Auth::user()->email) {
//            $countNotice++;
//        }
//    }
//        View::share('countNotice', $countNotice);
        Carbon::setLocale('vi');
    }
}
