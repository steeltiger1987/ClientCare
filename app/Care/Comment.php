<?php
namespace Care;

use Laracasts\Presenter\PresentableTrait;

class Comment extends \Eloquent
{
    use PresentableTrait;

    protected $table = 'ticket_comments';

    /**
     * Mass assignment fillable properties
     * @var array
     */
    protected $fillable = ['content', 'user_id', 'ticket_id', 'attachment_id'];

    protected $presenter = 'Care\Presenters\CommentPresenter';

    /**
     * A Comment belongs to a ticket
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo('Care\Ticket');
    }

    /**
     * A Comment belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Care\User');
    }

    public function attachment()
    {
        return $this->hasOne('Care\Attachment', 'id', 'attachment_id');
    }
} 