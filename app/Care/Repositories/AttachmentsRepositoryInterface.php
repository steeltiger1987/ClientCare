<?php
namespace Care\Repositories;

interface AttachmentsRepositoryInterface
{
    public function getAttachmentByHash($hash);
}