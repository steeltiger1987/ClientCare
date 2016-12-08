<?php
namespace Care\Mailers;

use Care\User;

interface UserMailerInterface
{
    /**
     * Send welcome email to new registered users
     * @param User $user
     * @return mixed
     */
    public function welcome(User $user);

    public function TicketOpened(User $user);
}




