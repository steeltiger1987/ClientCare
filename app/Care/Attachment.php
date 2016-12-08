<?php
namespace Care;

use Eloquent;

class Attachment extends Eloquent
{
    protected $table = 'tickets_attachment';

    protected $fillable = ['alias', 'orginal_name', 'path', 'id'];

    public function ticket()
    {
        return $this->belongsTo('Care\Ticket');
    }

    public function comment()
    {
        return $this->belongsTo('Care\Comment');
    }
} 