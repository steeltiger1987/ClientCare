<?php
namespace Care\Uploader;

use Care\Repositories\AttachmentsRepositoryInterface;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Uploader
{
    /**
     * Tickets Attachments Directory
     * @var string
     */
    protected $attachmentsDir = 'uploads/tickets';

    /**
     * Users' Profile Photos Directory
     * @var string
     */
    protected $profilesDir = 'uploads/profile';

    /**
     * Profile Picture Size
     * @var int
     */
    protected $photoSize = 150;

    /**
     * File System Instance
     * @var
     */
    protected $filesystem;

    /**
     * Attachments Repository
     * @var
     */
    protected $attachments;


    function __construct(Filesystem $filesystem, AttachmentsRepositoryInterface $attachments)
    {
        $this->filesystem  = $filesystem;
        $this->attachments = $attachments;
    }

    /**
     * Make a unique file name
     * @return string
     */
    protected function makeFileName()
    {
        return sha1(time() . time());
    }

    /**
     * Get full path
     * @param $path
     * @return string
     */
    protected function getFullPath($path)
    {
        return app_path() . '/' . $path;
    }

    /**
     * Handle tickets attachment
     * @param UploadedFile $file
     * @return string
     */
    public function attach(UploadedFile $file)
    {
        $filename     = $this->makeFilename() . '.' . $file->getClientOriginalExtension();
        $path         = $this->getFullPath($this->attachmentsDir);
        $attachmendId = time();

        $file->move($path, $filename);

        // store attachment info
        $this->attachments->save([
            'alias'        => $filename,
            'orginal_name' => $file->getClientOriginalName(),
            'file_size'    => $file->getSize(),
            'id'           => $attachmendId
        ]);

        return $attachmendId;
    }
} 