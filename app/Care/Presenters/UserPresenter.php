<?php
namespace Care\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Present user status active|blocked
     * @return string
     */
    public function userStatus()
    {
        if ($this->active == 1) {
            return "<span class='label label-success'>Active</span>";
        }

        return "<span class='label label-danger'>Blocked</span>";
    }

    /**
     * Present user registration time
     * @return string
     */
    public function registerTime()
    {
        return Carbon::createFromTimestamp(strtotime($this->created_at))->diffForHumans();
    }

} 