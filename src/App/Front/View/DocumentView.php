<?php
namespace KnotDoc\Di\App\Front\View;

use KnotLib\Service\FileSystemService;
use KnotLib\Service\LoggerService;
use Psr\Http\Message\ResponseInterface;

class DocumentView extends BaseView
{
    /**
     * HomeView constructor.
     *
     * @param FileSystemService $filesystem_s
     * @param LoggerService $logger
     */
    public function __construct(FileSystemService $filesystem_s, LoggerService $logger)
    {
        parent::__construct($filesystem_s, $logger);
    }

    /**
     * @return array
     */
    public function getCustomPageInfo() : array
    {
        return [
            'css' => [
                '/css/github.css',
            ],
            'javascript' => [
            ],
        ];
    }

    /**
     * @return array
     */
    public function getRequiredPackages() : array
    {
        return [
        ];
    }

    /**
     * Show document page
     *
     * @param array $data
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     *
     * @throws
     */
    public function normalPage(array $data, ResponseInterface $response) : ResponseInterface
    {
        return $this->render($data, 'default', 'document/normal', $response);
    }

}