<?php

namespace Engine\Core\Template;

use Admin\Model\Days\DaysRepository;
use Engine\DI\DI;

/**
 * Class Menu
 * @package Engine\Core\Template
 */
class DaysTemplate
{
    /**
     * @var DI
     */
    protected static $di;

    /**
     * @var daysRepository
     */
    protected static $daysRepository;

    /**
     * Menu constructor.
     * @param $di
     */
    public function __construct($di)
    {
        self::$di = $di;
        self::$daysRepository = new DaysRepository(self::$di);
    }

    /**
     * @param int $menuId
     * @return mixed
     */
    public static function getDays()
    {
        return self::$daysRepository->getDays();
    }
}
