<?php
namespace Care\Presenters;

use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class CommentPresenter extends Presenter
{
    public function createdTime()
    {
        return Carbon::createFromTimestamp(strtotime($this->created_at))->diffForHumans();
    }
} 