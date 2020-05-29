<?php

namespace Engine\Core\Template;

use Admin\Model\Coach\CoachRepository;
use Engine\DI\DI;

/**
 * Class CoachTemplate
 * @package Engine\Core\Template
 */
class CoachTemplate
{
    /**
     * @var DI
     */
    protected static $di;

    /**
     * @var CoachRepository
     */
    protected static $coachRepository;

    /**
     * Menu constructor.
     * @param $di
     */
    public function __construct($di)
    {
        self::$di = $di;
        self::$coachRepository = new CoachRepository(self::$di);
    }

    /**
     * @return mixed
     */
    public static function getCoach()
    {
        return self::$coachRepository->getCoach();
    }
}
