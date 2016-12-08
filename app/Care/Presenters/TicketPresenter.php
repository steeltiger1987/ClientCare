<?php
namespace Care\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class TicketPresenter extends Presenter
{
    /**
     * Present user registration time
     * @return string
     */
    public function lastUpdate()
    {
        return Carbon::createFromTimestamp(strtotime($this->updated_at))->diffForHumans();
    }

    public function createdTime()
    {
        return Carbon::createFromTimestamp(strtotime($this->created_at))->diffForHumans();
    }

    public function ticketStatus()
    {
        if($this->status == 0) {
            return "<span class='label label-success'>Open</span>";
        }

        return "<span class='label label-danger'>Resolved</span>";
    }
} 