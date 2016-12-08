<?php
namespace Client;

use Care\Forms\SubmitTicketForm;
use Care\Repositories\TicketsRepositoryInterface;
use Care\Repositories\AttachmentsRepositoryInterface;
use Care\Repositories\UsersRepositoryInterface;
use Care\Facades\Uploader;
use BaseController;
use Illuminate\Support\Facades\Auth;
use View;
use Redirect;
use Input;

class TicketsController extends BaseController
{
    protected $ticketForm;
    protected $tickets;
    protected $users;
    protected $attachments;

    function __construct(SubmitTicketForm $ticketForm,
                         TicketsRepositoryInterface $tickets,
                         AttachmentsRepositoryInterface $attachments,
                         UsersRepositoryInterface $users)
    {
        $this->ticketForm  = $ticketForm;
        $this->users       = $users;
        $this->tickets     = $tickets;
        $this->attachments = $attachments;
    }

    /**
     * Display all tickets
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $tickets = $this->tickets->getUserTickets(Auth::user()->id);

        return View::make('tickets.index', compact('clients', 'tickets'));
    }

    /**
     * Display resolved tickets
     * @return \Illuminate\View\View
     */
    public function getResolved()
    {
        $tickets = $this->tickets->getUserClosedTickets(Auth::user()->id);

        return View::make('tickets.index', compact('clients', 'tickets'));
    }

    /**
     * Display resolved tickets
     * @return \Illuminate\View\View
     */
    public function getOpen()
    {
        $tickets = $this->tickets->getUserOpenTickets(Auth::user()->id);

        return View::make('tickets.index', compact('clients', 'tickets'));
    }

    /**
     * Process submission a new ticket
     * @return mixed
     */
    public function postTicket()
    {
        $this->ticketForm->validate(Input::all());

        // Handle attachments
        if (Input::hasFile('attachment')) {
            $attachmendId = Uploader::attach(Input::file('attachment'));
        }

        $ticket = $this->tickets->getNew([
            'title'         => Input::get('title'),
            'content'       => Input::get('content'),
            'client'        => Auth::user()->id,
            'attachment_id' => isset($attachmendId) ? $attachmendId : null,
            'status'        => 0
        ]);

        $this->tickets->save($ticket);

        return Redirect::back()->withMessage('Ticket has been submitted successfully');
    }

} 