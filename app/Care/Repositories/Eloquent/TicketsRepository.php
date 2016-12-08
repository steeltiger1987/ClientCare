<?php
namespace Care\Repositories\Eloquent;

use Care\Core\EloquentBase;
use Care\Repositories\TicketsRepositoryInterface;
use Care\Ticket;

class TicketsRepository extends EloquentBase implements TicketsRepositoryInterface
{
    function __construct(Ticket $model)
    {
        $this->model = $model;
    }

    /**
     * Get open tickets
     * @return mixed
     */
    public function getOpenTickets()
    {
        return $this->model->open()->get();
    }

    /**
     * Get resolved tickets
     * @return mixed
     */
    public function getResolvedTickets()
    {
        return $this->model->resolved()->get();
    }

    public function isTicketBelongsToUser($uid, $tid)
    {
        $ticket = $this->model->find($tid);
        return ($ticket->client == $uid);
    }

    public function openTicket($id)
    {
        $ticket         = $this->model->find($id);
        $ticket->status = 0;
        $ticket->save();
    }

    public function resolveTicket($id)
    {
        $ticket         = $this->model->find($id);
        $ticket->status = 1;
        $ticket->save();
    }

    public function getUserTickets($uid)
    {
        return $this->model->where('client', '=', $uid)->get();
    }

    public function getUserOpenTickets($uid)
    {
        return $this->model->where('client', '=', $uid)
            ->where('status', '=', '0')->get();
    }

    public function getUserClosedTickets($uid)
    {
        return $this->model->where('client', '=', $uid)
            ->where('status', '=', '1')->get();
    }
}