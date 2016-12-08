<?php
namespace Care\Repositories;

interface TicketsRepositoryInterface
{
    public function getOpenTickets();

    public function getResolvedTickets();

    public function isTicketBelongsToUser($uid, $tid);

    public function openTicket($id);

    public function resolveTicket($id);

    public function getUserTickets($uid);

    public function getUserOpenTickets($uid);

    public function getUserClosedTickets($uid);
}