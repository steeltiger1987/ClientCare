<?php
namespace Care\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposersProvider extends ServiceProvider
{
    public function register()
    {
        View::composer('tickets.index', 'Care\Composers\TicketsComposer');
    }
}