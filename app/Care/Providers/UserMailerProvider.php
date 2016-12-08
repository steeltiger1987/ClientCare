<?php
namespace Care\Providers;

use Illuminate\Support\ServiceProvider;

class UserMailerProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Care\Mailers\UserMailerInterface',
            'Care\Mailers\Swift\UserMailer'
        );
    }
}