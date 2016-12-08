<?php
namespace Admin;

use BaseController;
use Care\Repositories\TicketsRepositoryInterface;
use Care\Repositories\UsersRepositoryInterface;
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
        $counts['clients']         = $this->usersRepository->getAll()->count();
        $counts['allTickets']      = $this->tickets->getAll()->count();
        $counts['resolvedTickets'] = $this->tickets->getResolvedTickets()->count();
        $counts['openTickets']     = $this->tickets->getOpenTickets()->count();

        return View::make('dashboard.index', compact('counts'));
    }
} 