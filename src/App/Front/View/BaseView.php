<?php /** @noinspection PhpIncludeInspection */

namespace KnotDoc\Di\App\Front\View;

use Psr\Http\Message\ResponseInterface;
use Stk2k\File\File;

use KnotLib\Kernel\FileSystem\Dir;
use KnotLib\Service\FileSystemService;
use KnotLib\Service\LoggerService;

use KnotDoc\Di\View\ViewHelper;

abstract class BaseView
{
    /** @var FileSystemService */
    private $fs;

    /** @var LoggerService */
    private $logger;

    /** @var  array */
    private $page_info;

    /**
     * BaseView constructor.
     *
     * @param FileSystemService $filesystem_s
     * @param LoggerService $logger
     */
    public function __construct(FileSystemService $filesystem_s, LoggerService $logger)
    {
        $this->fs = $filesystem_s;
        $this->logger = $logger;

        $js_files = [];
        $css_files = [];

        $include_dir = $filesystem_s->getDirectory(Dir::INCLUDE);
        $site_config = require_once($include_dir . '/config.inc.php');

        $this->page_info = [
            'site_name' => $site_config['site']['site_name'],
            'css' => $css_files,
            'javascript' => $js_files,
            'site_config' => $site_config,
        ];

        $this->page_info = array_merge_recursive($this->page_info, $this->getCustomPageInfo());
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

    /**
     * @return array
     */
    public abstract function getCustomPageInfo() : array;

    /**
     * @return array
     */
    public function getRequiredPackages() : array
    {
        return [];
    }

    /**
     * @param array $data
     * @param string $layout
     * @param string $page
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    public function render(array $data, string $layout, string $page, ResponseInterface $response) : ResponseInterface
    {
        $template_dir = $this->fs->getDirectory(Dir::TEMPLATE);
        $this->logger->debug('template_dir: ' . $template_dir);

        $layout_file = "layouts/{$layout}.layout.php";
        $page_file = "pages/{$page}.page.php";

        $layout_file = new File($layout_file, new File($template_dir));
        $page_file = new File($page_file, new File($template_dir));

        $this->logger->debug('layout_file: ' . $layout_file);
        $this->logger->debug('page_file: ' . $page_file);

        $cache_dir = $this->fs->getDirectory(Dir::CACHE);
        $this->logger->debug('cache_dir: ' . $cache_dir);

        $data['helper'] = new ViewHelper($template_dir, $cache_dir);

        $page_info = array_merge_recursive($this->page_info, $data);

        extract($page_info);

        ob_start();
        require_once $layout_file;
        $contents = ob_get_clean();

        $response->getBody()->write($contents);

        $this->logger->debug('view rendered: ' . get_class($this));

        return $response;
    }

    
}