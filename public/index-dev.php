<?php
ob_start();

$base_dir = dirname(__DIR__);

require_once $base_dir . '/env.php';
require_once $base_dir . '/vendor/autoload.php';
require_once $base_dir . '/include/functions.php';

(new KnotLib\Kernel\Bootstrap())
    ->mount(new KnotDoc\Di\FileSystem\FrontFileSystem($base_dir))
    ->handleException(function(Throwable $e){
        echo '<pre>';
        echo $e->getMessage(), PHP_EOL;
        echo '------------------------------------', PHP_EOL;
        echo $e->getTraceAsString(), PHP_EOL;
        echo '</pre>';
        exit;
    })
    ->boot(KnotDoc\Di\App\Front\FrontWebApplication::class);