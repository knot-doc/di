<?php
namespace KnotDoc\Di\App\Front\Controller;

use KnotLib\Service\FileSystemService;
use KnotLib\Service\LoggerService;

class BaseController
{
    /** @var FileSystemService */
    private $fs;

    /** @var LoggerService */
    private $logger;

    /**
     * BaseController constructor.
     *
     * @param FileSystemService $filesystem_s
     * @param LoggerService $logger
     */
    public function __construct(FileSystemService $filesystem_s, LoggerService $logger)
    {
        $this->fs = $filesystem_s;
        $this->logger = $logger;
    }

    /**
     * Get file syste mservice
     *
     * @return FileSystemService
     */
    protected function getFileSystem() : FileSystemService
    {
        return $this->fs;
    }

    /**
     * Get logger
     *
     * @return LoggerService
     */
    protected function getLogger() : LoggerService
    {
        return $this->logger;
    }

}