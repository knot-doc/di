<?php
ob_start();

$base_dir = dirname(__DIR__);

require_once $base_dir . '/env.php';
require_once $base_dir . '/vendor/autoload.php';
require_once $base_dir . '/include/functions.php';

(new KnotLib\Kernel\Bootstrap())
    ->mount(new KnotDoc\Di\FileSystem\FrontFileSystem($base_dir))
    ->boot(KnotDoc\Di\App\Front\FrontWebApplication::class);
