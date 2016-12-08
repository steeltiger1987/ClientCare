<?php
namespace Care\Events;

use Care\Mailers\UserMailerInterface;

class UserHasRegistered
{
    protected $userMailer;

    function __construct(UserMailerInterface $userMailer)
    {
        $this->userMailer = $userMailer;
    }

    /**
     * Inform user about registration via email
     * @param $data
     */
    public function handle($data)
    {
        $this->userMailer->welcome($data);
    }
} 