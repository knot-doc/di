<?php /** @noinspection PhpIncludeInspection */

namespace KnotDoc\Di\App\Front;

use KnotLib\Router\DispatcherInterface;
use KnotLib\Kernel\Kernel\ApplicationInterface;

use KnotPhp\Framework\Application\KnotHttpApplication;
use KnotPhp\Module\KnotExceptionHandler\Html\HtmlExceptionHandlerModule;

use KnotDoc\Di\App\Front\Dispatcher\FrontDispatcher;
use KnotDoc\Di\App\Front\Module\FrontDiModule;

class FrontWebApplication extends KnotHttpApplication
{
    const ROUTING_RULES = [
        "/" => "home",
        "/:lang/" => "document.top",
        "/:lang/top" => "document.top",
        "/:lang/introduction" => "document.introduction",
        "/:lang/quick-start" => "document.quick-start",

        // BASIC USAGE
        "/:lang/basic-usage/configuring-container" => "document.basic-usage.configuring-container",
        "/:lang/basic-usage/using-container" => "document.basic-usage.using-container",
    ];

    /**
     * @return DispatcherInterface
     */
    protected function getDispatcher(): DispatcherInterface
    {
        return new FrontDispatcher($this);
    }

    /**
     * @return array
     */
    protected function getRoutingRules(): array
    {
        return self::ROUTING_RULES;
    }


    /**
     * Configure application
     *
     * @throws
     */
    public function configure() : ApplicationInterface
    {
        parent::configure();

        $this->requireModule(HtmlExceptionHandlerModule::class);
        $this->requireModule(FrontDiModule::class);

        return $this;
    }
}