<?php

namespace App\Providers;

use App\Repositories\Student\StudentRepository;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Repositories\Guardian\GuardianRepository;
use App\Repositories\Guardian\GuardianRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerGuardianRepo();
        $this->registerStudentRepo();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }

    public function registerStudentRepo(){
        $this->app->bind(
            StudentRepositoryInterface::class,
            StudentRepository::class
        );
    }

    public function registerGuardianRepo(){
        $this->app->bind(
            GuardianRepositoryInterface::class,
            GuardianRepository::class
        );
    }
}
