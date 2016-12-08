<?php
namespace Care\Repositories\Eloquent;

use Care\Attachment;
use Care\Core\EloquentBase;
use Care\Repositories\AttachmentsRepositoryInterface;
use Response;

class AttachmentsRepository extends EloquentBase implements AttachmentsRepositoryInterface
{
    function __construct(Attachment $model)
    {
        $this->model = $model;
    }

    public function getAttachmentByHash($hash)
    {
        return $this->model->where('alias', '=', $hash)->first();
    }
}