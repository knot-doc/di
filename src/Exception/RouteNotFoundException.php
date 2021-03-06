<?php
namespace KnotDoc\Di\Exception;

use Throwable;

class RouteNotFoundException extends MyAppException
{
    /**
     * RouteNotFoundException constructor.
     *
     * @param string $event
     * @param int $code
     * @param Throwable|NULL $prev
     */
    public function __construct( string $event, int $code = 0, Throwable $prev = NULL )
    {
        parent::__construct( "Target not found for event: $event", $code, $prev );
    }
}