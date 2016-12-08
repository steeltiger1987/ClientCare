<?php

use Care\Repositories\AttachmentsRepositoryInterface;

class DownloadController extends BaseController
{
    protected $attachments;

    function __construct(AttachmentsRepositoryInterface $attachments)
    {
        $this->attachments = $attachments;
    }

    public function getDownload($hash)
    {
        $path       = app_path('uploads/tickets/') . $hash;
        $attachment = $this->attachments->getAttachmentByHash($hash);
        return Response::download($path, $attachment->orginal_name);
    }
}