<?php
namespace Care\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Care\Repositories\UsersRepositoryInterface',
            'Care\Repositories\Eloquent\UsersRepository'
        );

        $this->app->bind(
            'Care\Repositories\AttachmentsRepositoryInterface',
            'Care\Repositories\Eloquent\AttachmentsRepository'
        );

        $this->app->bind(
            'Care\Repositories\TicketsRepositoryInterface',
            'Care\Repositories\Eloquent\TicketsRepository'
        );

        $this->app->bind(
            'Care\Repositories\CommentsRepositoryInterface',
            'Care\Repositories\Eloquent\CommentsRepository'
        );
    }
}