<?php
namespace Care\Composers;

use Auth;
use Care\Repositories\TicketsRepositoryInterface;
use Care\Repositories\UsersRepositoryInterface;

class TicketsComposer
{
    protected $tickets;
    protected $users;

    function __construct(TicketsRepositoryInterface $tickets, UsersRepositoryInterface $users)
    {
        $this->tickets = $tickets;
        $this->users   = $users;
    }

    public function compose($view)
    {
        if (Auth::user()->isAdmin()) {
            $allTickets      = $this->tickets->getAll()->count();
            $openTickets     = $this->tickets->getOpenTickets()->count();
            $resolvedTickets = $this->tickets->getResolvedTickets()->count();
            $clients         = $this->users->getClients();
        }

        if (Auth::user()->isClient()) {
            $allTickets      = $this->tickets->getUserTickets(Auth::user()->id)->count();
            $openTickets     = $this->tickets->getUserOpenTickets(Auth::user()->id)->count();
            $resolvedTickets = $this->tickets->getUserClosedTickets(Auth::user()->id)->count();
            $clients         = $this->users->getClients();
        }

        $view->with('allTickets', $allTickets);
        $view->with('openTickets', $openTickets);
        $view->with('resolvedTickets', $resolvedTickets);
        $view->with('clients', $clients);
    }
} 