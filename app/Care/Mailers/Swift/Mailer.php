<?php
namespace Care\Mailers\Swift;

use Mail;

abstract class Mailer
{
    /**
     * Core Mailer
     * @param       $email
     * @param       $subject
     * @param       $view
     * @param array $data
     */
    public function sendTo($email, $subject, $view, $data = [])
    {
        Mail::queue($view, $data, function ($message) use ($email, $subject) {
            $message->to($email)
                ->subject($subject);
        });
    }
} 