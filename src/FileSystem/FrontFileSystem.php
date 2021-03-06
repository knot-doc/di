<?php
namespace KnotDoc\Di\FileSystem;

use KnotPhp\Framework\DefaultFileSystem;
use KnotLib\Kernel\FileSystem\FileSystemInterface;

class FrontFileSystem extends DefaultFileSystem implements FileSystemInterface
{
    /** @var array */
    private $dir_map;

    /**
     * FrontFileSystem constructor.
     *
     * @param string $base_dir
     */
    public function __construct(string $base_dir)
    {
        parent::__construct($base_dir);

        $this->dir_map = [
            Dir::TEMPLATE => $base_dir . '/template/front',
            Dir::CONFIG => $base_dir . '/config/front',
            Dir::DOCUMENT => $base_dir . '/document',
            Dir::I18N => $base_dir . '/i18n',
        ];
    }
    
    /**
     * Get directory path
     *
     * @param int $dir
     *
     * @return string
     *
     * @throws
     */
    public function getDirectory(int $dir) : string
    {
        return $this->dir_map[$dir] ?? parent::getDirectory($dir);
    }
}