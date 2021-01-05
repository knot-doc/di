<?php /** @noinspection PhpIncludeInspection */

namespace KnotDoc\Di\App\Front\Dispatcher;

use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Router\DispatcherInterface;
use KnotLib\Router\Router;
use KnotLib\Service\DI;
use KnotLib\Service\Util\DiServiceTrait;
use KnotLib\Service\LoggerService;

use KnotDoc\Di\App\Front\Controller\DocumentController;
use KnotDoc\Di\App\Front\Controller\HomeController;
use KnotDoc\Di\App\Front\View\DocumentView;
use KnotDoc\Di\App\Front\View\HomeView;
use KnotDoc\Di\App\Front\Controller\ErrorController;
use KnotDoc\Di\App\Front\View\ErrorView;
use KnotDoc\Di\Exception\PageNotFoundException;

class FrontDispatcher implements DispatcherInterface
{
    use DiServiceTrait;
    
    /** @var ApplicationInterface */
    private $app;

    public function __construct(ApplicationInterface $app)
    {
        $this->app = $app;
    }

    /**
     * Get logger
     *
     * @return LoggerService
     * 
     * @throws 
     */
    public function getLogger() : LoggerService
    {
        return $this->getLoggerService($this->app->di());
    }

    /**
     * Dispatch event
     *
     * @param string $path
     * @param array $vars
     * @param string $route_name
     *
     * @return bool
     *
     * @throws
     */
    public function dispatch(string $path, array $vars, string $route_name)
    {
        $logger = $this->getLogger();
        
        $logger->debug('dispatched: ' . $route_name);

        $vars['path'] = $path;
        $vars['route_name'] = $path;
        
        $di = $this->app->di();
        $response = $this->app->response();

        $logger  = $di[DI::URI_SERVICE_LOGGER];
        $fs  = $di[DI::URI_SERVICE_FILESYSTEM];

        switch($route_name){
            case Router::ROUTE_NOT_FOUND:
                $vars = (new ErrorController($fs, $logger))
                    ->status404($vars);
                $response = (new ErrorView($fs, $logger))
                    ->status404($vars, $response);
                break;
            case 'internal_server_error':
                $vars = (new ErrorController($fs, $logger))
                    ->status500($vars);
                $response = (new ErrorView($fs, $logger))
                    ->status500($vars, $response);
                break;

            // Home
            case 'home':
                $vars = (new HomeController($fs, $logger))
                    ->index($vars);
                $response = (new HomeView($fs, $logger))
                    ->index($vars, $response);
                break;

            default:
                try{
                    $vars = (new DocumentController($fs, $logger))
                        ->compilePage($vars, $route_name);
                    $response = (new DocumentView($fs, $logger))
                        ->normalPage($vars, $response);
                }
                catch(PageNotFoundException $e){
                    $vars = (new ErrorController($fs, $logger))
                        ->status404($vars);
                    $response = (new ErrorView($fs, $logger))
                        ->status404($vars, $response);
                }
                break;
        }

        $this->app->response($response);

        return true;
    }
}