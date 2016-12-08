<?php
namespace Care;

use Eloquent;
use Laracasts\Presenter\PresentableTrait;

class Ticket extends Eloquent
{
    use PresentableTrait;

    protected $table = 'tickets';

    protected $fillable = ['title', 'content', 'client', 'status', 'attachment_id'];

    /**
     * Ticket decorator
     * @var string
     */
    protected $presenter = 'Care\Presenters\TicketPresenter';

    /**
     * A Ticket belongs to a user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Care\User', 'client');
    }

    /**
     * A Ticket has many comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Care\Comment', 'ticket_id');
    }

    public function attachment()
    {
        return $this->hasOne('Care\Attachment', 'id', 'attachment_id');
    }

    /**
     * Filter open tickets
     * @param $query
     * @return mixed
     */
    public function scopeOpen($query)
    {
        return $query->where('status', '=', '0');
    }

    /**
     * Filter resolved tickets
     * @param $query
     * @return mixed
     */
    public function scopeResolved($query)
    {
        return $query->where('status', '=', '1');
    }

} 