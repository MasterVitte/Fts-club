<?php

namespace Engine\Core\Template;

use Admin\Model\Timing\TimingRepository;
use Engine\DI\DI;

/**
 * Class Timing
 * @package Engine\Core\Template
 */
class TimingTemplate
{
    /**
     * @var DI
     */
    protected static $di;

    /**
     * @var TimingRepository
     */
    protected static $timingRepository;

    /**
     * Menu constructor.
     * @param $di
     */
    public function __construct($di)
    {
        self::$di = $di;
        self::$timingRepository = new TimingRepository(self::$di);
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getTiming($name)
    {
        return self::$timingRepository->getTimingByDay($name);
    }
}
