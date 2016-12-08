<?php

use Care\Repositories\CommentsRepositoryInterface;
use Care\Repositories\TicketsRepositoryInterface;

class CommentsController extends BaseController
{
    protected $tickets;
    protected $comments;

    function __construct(TicketsRepositoryInterface $tickets,
                         CommentsRepositoryInterface $comments)
    {
        $this->tickets  = $tickets;
        $this->comments = $comments;
    }

    /**
     * Display ticket with comments
     * @param $id
     * @throws Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @return \Illuminate\View\View
     */
    public function getShow($id)
    {
        if (Auth::user()->isAdmin() || $this->tickets->isTicketBelongsToUser(Auth::user()->id, $id)) {
            $ticket = $this->tickets->getById($id);
            return View::make('tickets.show', compact('ticket'));
        }

        Throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
    }

    /**
     * Process posting a comment
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postComment($id)
    {
        $content = trim(Input::get('content'));

        if (empty($content)) {
            return Redirect::back();
        }

        // Post if user has permission
        if (Auth::user()->isAdmin() || $this->tickets->isTicketBelongsToUser(Auth::user()->id, $id)) {

            // Handle attachments
            if (Input::hasFile('attachment')) {
                $attachmendId = Uploader::attach(Input::file('attachment'));
            }

            // Store comment
            $comment = $this->comments->getNew([
                'content'       => Input::get('content'),
                'user_id'       => Auth::user()->id,
                'attachment_id' => isset($attachmendId) ? $attachmendId : null,
                'ticket_id'     => $id
            ]);

            $this->comments->save($comment);
        }

        return Redirect::back()->withMessage('Comment has been submitted successfully');
    }
} 