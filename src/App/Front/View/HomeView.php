<?php
namespace KnotDoc\Di\App\Front\View;

use KnotLib\Service\FileSystemService;
use KnotLib\Service\LoggerService;
use Psr\Http\Message\ResponseInterface;

class HomeView extends BaseView
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
     * index
     *
     * @param array $data
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     *
     * @throws
     */
    public function index(array $data, ResponseInterface $response) : ResponseInterface
    {
        return $this->render($data, 'home', 'home/index', $response);
    }

}