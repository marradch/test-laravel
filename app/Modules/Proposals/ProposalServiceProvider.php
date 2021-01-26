<?php

namespace App\Modules\Proposals;

use Illuminate\Support\ServiceProvider;

class ProposalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Modules\Proposals\ProposalServiceContract::class, function ($app) {
            return new ProposalService(new ProposalRepository());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
