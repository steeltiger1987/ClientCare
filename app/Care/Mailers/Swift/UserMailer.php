<?php
namespace Care\Mailers\Swift;

use Care\Mailers\UserMailerInterface;
use Care\User;

class UserMailer extends Mailer implements UserMailerInterface
{
    /**
     * Send welcome email to new registered users
     * @param User $user
     * @return mixed|void
     */
    public function welcome(User $user)
    {
        $view    = 'emails.welcome';
        $subject = 'Welcome to ClientCare';
        $data    = [
            'name' => $user->name
        ];

        return $this->sendTo($user->email, $subject, $view, $data);
    }

    public function TicketOpened(User $user)
    {
        $view    = 'emails.new-ticket';
        $subject = 'New Ticket is Opened';
        $data    = [
            'name' => $user->name
        ];

        return $this->sendTo($user->email, $subject, $view, $data);
    }
}