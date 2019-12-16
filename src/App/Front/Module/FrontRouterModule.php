<?php
namespace KnotDoc\Di\App\Front\Module;

use KnotLib\Kernel\FileSystem\Dir;
use KnotLib\Kernel\FileSystem\FileSystemInterface;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ModuleInterface;
use KnotLib\Http\Middleware\WebServerRoutingMiddleware;
use KnotLib\Service\DI;

use KnotPhp\Module\KnotRouter\KnotRouterModule;
use KnotPhp\Module\KnotService\KnotServiceModule;

use KnotDoc\Di\App\Front\Dispatcher\FrontDispatcher;
use Psr\Http\Server\MiddlewareInterface;

class FrontRouterModule extends KnotRouterModule implements ModuleInterface
{
    /** @var FileSystemInterface */
    private $fs;

    /**
     * {@inheritDoc}
     */
    public static function requiredModules(): array
    {
        return [
            KnotServiceModule::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getDispatcher(ApplicationInterface $app)
    {
        $di = $app->di();

        $logger = $di[DI::SERVICE_LOGGER];

        $this->fs = $app->filesystem();

        return new FrontDispatcher($logger, $app);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoutingRule(): array
    {
        $route_file = $this->fs->getFile(Dir::CONFIG, 'route.config.php');
        /** @noinspection PhpIncludeInspection */
        $routes_config = require($route_file);

        $new_config = [];
        foreach($routes_config as $key => $config){
            $new_config[$key] = $config;
            $new_config['/index.php' . $key] = $config;
            $new_config['/index-dev.php' . $key] = $config;
        }

        return $new_config;
    }

    /**
     * {@inheritDoc}
     */
    public function getRoutingMiddleware(ApplicationInterface $app): MiddlewareInterface
    {
        return new WebServerRoutingMiddleware($app);
    }
}