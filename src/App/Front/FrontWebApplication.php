<?php /** @noinspection PhpIncludeInspection */

namespace KnotDoc\Di\App\Front;

use Throwable;

use KnotLib\Kernel\Kernel\ApplicationType;
use KnotLib\Module\Application\SimpleApplication;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Logger\LoggerUtil;
use KnotPhp\Framework\KnotFrameworkPackage;

use KnotPhp\Module\AuraSession\AuraSessionModule;
use KnotPhp\Module\GuzzleHttp\Package\GuzzleHttpPackage;

use KnotDoc\Di\App\Front\Module\FrontRouterModule;
use KnotDoc\Di\App\Front\Module\FrontDiModule;

class FrontWebApplication extends SimpleApplication
{
    public static function type(): ApplicationType
    {
        return ApplicationType::of(ApplicationType::WEB_APP);
    }

    /**
     * Configure application
     *
     * @throws
     */
    public function configure() : ApplicationInterface
    {
        $this->requirePackage(KnotFrameworkPackage::class);
        $this->requirePackage(GuzzleHttpPackage::class);
        $this->requireModule(FrontRouterModule::class);
        $this->requireModule(FrontDiModule::class);
        $this->requireModule(AuraSessionModule::class);
        return $this;
    }

    /**
     * Handle exception
     *
     * @param Throwable $e
     *
     * @return bool
     */
    public function handleException(Throwable $e) : bool
    {
        LoggerUtil::logException($e, $this->logger());

        return false;
    }
}