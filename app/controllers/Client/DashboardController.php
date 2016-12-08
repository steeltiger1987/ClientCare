<?php
namespace Client;

use Care\Repositories\TicketsRepositoryInterface;
use Care\Repositories\UsersRepositoryInterface;
use BaseController;
use Illuminate\Support\Facades\Auth;
use View;

class DashboardController extends BaseController
{
    protected $usersRepository;
    protected $tickets;

    function __construct(UsersRepositoryInterface $usersRepository, TicketsRepositoryInterface $tickets)
    {
        $this->usersRepository = $usersRepository;
        $this->tickets         = $tickets;
    }

    public function getDashboard()
    {
        if (Auth::user()->isAdmin()) {
            $counts['clients'] = $this->usersRepository->getAll()->count();
        }

        $counts['allTickets'] = $this->tickets->getUserTickets(Auth::user()->id)->count();
        $counts['openTickets'] = $this->tickets->getUserOpenTickets(Auth::user()->id)->count();
        $counts['resolvedTickets'] = $this->tickets->getUserClosedTickets(Auth::user()->id)->count();


        return View::make('dashboard.index', compact('counts'));
    }
} 