<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Function.php';

class_alias('Engine\\Core\\Template\\Asset', 'Asset');
class_alias('Engine\\Core\\Template\\Theme', 'Theme');
class_alias('Engine\\Core\\Template\\DaysTemplate', 'Days');
class_alias('Engine\\Core\\Template\\TimingTemplate', 'Timing');
class_alias('Engine\\Core\\Template\\CoachTemplate', 'Coach');
class_alias('Engine\\Core\\Template\\ConceptsTemplate', 'Concepts');

use Engine\Cms;
use Engine\DI\DI;

try{
    // Dependency injection
    $di = new DI();

    $services = require __DIR__ . '/Config/Service.php';
    // Init services
    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    // Init models
    $di->set('model', []);

    $cms = new Cms($di);
    $cms->run();

}catch (\ErrorException $e) {
    echo $e->getMessage();
}
