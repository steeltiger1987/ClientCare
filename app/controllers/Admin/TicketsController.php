<?php
namespace Admin;

use Care\Forms\SubmitTicketForm;
use Care\Mailers\UserMailerInterface;
use Care\Repositories\TicketsRepositoryInterface;
use Care\Repositories\AttachmentsRepositoryInterface;
use Care\Repositories\UsersRepositoryInterface;
use Care\Facades\Uploader;
use BaseController;
use View;
use Redirect;
use Input;

class TicketsController extends BaseController
{
    protected $ticketForm;
    protected $tickets;
    protected $users;
    protected $attachments;
    protected $userMailer;

    function __construct(SubmitTicketForm $ticketForm,
                         TicketsRepositoryInterface $tickets,
                         AttachmentsRepositoryInterface $attachments,
                         UserMailerInterface $mailer,
                         UsersRepositoryInterface $users)
    {
        $this->ticketForm  = $ticketForm;
        $this->users       = $users;
        $this->tickets     = $tickets;
        $this->attachments = $attachments;
        $this->userMailer = $mailer;
    }

    /**
     * Display all tickets
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $tickets = $this->tickets->getAll();

        return View::make('tickets.index', compact('clients', 'tickets'));
    }

    /**
     * Display open tickets
     * @return \Illuminate\View\View
     */
    public function getOpen()
    {
        $tickets = $this->tickets->getOpenTickets();

        return View::make('tickets.index', compact('tickets', 'clients'));
    }

    /**
     * Display resolved tickets
     * @return \Illuminate\View\View
     */
    public function getResolved()
    {
        $tickets = $this->tickets->getResolvedTickets();

        return View::make('tickets.index', compact('tickets', 'clients'));
    }

    /**
     * Process tickets submission
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
            'client'        => Input::get('client'),
            'attachment_id' => isset($attachmendId) ? $attachmendId : null,
            'status'        => Input::get('status')
        ]);

        $client = $this->users->getById(Input::get('client'));
        $this->userMailer->TicketOpened($client);

        $this->tickets->save($ticket);

        return Redirect::back()->withMessage('Ticket has been submitted successfully');
    }

    /**
     * Mark ticket as open
     * @param $id
     * @return mixed
     */
    public function getReopen($id)
    {
        $this->tickets->openTicket($id);

        return Redirect::back()->withMessage('Ticket has been opened');
    }

    /**
     * Mark ticket as resolved
     * @param $id
     * @return mixed
     */
    public function getResolve($id)
    {
        $this->tickets->resolveTicket($id);

        return Redirect::back()->withMessage('Ticket has been resolved');
    }
} 