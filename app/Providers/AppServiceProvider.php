<?php

namespace App\Providers;

use App\Http\Repository\CitiesRepositoryInterface;
use App\Http\Repository\Eloquent\CitiesEloquentRepository;
use App\Http\Repository\Eloquent\HouseEloquentRepository;
use App\Http\Repository\HouseRepositoryInterface;
use App\Http\Services\CitiesServicesInterface;
use App\Http\Services\HouseServicesInterface;
use App\Http\Services\Imple\CitiesServices;
use App\Http\Services\Imple\HouseServices;
use Carbon\Carbon;
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

        $this->app->singleton(HouseServicesInterface::class,HouseServices::class);
        $this->app->singleton(HouseRepositoryInterface::class,HouseEloquentRepository::class);

        $this->app->singleton(CitiesServicesInterface::class,CitiesServices::class);
        $this->app->singleton(CitiesRepositoryInterface::class,CitiesEloquentRepository::class);
    }
}
