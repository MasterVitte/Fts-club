<?php

namespace Engine\Core\Template;

use Admin\Model\Concepts\ConceptsRepository;
use Engine\DI\DI;

/**
 * Class ConceptsTemplate
 * @package Engine\Core\Template
 */
class ConceptsTemplate
{
    /**
     * @var DI
     */
    protected static $di;

    /**
     * @var ConceptsRepository
     */
    protected static $conceptsRepository;

    /**
     * Menu constructor.
     * @param $di
     */
    public function __construct($di)
    {
        self::$di = $di;
        self::$conceptsRepository = new ConceptsRepository(self::$di);
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getConcepts()
    {
        return self::$conceptsRepository->getConcepts();
    }
}
