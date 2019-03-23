<?php

namespace App\Providers;

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
        $this->registerRepositories();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Add the model repositories into the service container.
     */
    protected function registerRepositories(): void
    {
        $repositories = [
            'UserRepository',
            'OrganizationRepository',
            'RepositoryRepository',
        ];

        foreach ($repositories as $contract => $concrete) {
            $this->app->singleton('\App\Contracts\Repositories\\' . $contract, '\App\Repositories\\' . $concrete);
        }
    }
}
