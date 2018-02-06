<?php
namespace GeonetSolutions\ExampleModule;

use Composer\Script\Event;
use Composer\installer\PackageEvent;
use GeonetSolutions\ExampleModule\ExampleModuleServiceProvider;

class ModuleRegistration
{
    public static function postInstall(Event $event)
    {
        $provider = new ExampleModuleServiceProvider();
        $provider->registerModule();
    }
}
