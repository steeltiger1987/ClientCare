<?php
namespace Care\Repositories\Eloquent;

use Care\Comment;
use Care\Core\EloquentBase;
use Care\Repositories\CommentsRepositoryInterface;

class CommentsRepository extends EloquentBase implements CommentsRepositoryInterface
{
    function __construct(Comment $model)
    {
        $this->model = $model;
    }
} 