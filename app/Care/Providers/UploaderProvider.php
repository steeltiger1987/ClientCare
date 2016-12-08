<?php
namespace Care\Providers;

use Care\Uploader\Uploader;
use Illuminate\Support\ServiceProvider;

class UploaderProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind('uploader', 'Care\Uploader\Uploader');
    }
}